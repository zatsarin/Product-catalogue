<?php

// Connection necessary files
include_once "./index.php";

$class = ChosenTypeInList::chosenType($_POST["productType"]);
$class->saveData($_POST);

//  Redirect to index page
echo "<script> window.location.replace('./') </script>";
