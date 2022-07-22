<?php
class Database
{
    // account credentials
    private $host = "localhost";
    private $db_name = "id19308153_database";  

    private $username = "id19308153_root";
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
