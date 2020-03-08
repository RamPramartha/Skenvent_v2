<?php


class Auth
{
  public function index()
  {
    $data["title"] = $_ENV["APPNAME"] . "- Login";
    Controller::useViews(["templates.auth_header", "auth.login", "templates.auth_footer"], $data);
  }
}
