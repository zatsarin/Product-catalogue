<?php

// Connection necessary files
include_once "./index.php";

class ChosenTypeInList
{
    private $classArr;
    private $chosenTypeId;
    private $class;

    public static function chosenType($chosenTypeId)
    {
        $classArr = [];
        $classArr[] = new Book();
        $classArr[] = new DVD();
        $classArr[] = new Furniture();

        $class = $classArr[$chosenTypeId-1];
        return $class;
    }
}
