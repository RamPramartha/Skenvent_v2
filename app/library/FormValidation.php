<?php


defined("BASEPATH") or die("Direct scripting is not allowed.");

class FormValidation
{
  private $_is_save;
  private $_is_run = false;

  public function __construct()
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST")
      $this->_is_run = true;
  }

  public function run()
  {
    // request method = post ? then _is_run = true
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $this->_is_run = true;
    }

    // initialize input classes
    if (!isset($this->input)) {
      loadfile("Input", LIBSPATH);
      $this->input = new Input;
    }

    return $this->_is_run;
  }

  public function set(
    $input        = null,
    $display_name = null,
    $rule         = null,
    $overide      = null
  ) {
    if ($this->_is_run === false) return false;

    // setup the rule
    if (strpos($rule, "|"))
      $rule = explode("|", $rule);
    else
      $rule = [$rule];


    static $cond = [];

    foreach ($rule as $each_rule) {
      switch (true) {
        case strtolower($each_rule) === "required":
          $cond[] =
            $this->required(
              $display_name,
              $this->input->post($input),
              $overide
            );
          break;
        case strtolower($each_rule) === "email":
          $cond[] =
            $this->emailValidation(
              $display_name,
              $this->input->post($input),
              $overide
            );
          break;
        case preg_match("/^max:[0-9]+$/", $each_rule):
          $len = explode(":", $each_rule);
          $len = (int) end($len);
          $cond[] =
            $this->maxValue(
              $display_name,
              $this->input->post($input),
              $len,
              $overide
            );
          break;
        case preg_match("/^min:[0-9]+$/", $each_rule):
          $len = explode(":", $each_rule);
          $len = (int) end($len);
          $cond[] =
            $this->minValue(
              $display_name,
              $this->input->post($input),
              $len,
              $overide
            );
          break;
        case preg_match("/^unique:[a-zA-Z]+$/", $each_rule):
          $tb_name = explode(":", $each_rule);
          $tb_name = (string) end($tb_name);
          $cond[] =
            $this->isUnique(
              $display_name,
              $this->input->post($input),
              $input,
              $tb_name,
              $overide
            );
          break;
        case preg_match("/^match:[a-zA-Z_-]+$/", $each_rule):
          $_to_match = explode(":", $each_rule);
          $_to_match = end($_to_match);
          $cond[] =
            $this->match(
              $display_name,
              $this->input->post($input),
              $_to_match,
              $overide
            );
          break;
      }
    }

    // create default value
    $this->createSavedValue($input, $this->input->post($input));

    $this->_is_save = $cond;
    if (in_array(false, $cond)) {
      $this->redirect(currpath());
    } else {
      // if no error detected then unset the err and saved value
      unset($_SESSION["err"]);
      unset($_SESSION["saved_value"]);
    }
  }

  public function save()
  {
    if (in_array(false, $this->_is_save)) {
      return false;
    } else {
      return true;
    }
  }

  private function required(
    $name = "",
    $data,
    $overide = null
  ) {
    if (isset($data)) {
      if ($data !== "" || $data || !empty($data)) {
        return true;
      } else {
        $this->setError(
          "required",
          $name,
          null,
          $overide
        );
        return false;
      }
    }
  }

  private function emailValidation(
    $name     = "",
    $data,
    $overide  = null
  ) {
    if (isset($data)) {
      $data = filter_var($data, FILTER_VALIDATE_EMAIL);
      if ($data) {
        return true;
      } else {
        $this->setError(
          "is_email",
          $name,
          null,
          $overide
        );
        return false;
      }
    }
  }

  private function maxValue(
    $name     = "",
    $data,
    $len,
    $overide  = null
  ) {
    if (isset($data)) {
      $data_len = strlen($data);
      if ($data_len < $len) {
        return true;
      } else {
        $this->setError(
          "max",
          $name,
          $len,
          $overide
        );
        return false;
      }
    }
  }

  private function minValue(
    $name     = "",
    $data,
    $len,
    $overide  = null
  ) {
    $data_len = strlen($data);
    if ($data_len > $len) {
      return true;
    } else {
      $this->setError("min", $name, $len, $overide);
      return false;
    }
  }

  private function isUnique(
    $name         = "",
    $data         = null,
    $verificator  = null,
    $tb_name,
    $overide
  ) {
    if (isset($tb_name)) {
      $db_data =
        DB::table(strtolower($tb_name))
        ->where($verificator, $data)
        ->get($verificator);

      if ($db_data === false) {
        return true;
      } else {
        if ($data !== "" && isset($verificator)) {
          $this->setError("is_unique", $name, null, $overide);
        }
        return false;
      }
    }
  }

  private function match(
    $name     = "",
    $data,
    $to_match,
    $overide  = null
  ) {
    if (isset($data) && isset($to_match)) {
      $to_match = $this->input->post($to_match);
      if ($to_match) {
        // check if the value is matching with the targeted value
        if (strtolower($data) === strtolower($to_match)) {
          return true;
        } else {
          $this->setError("match", $name, null, $overide);
          return false;
        }
      }
    }
  }

  private function setError(
    $err_code,
    $err_name,
    $data         = null,
    $overide_msg  = null
  ) {
    if (!session_id()) {
      session_start();
    }

    $err_name = ucwords($err_name);

    $err_lists = [
      "required" =>
      "{$err_name} field is required.",
      "is_email" =>
      "{$err_name} field is not an valid email.",
      "max" =>
      "{$err_name} field character length can't greater than {$data} character",
      "min" =>
      "{$err_name} field character length can't less than {$data} character",
      "is_unique" =>
      "{$err_name} field must be unique.",
      "match" =>
      "{$err_name} field is not match."
    ];

    // overiding error message
    if (isset($overide_msg) && $overide_msg !== "") {
      if (is_array($overide_msg) && !empty($overide_msg)) {
        foreach ($overide_msg as $over_key => $over_val) {
          $err_lists[$over_key] = $over_val;
        }
      }
    }

    $err_msg = $err_lists[$err_code];

    // set session
    $_SESSION["err"][strtolower($err_name)][] = $err_msg;
  }

  private function createSavedValue($name, $data)
  {
    // $_SESSION["saved_value"][$name] = $data
    if (!session_id())
      session_start();

    // set session with saved input value
    $_SESSION["saved_value"][strtolower($name)] = $data;

    return true;
  }

  private function redirect($uri = "")
  {
    if ($uri) {
      header("Location: " . $uri);
    }
  }
}

function showError($err_name)
{
  $err = $_SESSION["err"][$err_name] ?? "";
  if (is_array($err)) {
    $err = $err[0];

    echo $err;
    unset($_SESSION["err"][$err_name]);

    // foreach ($err as $err_) {
    //   echo "
    //     <small class=\"err\">
    //       {$err_}
    //     </small>
    //   ";
    //   unset($_SESSION["err"][$err_name]);
    // }
  }
}

function isError($err_name)
{
  $err = isset($_SESSION["err"][$err_name]) ? true : false;

  return $err === true ? "--invalid" : "";
}

function getValue($name)
{
  $err = $_SESSION["saved_value"][$name] ?? false;

  return $err ? $err : "";
}
