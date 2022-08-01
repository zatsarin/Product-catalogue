<?php

if ($_POST) {
    // Сonnection necessary files
    include_once "./index.php";

    // Delete product
    $elementsSkuArr = json_decode($_POST['skuValArr']);

    foreach ($elementsSkuArr as $element) {
        SqlData::removeDataSQL($element);
    }
}
