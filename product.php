<?php

// Connection necessary files
include_once "./index.php";

// Main abstract product class
abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    // Set properties of object and add it to database
    abstract public function setAttributesData($attributes);
    // Save object to database
    abstract public function saveData($postValues);
    // Format description text for index page
    abstract public function getFormatedString($value);
}
