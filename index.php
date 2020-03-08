<?php

/**
 * Skenvent Version 2
 */

if (!session_status() || !session_id()) session_start();


define("BASEPATH", "Skenvent");
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", strtr(rtrim(getcwd(), "/\\"), "/\\", DS . DS));

$app_path = "app";

if ($app_dir = realpath($app_path)) {
  $app_path = $app_dir . DS;
} else {
  $app_path = strtr(rtrim($app_path, "/\\"), "/\\", DS . DS);
}

define("APP_PATH", $app_path);
include APP_PATH . "core" . DS . "Skenvent.php";
