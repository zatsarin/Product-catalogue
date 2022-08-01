<?php

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
        $this->sku = $attributes["sku"];
        $this->name = $attributes["name"];
        $this->price = $attributes["price"];
        $this->type = $attributes["productType"];
        $this->size = $attributes["size"];
    }

    public function saveData()
    {
        $arrToJson = json_encode([$this->size]);
        SqlData::setDataSQL([$this->sku, $this->name, $this->price, $this->type, $arrToJson]);
    }

    public function getFormatedString($value)
    {
        $str = str_replace(array('[', ']', '"'), ' ', $value);
        $formatedStr = "Size: $str MB";

        return $formatedStr;
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
        $this->sku = $attributes["sku"];
        $this->name = $attributes["name"];
        $this->price = $attributes["price"];
        $this->type = $attributes["productType"];
        $this->weight = $attributes["weight"];
    }

    public function saveData()
    {
        $arrToJson = json_encode([$this->weight]);
        SqlData::setDataSQL([$this->sku, $this->name, $this->price, $this->type, $arrToJson]);
    }

    public function getFormatedString($value)
    {
        $str = str_replace(array('[', ']', '"'), ' ', $value);
        $formatedStr = "Weight: $str KG";
        
        return $formatedStr;
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
        $this->sku = $attributes["sku"];
        $this->name = $attributes["name"];
        $this->price = $attributes["price"];
        $this->type = $attributes["productType"];
        $this->height = $attributes["height"];
        $this->width = $attributes["width"];
        $this->length = $attributes["length"];
    }

    public function saveData()
    {
        $arrToJson = json_encode([$this->height, $this->width, $this->length]);
        SqlData::setDataSQL([$this->sku, $this->name, $this->price, $this->type, $arrToJson]);
    }

    public function getFormatedString($value)
    {
        $attr = json_decode($value);
        $strAttributes = implode('x', $attr);
        $formatedStr = "Dimension: $strAttributes CM";

        return $formatedStr;
    }
}
