<?php

include_once './sql_query.php';

if ($_POST) {
    // Delete product
    $elementSku = $_POST['variable'];
    SqlData::removeDataSQL($elementSku);
}
