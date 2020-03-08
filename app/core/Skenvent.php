<?php

defined("BASEPATH") or die("Direct scripting is not allowed.");

// constant predefined
define("COREPATH", APP_PATH . "core" . DS);
define("CONTRPATH", APP_PATH . "controllers" . DS);
define("VIEWPATH", APP_PATH . "views" . DS);
define("LIBSPATH", APP_PATH . "library" . DS);
define("AJAXPATH", APP_PATH . "ajax" . DS);

// error pages predefined constant
define("BAD_REQUEST_ERROR",     400);
define("UNAUTHORIZED_ERROR",    401);
define("FORBIDDEN_ERROR",       403);
define("NOT_FOUND_ERROR",       404);
define("TIMEOUT_ERROR",         408);
define("INTERNAL_ERROR",        500);
define("BAD_GATEWAY_ERROR",     502);
define("UNVAILABLE_ERROR",      503);

if (file_exists(COREPATH . "Common.php"))
  include COREPATH . "Common.php";


// load environment
loadfile("Dotenv", COREPATH);
Dotenv::setPath(getcwd());

// load controller
loadfile("Controller", COREPATH);

// prepare db
loadfile("DB", COREPATH);

// load route
loadfile("Route", COREPATH);
$URI = $_REQUEST["url"] ?? null;
Route::generate($URI);
