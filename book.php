<?php

// Connection necessary files
include_once "./index.php";

// Book product type class
class Book extends Product
{
    private $weight;
    private $str;
    private $formatedStr;

    private function setAttributesData($attributes)
    {
        $this->sku = $attributes["sku"];
        $this->name = $attributes["name"];
        $this->price = $attributes["price"];
        $this->type = $attributes["productType"];
        $this->weight = $attributes["weight"];
    }

    public function saveData($postValues)
    {
        self::setAttributesData($postValues);
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
