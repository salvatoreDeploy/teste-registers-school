<?php
class Database {
  private string $servername = "localhost";
  private string $username = "root";
  private string $password = "";
  private string $dbName = "school";

  public $conn;

  public function __construct(){
    $this->connect();
  }

  private function connect(){
      $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);

      if($this->conn->connect_error){
          die("Connection failed: " . $this->conn->connect_error);
      }else{
          echo "Connected successfully to the database.";
      }
  }
}