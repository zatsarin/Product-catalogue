<?php

// Connection necessary files  for sql connection
include_once './sql_query.php';

// Main abstract product class
abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
  
    abstract public function saveData();
}

// Dvd product type class
class DVD extends Product
{
    private $size;
    private $str;
    private $formatedStr;

    public function setAttributesData($attributes)
    {   
        $this->sku = $attributes[0];
        $this->name = $attributes[1];
        $this->price = $attributes[2];
        $this->type = $attributes[3];
        $this->size = $attributes[5];
    }

    public function getFormatedString($value)
    {   
        $str = str_replace(array('[', ']', '"'), ' ', $value);
        $formatedStr = "Size: $str MB";

        return $formatedStr;
    }

    public function saveData()
    {
        $arrToJson = json_encode([$this->size]);
        SqlData::setDataSQL([$this->sku, $this->name, $this->price, $this->type, $arrToJson]);
    }

}

// Book product type class
class Book extends Product
{
    private $weight;
    private $str;
    private $formatedStr;

    public function setAttributesData($attributes)
    {   
        $this->sku = $attributes[0];
        $this->name = $attributes[1];
        $this->price = $attributes[2];
        $this->type = $attributes[3];
        $this->weight = $attributes[4];
    }

    public function getFormatedString($value)
    {   
        $str = str_replace(array('[', ']', '"'), ' ', $value);
        $formatedStr = "Weight: $str KG";
        
        return $formatedStr;
    }

    public function saveData()
    {
        $arrToJson = json_encode([$this->weight]);
        SqlData::setDataSQL([$this->sku, $this->name, $this->price, $this->type, $arrToJson]);
    }

}

// Furniture product type class
class Furniture extends Product
{
    private $strAttributes;
    private $height;
    private $width;
    private $length;


    public function setAttributesData($attributes)
    {   
        $this->sku = $attributes[0];
        $this->name = $attributes[1];
        $this->price = $attributes[2];
        $this->type = $attributes[3];
        $this->height = $attributes[6];
        $this->width = $attributes[7];
        $this->length = $attributes[8];
    }

    public function getFormatedString($value)
    {   
        $attr = json_decode($value);
        $strAttributes = implode('x', $attr);
        $formatedStr = "Dimension: $strAttributes CM";

        return $formatedStr;
    }

    public function saveData()
    {
        $arrToJson = json_encode([$this->height, $this->width, $this->length]);
        SqlData::setDataSQL([$this->sku, $this->name, $this->price, $this->type, $arrToJson]);
    }

}

// Saving product data
class SaveProductData
{   
    private $classArr;
    private $class;
    private $dataArr;

    public function setDataToProduct($postSku, $postName, $postPrice, $postProductType, $postWeight, 
    $postSize, $postHeight,  $postWidth, $postLength){
       
        $classArr = [];
        $classArr[] = new Book();
        $classArr[] = new DVD();
        $classArr[] = new Furniture();

        $class = $classArr[$_POST["productType"]-1];

        $dataArr = [$postSku, $postName, $postPrice, $postProductType, $postWeight, 
        $postSize, $postHeight,  $postWidth, $postLength];

        $class->setAttributesData($dataArr);
   
        $class->saveData();    

    }
}

// Fill products list in index
class FillndexList
{
    private $arrOfClasses;
    private $classObject;
    private $formatedStr;

    public function fillProductList()
    {
    echo '<div id="grid">';

        $str = SqlData::readDataSQL();

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
}


