<?php

class CLI 
{
  private $cli;

  public function __construct($cli_command)
  {
    include_once "Dotenv.php";

    Dotenv::setPath(getcwd());
    $this->cli = $cli_command;
    array_shift( $this->cli );

    if( isset( $this->cli[0] ) ) {
      $method = $this->cli[0];

      $this->$method($this->cli[1], $this->cli[2]);
    }
  }

  public function db( $param, $dbFile ) 
  {
    $dbHost = $_ENV["DB_HOST"];
    $dbUser = $_ENV["DB_USER"];
    $dbName = $_ENV["DB_NAME"];
    $dbPass = $_ENV["DB_PASS"];
    $charset= $_ENV["CHARSET"];

    # open connection
    $conn = mysqli_connect( $dbHost, $dbUser, $dbPass ) or die( "can't connect to localhost." );

    mysqli_select_db( $conn, $dbName );

    if( strtolower( $param ) === "--refresh" ) {
      $fullpath = getcwd() . DIRECTORY_SEPARATOR . $dbFile . ".sql";

      if( file_exists( $fullpath ) ) {

        $handler = fopen( $fullpath, "r" );
        $tempSql = "";

        while( $line = fgets( $handler ) ) {

          if( substr( $line, 0, 2) == "--" || $line == "" ) 
            continue;

          $tempSql .= $line;

          if( substr(trim($line), -1, 1) == ";" ) {
            $res = mysqli_query( $conn, $tempSql );

            if( $res ) 
              var_dump("Querying...");
              
            $tempSql = "";
          }

        }

      }

      echo "Database refreshed successfully";
    }
  }
}