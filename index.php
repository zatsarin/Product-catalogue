<?php

    // Connection necessary file
    include_once './product.php';
    include_once './sql_query.php';
    include_once './type.php';
    include_once "./config/database.php";  

    // Entrance point
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri === '/add-product') {
        require './add_product.php';      
    } else {
        require './main.php';
    }
