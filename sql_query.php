<?php

// Connection necessary files  for sql connection
include_once "./config/database.php";

class SqlData
{
    // Read all data from table "products"
    public static function readDataSQL()
    {
        // getting connection with database
        $database = new Database();
        $db = $database->getConnection();

        // query
        $sql = "SELECT * FROM products ORDER BY sku";
        $result = $db->query($sql);

        if ($db->query($sql) === false) {
            die($db->error);           
        }
        
        // closing connection
        mysqli_close($db);

        return $result;
    }

    // Selete data from table "products" by sku
    public static function removeDataSQL($product_id)
    {
        // getting connection with database
        $database = new Database();
        $db = $database->getConnection();

        // query
        $sql = "DELETE FROM products WHERE sku = '$product_id'";
        $result = $db->query($sql);
        
        if ($db->query($sql) === false) {
            die($db->error);           
        }
        // closing connection
        mysqli_close($db);

        // return $result;
    }

    // Save product data to table "products"
    public function setDataSQL($params)
    {
        // getting connection with database
        $database = new Database();
        $db = $database->getConnection();      
     
        // query
        $sql = "INSERT INTO products (sku, name, price, type, attributes)

            VALUES('$params[0]', '$params[1]', '$params[2]', '$params[3]', '$params[4]')";

        if ($db->query($sql) === false) {
            die($db->error);           
        }

        // closing connection
        mysqli_close($db);
    }
}
