<?php
class Database
{
    // account credentials
    // private $host = "fdb33.awardspace.net";
    // private $db_name = " 4148983_database";  
    // private $username = "4148983_database";
    // private $password = "!NT{gslnhbvrf#369";
    private $host = "localhost";
    private $db_name = "DataBase";  
    private $username = "root";
    private $password = "!NT{gslnhbvrf#369";
    public $conn;

    // connection with data base
    public function getConnection()
    {
        $this->conn = null;
        $this->conn = new mysqli($this->host , $this->username, $this->password, $this->db_name);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 

        return $this->conn;
    }
}
