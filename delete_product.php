<?php

// Сonnection necessary files
include_once "./index.php";

// Delete product
SqlData::removeDataSQL($_POST['skuValArr']);
