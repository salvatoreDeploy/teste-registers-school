<?php

require_once 'Config.php';
class Database {
  public $conn;

  public function __construct(){
    $this->connect();
  }

  private function connect(){
      $this->conn = new mysqli(DATABASE_CONFIG['servername'], DATABASE_CONFIG['username'], DATABASE_CONFIG['password'], DATABASE_CONFIG['dbName']);

      if($this->conn->connect_error){
          die("Connection failed: " . $this->conn->connect_error);
      }
  }
}