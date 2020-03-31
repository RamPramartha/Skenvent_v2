<?php

defined("BASEPATH") or die("Direct scripting is not allowed.");

if (!function_exists("loadfile")) {
  function loadfile($path = null, $dir = null)
  {
    if (!is_dir($dir))
      die("Folder '{$dir}' not found.");

    $_root_dir = opendir($dir);

    $_filename = "{$path}.php";

    while ($_dir_file = readdir($_root_dir)) {
      if (!preg_match("/^[.]+$/", $_dir_file)) {
        if (!is_dir($_dir_file)) {
          if ($_filename == $_dir_file) {
            $_filename = $dir . $_filename;
            include_once $_filename;
          }
        }
      }
    }
  }
}



if (!function_exists("dump")) {
  function dump($data)
  {
    $data = $data ?? "Data can't be empty.";

    echo "<pre>";
    var_dump($data);
    echo "</pre>";
  }
}


if (!function_exists("useAJAX")) {
  function useAJAX($ajax)
  {
    if (!isset($ajax))
      die("File not found");

    $path = "app/ajax/{$ajax}.php";

    return $path;
  }
}



if (!function_exists("useEnv")) {
  function useEnv($name)
  {
    if (!isset($name))
      die("Environment file not found.");

    $res = $_ENV[$name] ?? null;

    return $res;
  }
}

if (!function_exists("currpath")) {
  function currpath()
  {
    if (isset($_SERVER)) {
      $req_scheme =
        (isset($_SERVER["HTTPS"]) &&
          $_SERVER["HTTPS"] === "on")
        ? "https"
        : "http";

      $req_host = @$_SERVER["HTTP_HOST"] ?? @$_SERVER["SERVER_NAME"];
      $req_uri  = @$_SERVER["REQUEST_URI"] ?? "/";

      $curr_uri = "{$req_scheme}://{$req_host}{$req_uri}";
      $curr_uri = filter_var($curr_uri, FILTER_SANITIZE_URL);

      return $curr_uri;
    }
  }
}

if (!function_exists("base_url")) {
  function base_url($uri_prefixer = null)
  {
    $uri_prefixer = $uri_prefixer ?? "";
    if ($_ENV["BASEURL"] !== "") {
      @$uri = $_ENV["BASEURL"] . $uri_prefixer;
    }
    return $uri;
  }
}

if (!function_exists("formRun")) {
  function formRun()
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      return true;
    } else {
      return false;
    }
  }
}


if (!function_exists("redirect")) {
  function redirect($url = "", $redirect_code = null)
  {
    if (isset($url) && !isset($redirect_code)) {
      header("Location: " . $url);
    } else {

      switch ($redirect_code) {
        case 400:
          header("Location: " . base_url("/errorpages/badrequest"));
          $_SESSION["redirect_code"] = $redirect_code;
          break;
        case 401:
          header("Location: " . base_url("/errorpages/unauthorized"));
          $_SESSION["redirect_code"] = $redirect_code;
          break;
        case 403:
          header("Location: " . base_url("/errorpages/forbidden"));
          $_SESSION["redirect_code"] = $redirect_code;
          break;
        case 404:
          header("Location: " . base_url("/errorpages/notfound"));
          $_SESSION["redirect_code"] = $redirect_code;
          break;
        case 408:
          header("Location: " . base_url("/errorpages/timeout"));
          $_SESSION["redirect_code"] = $redirect_code;
          break;
        case 500:
          header("Location: " . base_url("/errorpages/internalerr"));
          $_SESSION["redirect_code"] = $redirect_code;
          break;
        case 502:
          header("Location: " . base_url("/errorpages/badgateway"));
          $_SESSION["redirect_code"] = $redirect_code;
          break;
        case 503:
          header("Location: " . base_url("/errorpages/unvailable"));
          $_SESSION["redirect_code"] = $redirect_code;
          break;
      }
    }
  }
}


if (!function_exists("setSession")) {
  function setSession($_sessdata = null)
  {
    if (!session_status() || !session_id()) session_start();

    $_sessdata = $_sessdata ?? die("Your session data can't be empty.");

    if (is_array($_sessdata)) {
      foreach ($_sessdata as $_sessname => $_sessval) {
        $_SESSION[$_sessname] = $_sessval;
      }
    } else {
      die("Illegal type for setting session. Expected array!");
    }
  }
}

if (!function_exists("setCookies")) {
  function setCookies($_cookiedata = null, $time = 3600, $path = "/")
  {
    if (!session_status() || !session_id()) session_start();
    $_cookiedata = $_cookiedata ?? die("Your data can't leave empty.");



    if (is_array($_cookiedata)) {
      foreach ($_cookiedata as $_cn => $_cv) {
        setcookie($_cn, $_cv, time() + $time, $path);
      }
    } else {
      die("Illegal type for setting cookie. Expected array!");
    }
  }
}

if (!function_exists("unsetCookies")) {
  function unsetCookies( $cookieName ) 
  {
    foreach( $cookieName as $cn ) {
      if( isset( $_COOKIE[$cn] ) ) {
        setcookie($cn, "", time() - 7200, "/");
      }
    }
  }
} 
if (!function_exists("sessUnset")) {
  function sessUnset($sessName)
  {
    foreach( $sessName as $sn ) {
      unset( $_SESSION[$sn] );
    }
  }
}

if (!function_exists("sessDestroy")) {
  function sessDestroy()
  {
    session_destroy();
    session_unset();
    $_SESSION = [];
  }
}