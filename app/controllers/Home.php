<?php

defined("BASEPATH") or die("Direct scripting is not allowed.");

class Home
{
  public function index()
  {
    $user1 = [
      "id" => "1",
      "username" => "Prihan"
    ];
    $data = DB::table("test")->insert($user1);
    dump($data);
  }
}
