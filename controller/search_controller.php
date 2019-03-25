<?php
session_start();

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
    $_SESSION["basket"]->isDriver = isset($_REQUEST["requireDriver"]);
    $coaches = DataAccess::getInstance()->searchCoaches($passengers, $dateFrom, $dateTo, $price);
}

if(isset($_REQUEST["coachSelection"])){
    $array = json_decode($_REQUEST["coachSelection"]);
    // $_SESSION["basket"]->items = $_REQUEST["basketItems"];
    $_SESSION["basket"]->items = count($_SESSION["basket"]->coaches);
    array_push($_SESSION["basket"]->coaches, $array);
}

require_once "../view/search.php"; 

?>