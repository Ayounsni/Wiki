<?php

class Database {
    private static $instance;
    private $connection;
     private $stmt;

    private function __construct() {
        $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function query($sql){
        $this->stmt = $this->connection->prepare($sql);
      }
  
      // Bind values
      public function bind($param, $value, $type = null){
        if(is_null($type)){
          switch(true){
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
          }
        }
  
        $this->stmt->bindValue($param, $value, $type);
      }
  
      // Execute the prepared statement
      public function execute(){
        return $this->stmt->execute();
      }
      public function lastInsertId() {
        return $this->connection->lastInsertId();
    }

  
      // Get result set as array of objects
      public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }
  
      // Get single record as object
      public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
      }
  
      // Get row count
      public function rowCount(){
        return $this->stmt->rowCount();
      }
}

  ?>