<?php


defined("BASEPATH") or die("Direct scripting is not allowed.");


class DBWrapper
{
  private $dbHost, $dbUser, $dbPass, $dbName, $charset, $dbh, $stmt;

  public function __construct()
  {
    $this->dbHost = useEnv("DB_HOST") !== "" ? useEnv("DB_HOST") : "localhost";
    $this->dbUser = useEnv("DB_USER") !== "" ? useEnv("DB_USER") : "root";
    $this->dbPass = useEnv("DB_PASS") !== "" ? useEnv("DB_PASS") : "";
    $this->dbName = useEnv("DB_NAME");
    $this->charset = useEnv("CHARSET") !== "" ? useEnv("CHARSET") : "utf8mb4";

    $dsn = "mysql:host={$this->dbHost};dbname={$this->dbName};charset={$this->charset}";

    $opt = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    try {
      $this->dbh = new PDO($dsn, $this->dbUser, $this->dbPass, $opt);
    } catch (PDOException $err) {
      die($err->getMessage());
    }
  }

  public function pQ($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }

  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  public function exec()
  {
    $this->stmt->execute();
  }

  public function get()
  {
    $this->exec();

    return $this->stmt->fetch();
  }

  public function all()
  {
    $this->exec();

    return $this->stmt->fetchAll();
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }

  public function getDBName()
  {
    return $this->dbName  ;
  }
}
