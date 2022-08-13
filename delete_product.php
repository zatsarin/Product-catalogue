<?php

// Сonnection necessary files
include_once "./index.php";

// Delete product
SqlData::deleteDataSQL($_POST['skuValArr']);
