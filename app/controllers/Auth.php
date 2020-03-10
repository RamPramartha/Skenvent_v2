<?php


class Auth
{
  private $input;

  public function __construct()
  {
    $this->input = Controller::loadLibrary("Input");
  }
  public function index()
  {
    if (!isset($_COOKIE["is_login"])) {
      $formvalidation = Controller::loadLibrary("FormValidation");

      if ($formvalidation->run() == false) {
        $data["title"] = useEnv("APPNAME") . "- Login";
        Controller::useViews(["templates.auth_header", "auth.login", "templates.auth_footer"], $data);
      } else {
        $formvalidation->set("verifyUser", "verifyuser", "required", [
          "required" => "Hey jangan tinggalkan field ini kosong."
        ]);
        $formvalidation->set("password", "password", "required", [
          "required" => "Hey jangan tinggalkan field ini kosong"
        ]);

        $verifyed = $this->input->post("verifyUser");

        $sql = "SELECT id_user, username, password FROM tb_siswa WHERE email={$verifyed} OR nisn={$verifyed}";
        if ($userdata = DB::table("tb_siswa")->withQuery($sql, "single")) {
          // check password
          if (password_verify($this->input->post("password"), $userdata["password"])) {
            $cookiedata = [
              "is_login" => password_hash($userdata["username"], PASSWORD_BCRYPT),
              "userid" => $userdata["id_user"]
            ];

            setCookies($cookiedata, 7200);
          }
        } else {
          $_SESSION["err"]["verifyuser"][] = "Hey nisn atau emailmu tidak ada dalam daftar.";
          redirect(currpath());
        }
      }
    } else {
      redirect(null, FORBIDDEN_ERROR);
    }
  }
  public function register()
  {
    if (!isset($_COOKIE["is_login"])) {
      $formvalidation = Controller::loadLibrary("FormValidation");

      if ($formvalidation->run() == false) {
        $data["title"] = useEnv("APPNAME") . "- Register";
        Controller::useViews(["templates.auth_header", "auth.register", "templates.auth_footer"], $data);
      } else {
        $formvalidation->set("nisn", "nisn", "required|max:6|min:4|unique:tb_siswa", [
          "required" => "Hey field ini tolong diisi!",
          "max" => "NISN mu ga bisa lebih dari 5 huruf.",
          "min" => "Hey NISN mu tidak valid.",
          "is_unique" => "NISN mu sudah terdaftar sebelumnya!"
        ]);

        $formvalidation->set("email", "email", "required|email", [
          "required" => "Hey email mu jangan dikosongin dong!",
          "is_email" => "Email mu tidak seperti email biasanya!"
        ]);

        $formvalidation->set("password", "password", "required|min:8", [
          "required" => "Field ini tolong diisi ya gais.",
          "min" => "Hey passwordnya terlalu lemah"
        ]);

        $formvalidation->set("cpassword", "cpassword", "required|match:password", [
          "required" => "Hey field ini juga harus diisi!",
          "match" => "Passwordmu tidak sama dengan sebelumnya."
        ]);

        // end email

        $id = "u-" . $this->input->post("nisn") . uniqid();

        $siswa = [
          "id_user" => $id,
          "fullname" => "",
          "email" => $this->input->post("email"),
          "username" => "",
          "password" => password_hash($this->input->post("password"), PASSWORD_BCRYPT),
          "nisn" => $this->input->post("nisn"),
          "jurusan" => "",
          "kelas" => "",
          "gender" => null,
          "status" => 1,
          "avatar" => "default.jpg"
        ];

        if (DB::table("tb_siswa")->insert($siswa) > 0) {
          $sessdata = ["userid" => $id];
          setSession($sessdata);

          // unset the saved value before redirecting
          unset($_SESSION["saved_value"]);
          redirect(base_url("/auth/register2"));
        }
      }
    } else {
      redirect(null, FORBIDDEN_ERROR);
    }
  }

  public function register2()
  {
    if (!isset($_COOKIE["is_login"])) {
      $formvalidation = Controller::loadLibrary("FormValidation");
      if ($formvalidation->run() == false) {
        $data["title"] = useEnv("APPNAME") . "- Register Step 2";
        Controller::useViews(["templates.auth_header", "auth.register2", "templates.auth_footer"], $data);
      } else {

        $formvalidation->set("fullname", "Fullname", "required", [
          "required" => "Hey isikan dong nama lengkapmu!"
        ]);

        $username = explode(" ", ucwords($this->input->post("fullname")));
        $username = $username[count($username) - 2] . " " . $username[count($username) - 1];

        $siswa = ["fullname" => $this->input->post("fullname"), "username" => $username];
        $where = ["id_user" => $_SESSION["userid"]];
        if (DB::table("tb_siswa")->update($siswa, $where)) {
          $sessdata = ["username" => $username];
          setSession($sessdata);

          // unset saved value before redirecting
          unset($_SESSION["saved_value"]);
          redirect(base_url("/auth/register3"));
        }
      }
    } else {
      redirect(null, FORBIDDEN_ERROR);
    }
  }

  public function register3()
  {
    if (!isset($_COOKIE["is_login"])) {
      $formvalidation = Controller::loadLibrary("FormValidation");
      if ($formvalidation->run() == false) {
        $data["title"] = useEnv("APPNAME") . "- Register Step 3";
        $data["username"] = $_SESSION["username"] ?? "user";
        Controller::useViews(["templates.auth_header", "auth.register3", "templates.auth_footer"], $data);
      } else {
        $jurusan = ["jurusan" => strtoupper($this->input->post("jurusan"))];
        $where = ["username" => $_SESSION["username"], "id_user" => $_SESSION["userid"]];

        if (DB::table("tb_siswa")->update($jurusan, $where) > 0) {

          $sessdata = ["jurusan" => strtoupper($this->input->post("jurusan"))];
          setSession($sessdata);

          // unset saved value before redirecting
          unset($_SESSION["saved_value"]);
          redirect(base_url("/auth/register4"));
        }
      }
    } else {
      redirect(null, FORBIDDEN_ERROR);
    }
  }

  public function register4()
  {
    if (!isset($_COOKIE["is_login"])) {
      $formvalidation = Controller::loadLibrary("FormValidation");
      if ($formvalidation->run() == false) {
        $data["title"] = useEnv("APPNAME") . "- Register Step 4";
        $data["username"] = $_SESSION["username"] ?? "user";
        Controller::useViews(["templates.auth_header", "auth.register4", "templates.auth_footer"], $data);
      } else {
        $sessdata = ["kelas" => strtoupper($this->input->post("kelas"))];
        setSession($sessdata);

        // unset saved value before redirecting
        unset($_SESSION["saved_value"]);
        redirect(base_url("/auth/register5"));
      }
    } else {
      redirect(null, FORBIDDEN_ERROR);
    }
  }

  public function register5()
  {
    if (!isset($_COOKIE["is_login"])) {
      $formvalidation = Controller::loadLibrary("FormValidation");
      if ($formvalidation->run() == false) {
        $data["title"] = useEnv("APPNAME") . "- Register Step 5";
        $data["username"] = $_SESSION["username"] ?? "user";
        Controller::useViews(["templates.auth_header", "auth.register5", "templates.auth_footer"], $data);
      } else {
        $index = $this->input->post("index");
        $index = explode("-", $index);
        $index = end($index);

        $kelas = $_SESSION["kelas"] . " " . $_SESSION["jurusan"] . " " . $index;

        $datakelasfull = ["kelas" => $kelas];
        $where = ["username" => $_SESSION["username"], "id_user" => $_SESSION["userid"]];

        if (DB::table("tb_siswa")->update($datakelasfull, $where) > 0) {
          $userdata = DB::table("tb_siswa")->where("id_user", $_SESSION["userid"])->get(["username", "id_user"]);

          $_is_login_val = password_hash($userdata["username"], PASSWORD_BCRYPT);
          $cookiedata = [
            "is_login" => $_is_login_val,
            "userid" => $_SESSION["userid"]
          ];
          setCookies($cookiedata, 7200);
          unset($_SESSION["userid"]);
          unset($_SESSION["username"]);
          unset($_SESSION["kelas"]);
          unset($_SESSION["jurusan"]);
        }
      }
    } else {
      redirect(null, FORBIDDEN_ERROR);
    }
  }
}
