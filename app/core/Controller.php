<?php

defined("BASEPATH") or die("Direct scripting is not allowed.");


class Controller
{
  public static function useViews($path, $data = [])
  {
    if (isset($data) && is_array($data)) {
      foreach ($data as $key => $value) {
        $$key = $value;
      }
    }

    if (!isset($path))
      die("Views path can't be empty.");

    if (is_array($path)) {
      foreach ($path as $viewpath) {
        if (strpos($viewpath, ".")) {
          $viewpath = str_replace(".", DS, $viewpath);
          include VIEWPATH . $viewpath . ".php";
        } else {
          include VIEWPATH . $viewpath . ".php";
        }
      }
    } else {
      if (strchr($path, ".")) {
        $path = str_replace(".", "/", $path);
        include VIEWPATH . $path . ".php";
      } else {
        include VIEWPATH . $path . ".php";
      }
    }
  }

  public static function loadLibrary($lib)
  {
    if (!isset($lib)) die("Parameter can't be empty.");

    $path = LIBSPATH . "{$lib}.php";
    if (!file_exists($path)) die("Library file not found with name: {$lib}.php");

    loadfile($lib, LIBSPATH);
    $that = new static;
    return new $lib;
  }
}
