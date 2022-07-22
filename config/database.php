<?php
class Database
{

    // account credentials
    private $host = "localhost";
    private $db_name = "DataBase";
    // private $db_name = "id19304858_database";
    

    private $username = "root";
    // private $username = "id19304858_root";
    private $password = "!NT{gslnhbvrf#369";
    public $conn;

    // connection with data base
    public function getConnection()
    {
        $this->conn = null;
        // $this->conn = new mysqli($host, $username, $password, $db_name);
        $this->conn = new mysqli("localhost", "root", "!NT{gslnhbvrf#369", "DataBase");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 

        return $this->conn;
    }
}
