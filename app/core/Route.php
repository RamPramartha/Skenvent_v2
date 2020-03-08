<?php

defined("BASEPATH") or die("Direct scripting is not allowed.");

class Route
{
  private static $controller;
  private static $method;
  private static $params;
  public static function generate($url)
  {
    self::$controller = useEnv("DEF_HOMEPAGE") !== "" ? useEnv("DEF_HOMEPAGE") : "home";
    self::$method = "index";
    self::$params = [];
    $url = $url ?? null;
    $url = self::parse($url);

    if (isset($url)) {
      if (file_exists(CONTRPATH . $url[0] . ".php")) {
        self::$controller = $url[0];
        unset($url[0]);
      } elseif (strtolower($url[0]) === "errorpages") {
        self::$controller = $url[0];
        include COREPATH . "errorpages" . ".php";
      }
    }
    if (isset($url[0]) && strtolower($url[0]) === "errorpages")
      unset($url[0]);
    else
      include CONTRPATH . self::$controller . ".php";

    self::$controller = new self::$controller;


    if (isset($url[1])) {
      if (method_exists(self::$controller, $url[1])) {
        self::$method = $url[1];
        unset($url[1]);
      }
    }

    if (!empty($url)) {
      self::$params = array_values($url);
    }

    call_user_func_array([self::$controller, self::$method], self::$params);
  }

  private static function parse($url)
  {
    if (isset($url)) {
      $url = rtrim($url);
      $url = rtrim($url, "/");
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode("/", $url);
      return $url;
    } else {
      return $url;
    }
  }
}
