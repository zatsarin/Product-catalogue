<?php

// Connection necessary files
include_once "./index.php";

class SqlData
{
    private $arrOfClasses;
    private $classObject;
    private $formatedStr;
    
    // Read all data from table "products"
    public static function readDataSQL()
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT * FROM products ORDER BY sku";
        $result = $db->query($sql);

        if ($db->query($sql) === false) {
            die($db->error);
        }
        mysqli_close($db);
        return $result;
    }

    // Delete data from table "products" by sku
    public static function removeDataSQL($productSku)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "DELETE FROM products WHERE sku = '$productSku'";
        $result = $db->query($sql);
        
        if ($db->query($sql) === false) {
            die($db->error);
        }
        mysqli_close($db);
    }

    // Save product data to table "products"
    public static function setDataSQL($params)
    {
        $database = new Database();
        $db = $database->getConnection();
     
        $sql = "INSERT INTO products (sku, name, price, type, attributes)

            VALUES('$params[0]', '$params[1]', '$params[2]', '$params[3]', '$params[4]')";

        if ($db->query($sql) === false) {
            die($db->error);
        }
        mysqli_close($db);
    }

    // Fill products list in index
    public static function fillProductList()
    {
        echo '<div id="grid">';
        $str = self::readDataSQL();

        while ($row = $str->fetch_assoc()) {
            echo "<div class='cell'>";
            echo "<input type='checkbox' class='delete-checkbox'>";
            echo "<div class='attributes'>";
            echo "<label>$row[sku]</label>";
            echo "<label>$row[name]</label>";
            echo "<label>$row[price] $</label>";

            $arrOfClasses = [];
            $arrOfClasses[] = new Book();
            $arrOfClasses[] = new DVD();
            $arrOfClasses[] = new Furniture();

            $classObject = $arrOfClasses[$row["type"]-1];
            $formatedStr = $classObject->getFormatedString($row["attributes"]);
            echo "<label>$formatedStr</label>";
            echo "</div>";
            echo "</div>";
        }
        echo '</div>';
    }

    // Read existing sku and write to localstorage
    public static function readExistingSku()
    {
        $allValuesStr = self::readDataSQL();
        $skuArray = [];

        while ($row = $allValuesStr->fetch_assoc()) {
            $skuArray[] = $row["sku"];
        }
        return $skuArray;
    }
}
