<?php

// Connection necessary files
include_once "./index.php";

// Furniture product type class
class Furniture extends Product
{
    private $strAttributes;
    private $height;
    private $width;
    private $length;


    private function setAttributesData($attributes)
    {
        $this->sku = $attributes["sku"];
        $this->name = $attributes["name"];
        $this->price = $attributes["price"];
        $this->type = $attributes["productType"];
        $this->height = $attributes["height"];
        $this->width = $attributes["width"];
        $this->length = $attributes["length"];
    }

    public function saveData($postValues)
    {
        self::setAttributesData($postValues);
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
