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
    public function setAttributesData($attributes) {}
    // Save object to database
    public function saveData($postValues) {}
    // Format description text for index page
    public function getFormatedString($value) {}
}
