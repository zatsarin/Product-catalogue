<?php
if ($_POST) {

    // Connection necessary files
    include_once "./index.php";

    $classArr = [];
    $classArr[] = new Book();
    $classArr[] = new DVD();
    $classArr[] = new Furniture();

    $class = $classArr[$_POST["productType"]-1];
    
    $class->setAttributesData($_POST);
    $class->saveData();

    //  Redirect to index page
    echo "<script> window.location.replace('./') </script>";
}
