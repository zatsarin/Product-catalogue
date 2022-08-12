<?php

// Connection necessary files
include_once "./index.php";

// Dvd product type class
class DVD extends Product
{
    private $size;
    private $str;
    private $formatedStr;

    private function setAttributesData($attributes)
    {
        $this->sku = $attributes["sku"];
        $this->name = $attributes["name"];
        $this->price = $attributes["price"];
        $this->type = $attributes["productType"];
        $this->size = $attributes["size"];
    }

    public function saveData($postValues)
    {
        self::setAttributesData($postValues);
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
