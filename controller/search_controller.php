<?php

require_once "../controller/cart.php";
require_once "../model/Coach.php";
require_once "../model/DataAccess.php";


if(isset($_REQUEST["passengers"])) {
    $passengers = htmlentities($_REQUEST["passengers"]);
    //https://stackoverflow.com/questions/44969782/submitting-php-html-date-to-mysql-date
    $dateFrom = str_replace('/', '-', $_REQUEST["depart"]);
    $dateTo = str_replace('/', '-', $_REQUEST["return"]);
    $dateFrom = htmlentities(date("Y-m-d",strtotime($dateFrom)));
    $dateTo = htmlentities(date("Y-m-d",strtotime($dateTo)));
    $price = htmlentities($_REQUEST["price"]);
    $isDriver = isset($_REQUEST["requireDriver"]) ? $_REQUEST["requireDriver"] : false;
    $coaches = DataAccess::getInstance()->searchCoaches($passengers, $dateFrom, $dateTo, $price);
}

if(isset($_REQUEST["basketItems"])){
    $array = json_decode($_REQUEST["coachSelection"]);
    $_SESSION["basket"]->items = $_REQUEST["basketItems"];
    array_push($_SESSION["basket"]->coaches, $array);
}

require_once "../view/search.php"; 

?>