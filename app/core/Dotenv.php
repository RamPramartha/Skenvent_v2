<?php

class Dotenv
{
  public static function setPath($url)
  {
    $url = $url ?? die("Can't be empty.");

    if (!file_exists($url . DIRECTORY_SEPARATOR . ".env")) die("File environment not found");

    $_env_dir = fopen($url . DIRECTORY_SEPARATOR . ".env", "r");

    while ($_lines = fgets($_env_dir)) {
      $_lines = trim($_lines);
      if ($_lines !== "") {
        if (strpos($_lines, "\"") || strpos($_lines, "'")) {
          $_lines = str_replace("\"", "", $_lines);
          $_lines = str_replace("'", "", $_lines);
        }

        $_lines = explode("=", $_lines);

        if (count($_lines) > 1) {
          $_ENV[$_lines[0]] = $_lines[1];
        }
      }
    }
  }
}
