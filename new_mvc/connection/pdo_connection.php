<?php

class pdo_connection {
    
    private $conn;
    private $host = 'localhost';
    private $username = 'root';
    private $pwd = 'root';
    private $database = 'transy';
        
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database",$this->username,
                                    $this->pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex) {
            echo 'Could not connect to db: '. $ex->getMessage();
        }
        return $this->conn;
    }
    public function getConnection(){
        if($this->conn instanceof PDO){
            return $this->conn;
        }
    }
}