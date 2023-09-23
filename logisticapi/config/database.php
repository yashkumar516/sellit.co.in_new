<?php

class Database{
  
  private $hostname;
  private $dbname;
  private $username;
  private $password;
  private $conn;

  public function connect(){

    $this->hostname = "localhost";
    $this->dbname = "sellit";
    $this->username = "sellit";
    $this->password = "NqPTi#HY9A8wKM";

    $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

    if($this->conn->connect_errno){
        print_r($this->conn->connect_error);
        exit;
    }else{
        return $this->conn;
    }

  }

}

?>