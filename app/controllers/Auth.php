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
    $data["title"] = $_ENV["APPNAME"] . "- Login";
    Controller::useViews(["templates.auth_header", "auth.login", "templates.auth_footer"], $data);
  }
  public function register()
  {
    $formvalidation = Controller::loadLibrary("FormValidation");

    if($formvalidation->run() == false) {
      $data["title"] = $_ENV["APPNAME"] . "- Register";
      Controller::useViews(["templates.auth_header", "auth.register", "templates.auth_footer"], $data);
    } else {
      $formvalidation->set("nisn", "nisn", "required|max:6|min:4", [
        "required" => "Hey jangan dikosongin dong!",
        "max"=> "Hey jangan lebih dari 5",
        "min" => "Hey nisn mu belum valid"
      ]);

      $formvalidation->set("email", "Email", "required|email", [
        "required" => "Hey email mu jangan dikosongin dong!",
        "is_email"=> "Yakin email mu sudah benar!"
      ]);

      $formvalidation->set("password", "Password", "required|min:8", [
        "required" => "Hey jangan dikosongin goblog!",
        "min" => "Hey password nya jangan dikosongin!"
      ]);

      $formvalidation->set("cpassword", "CPassword", "required|match:password", [
        "required" => "Hey jangan dikosongin juga ini dong!",
        "match" => "Password mu tidak sama goblog!"
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

      if(DB::table("tb_siswa")->insert($siswa) > 0) {
        if(!session_status()||!session_id()) session_start();
        $_SESSION["userid"] = $id;
        redirect(base_url("/auth/register2"));
      }
    }
  }

  public function register2()
  {
    $formvalidation = Controller::loadLibrary("FormValidation");
    if($formvalidation->run() == false) {
      $data["title"] = $_ENV["APPNAME"] . "- Register Step 2";
      Controller::useViews(["templates.auth_header", "auth.register2", "templates.auth_footer"], $data);
    } else {

      $formvalidation->set("fullname","Fullname", "required", [
        "required" => "Hey isikan dong nama lengkapmu!"
      ]);

      $username = explode(" ", ucwords($this->input->post("fullname")));
      $username = $username[count($username) - 2] . " " . $username[count($username) - 1];

      $siswa= ["fullname" => $this->input->post("fullname"), "username" => $username];
      $where = ["id_user" => $_SESSION["userid"]];
      if(DB::table("tb_siswa")->update($siswa, $where)) {
        if(!session_status() || !session_id()) session_start();
        $_SESSION["username"] = $username;
        redirect(base_url("/auth/register3"));
      }
    }
  }

  public function register3()
  {
    $formvalidation =Controller::loadLibrary("FormValidation");
    if($formvalidation->run() == false) {
      $data["title"] = $_ENV["APPNAME"] . "- Register Step 3";
      $data["username"] = $_SESSION["username"] ?? "user";
      Controller::useViews(["templates.auth_header", "auth.register3", "templates.auth_footer"], $data);
    } else {
      $jurusan = ["jurusan" => strtoupper($this->input->post("jurusan"))];
      $where = ["username" => $_SESSION["username"], "id_user" => $_SESSION["userid"]];

      if(DB::table("tb_siswa")->update($jurusan, $where) > 0) {
        if(!session_status()||!session_id())session_start();
        $_SESSION["jurusan"] = strtoupper($this->input->post("jurusan"));
        redirect(base_url("/auth/register4"));
      }
    }
  }

  public function register4()
  {
    $formvalidation = Controller::loadLibrary("FormValidation");
    if($formvalidation->run() == false) {
      $data["title"] = $_ENV["APPNAME"] . "- Register Step 4";
      $data["username"] = $_SESSION["username"] ?? "user";
      Controller::useViews(["templates.auth_header", "auth.register4", "templates.auth_footer"], $data);
    } else {
      $kelas = strtoupper($this->input->post("kelas"));

      if(!session_status()||!session_id()) session_start();
      $_SESSION["kelas"] = $kelas;
      redirect(base_url("/auth/register5"));
    }
  }

  public function register5()
  {
    $formvalidation = Controller::loadLibrary("FormValidation");
    if($formvalidation->run() == false) {
      $data["title"] = $_ENV["APPNAME"] . "- Register Step 5";
      $data["username"] = $_SESSION["username"] ?? "user";
      Controller::useViews(["templates.auth_header", "auth.register5", "templates.auth_footer"], $data);
    } else {
      $index = $this->input->post("index");
      $index = explode("-", $index);
      $index = end($index);

      $kelas = $_SESSION["kelas"] . " " . $_SESSION["jurusan"] . " " . $index;

      $datakelasfull = ["kelas" => $kelas];
      $where = ["username" => $_SESSION["username"], "id_user" => $_SESSION["userid"]];

      if(DB::table("tb_siswa")->update($datakelasfull, $where) > 0) {
        
        dump(DB::table("tb_siswa")->where("username", $_SESSION["username"])->get());
      }
    }
  }
}
