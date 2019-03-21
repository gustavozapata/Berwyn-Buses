<?php

require_once "../controller/cart.php";
require_once "../model/Coach.php";
require_once "../model/DataAccess.php";


if(isset($_REQUEST["passengers"])) {
    $passengers = htmlentities($_REQUEST["passengers"]);
    //https://stackoverflow.com/questions/44969782/submitting-php-html-date-to-mysql-date
    $dateFrom = htmlentities(date("Y-m-d",strtotime($_REQUEST["depart"])));
    $dateTo = htmlentities(date("Y-m-d",strtotime($_REQUEST["return"])));
    $price = htmlentities($_REQUEST["price"]);
    $isDriver = isset($_REQUEST["requireDriver"]) ? $_REQUEST["requireDriver"] : false;
    $coaches = DataAccess::getInstance()->searchCoaches2($passengers, $dateFrom, $dateTo, $price, $isDriver);
    unset($_SESSION['basket']);
}

if(isset($_REQUEST["basketItems"])){
    $array = json_decode($_REQUEST["coachSelection"]);
    $_SESSION["basket"]->items = $_REQUEST["basketItems"];
    array_push($_SESSION["basket"]->coaches, $array);
}

require_once "../view/search.php"; 

?>