<?php

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";

$comesFromSearch = false;

if(isset($_REQUEST["coachSelection"])) {
    $_SESSION["basketItems"] = $_REQUEST["basketItems"];
    $_SESSION["coachSelection"] = explode(",", $_REQUEST['coachSelection']);
    // $coaches = DataAccess::getInstance()->getSelectedCoaches($_SESSION["coachSelection"]);

    $_SESSION["basket"]->items += $_SESSION["basketItems"];
    $_SESSION["basket"]->coaches = array_merge($_SESSION["basket"]->coaches, $_SESSION["coachSelection"]);
    $coaches = DataAccess::getInstance()->getSelectedCoaches($_SESSION["basket"]->coaches);
    $comesFromSearch = true;
} else if(isset($_SESSION["basket"]) && $_SESSION["basket"]->items > 0){
    $coaches = DataAccess::getInstance()->getSelectedCoaches($_SESSION["basket"]->coaches);
}

if(isset($_REQUEST['clearBasket'])){
    $_SESSION["basket"]->items = 0;
}

require_once "../view/checkout_test.php";

?>