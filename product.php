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
}
