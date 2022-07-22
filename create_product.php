<?php

include_once './product.php';

if ($_POST) {
    
    $saveBufferClass = new SaveProductData();
    $saveBufferClass->setDataToProduct($_POST["sku"], $_POST["name"], $_POST["price"], $_POST["productType"], $_POST["weight"], 
                                    $_POST["size"], $_POST["height"], $_POST["width"], $_POST["length"]);

    //  To redirect form on a index page
    header("Location:./index.php");
    
}
