<?php

// Connection necessary files
include_once "./index.php";

class Type
{
    // Connection to database and table name
    private $connection;
    private $table_name = "product_type_id";

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->getConnection();
    }

    // Read types
    public function read()
    {
        $query = "SELECT
                    id, name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";
           
        $stmt = $this->connection->query($query);
        return $stmt;
        mysqli_close($this->connection);
    }
}
