<?php

defined("BASEPATH") or die("Direct scripting is not allowed.");

class DB
{
  private $dbh;

  private static $table;

  private $where, $where_val;

  public function __construct()
  {
    loadfile("DBWrapper", COREPATH);
    // prepare setup the database wrapper
    $this->dbh = new DBWrapper;
  }

  public static function table($tb_name)
  {
    // prepare table name
    if (!isset($tb_name)) die("Table name can't be empty.");
    self::$table = $tb_name;

    return new static;
  }

  public static function withQuery($sql, $selection = null)
  {
    if (!isset($_SESSION["err"])) {
      $selection = $selection ?? "all";
      if (!isset($sql)) die("SQL Query can't be empty.");

      $that = new static;

      $that->dbh->pQ($sql);

      if ($selection === "all")
        return $that->dbh->all();
      elseif (strtolower($selection) === "single")
        return $that->dbh->get();
    } else {
      return false;
    }
  }

  public function insert($data)
  {
    if (!isset($_SESSION["err"])) {
      if (!isset($data)) die("data can't be empty");

      $sql    = "INSERT INTO " . self::$table;
      $column = "(";
      $value  = "(";
      if (is_array($data)) {
        foreach ($data as $key => $val) {
          $column   .= "`{$key}`, ";
          $value    .= ":{$key}, ";
        }

        $column   =   rtrim($column);
        $column   =   rtrim($column, ",");
        $value    =   rtrim($value);
        $value    =   rtrim($value, ",");
        $column   .=  ") ";
        $value    .=  ") ";

        $sql .= " " . $column . " VALUES " . $value;

        $this->dbh->pQ($sql);

        foreach ($data as $key => $val) {
          $this->dbh->bind($key, $val);
        }

        $this->dbh->exec();

        return $this->dbh->rowCount();
      }
    } else {
      return false;
    }
  }

  public function update($data = null, $where = null)
  {
    if (!isset($_SESSION["err"])) {
      $data = $data ?? die("Data can't be empty.");

      $where = $where ?? die("Data can't be empty.");

      $sql = "UPDATE " . self::$table . " SET ";

      $to_bind = array();

      $column = "";
      foreach ($data as $key => $val) {
        $column         .=  "{$key}=:$key, ";
        $to_bind[$key]  =   $val;
      }

      $column   =   rtrim($column);
      $column   =   rtrim($column, ",");

      $where_q = " WHERE ";
      foreach ($where as $key => $val) {
        $where_q        .=  "{$key}=:{$key} AND ";
        $to_bind[$key]  =   $val;
      }

      $where_q = rtrim($where_q);
      $where_q = rtrim($where_q, "AND");
      $where_q = rtrim($where_q);

      $sql .= $column . $where_q;
      $this->dbh->pQ($sql);

      foreach ($to_bind as $bind_key => $bind_val) {
        $this->dbh->bind($bind_key, $bind_val);
      }

      $this->dbh->exec();

      return $this->dbh->rowCount();
    } else {
      return false;
    }
  }

  public function all()
  {
    if (!isset($_SESSION["err"])) {
      $sql = "SELECT * FROM " . self::$table;
      $this->dbh->pQ($sql);
      return $this->dbh->all();
    } else {
      return false;
    }
  }

  public function where($ver = null, $ver_val = null)
  {

    $this->where      = $ver;
    $this->where_val  = $ver_val;

    return $this;
  }

  public function truncate()
  {
    if (!isset($_SESSION["err"])) {
      if (isset(self::$table)) {
        $db_name = $this->dbh->getDBName();
        $tb_name = self::$table;
        $sql = "TRUNCATE `{$db_name}`.`{$tb_name}`";

        $this->dbh->pQ($sql);

        $this->dbh->exec();

        return 1;
      }
    }
    return false;
  }

  public function get($val = null)
  {
    $val = $val ?? "*";

    if (is_array($val)) {
      $_exp_val = "";
      // expected val = username, email, password
      foreach ($val as $key) {
        $_exp_val .= "{$key}, ";
      }

      $_exp_val = rtrim($_exp_val);
      $_exp_val = rtrim($_exp_val, ",");
    } else {
      $_exp_val = $val;
    }

    $where_q = "";
    if (is_array($this->where) && is_array($this->where_val)) {
      foreach ($this->where as $key => $val) {
        $where_q .= "{$val}=:{$val} AND ";
      }

      $where_q = rtrim($where_q);
      $where_q = rtrim($where_q, "AND");

      $sql =
        "SELECT {$_exp_val} FROM " . self::$table . " WHERE {$where_q}";
      $this->dbh->pQ($sql);

      for ($i = 0; $i < count($this->where_val); $i++) {
        $this->dbh->bind($this->where[$i], $this->where_val[$i]);
      }
    } else {
      $sql =
        "SELECT {$_exp_val} FROM " . self::$table . " WHERE {$this->where}=:query";
      $this->dbh->pQ($sql);
      $this->dbh->bind("query", $this->where_val);
    }

    return $this->dbh->get();
  }
}
