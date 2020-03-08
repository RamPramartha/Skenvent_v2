<?php


defined("BASEPATH") or die("Direct scripting is not allowed.");

class Input
{
  public function post($var_name)
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      switch (true) {
        case is_int($_POST[$var_name]):
          $_POST[$var_name] =
            filter_var($_POST[$var_name], FILTER_VALIDATE_INT);
          break;
        case is_bool($_POST[$var_name]):
          $_POST[$var_name] =
            filter_var($_POST[$var_name], FILTER_VALIDATE_BOOLEAN);
          break;
        default:
          $_POST[$var_name] =
            filter_var($_POST[$var_name], FILTER_SANITIZE_STRING);
          break;
      }
    }

    return $_POST[$var_name];
  }

  public function get($var_name)
  {
    return $_GET[$var_name];
  }
}
