<?php

// Connection necessary files
include_once "./index.php";

class ProductType
{
    private $classArr;
    private $chosenTypeId;
    private $class;
    private $selectedClass;
    // Create product object by chosen type
    public static function createProductObject($chosenTypeId)
    {
        $classArr = ["Book", "DVD", "Furniture"];
        $selectedClass = $classArr[$chosenTypeId-1];
        $class = new $selectedClass();
        return $class;
    }
}
