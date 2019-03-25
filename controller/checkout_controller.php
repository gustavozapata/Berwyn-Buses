<?php

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";
require_once "../model/Customer.php";
require_once "../model/Promotion.php";
require_once "../model/Driver.php";

$comesFromSearch = false;
$_SESSION["accountCreated"] = false;

if(isset($_REQUEST["coachSelection"])) {
    $_SESSION["basket"]->coaches = [];
    $temp = explode(",", $_REQUEST['coachSelection']);
    $_SESSION["basket"]->coaches = array_merge($_SESSION["basket"]->coaches, $temp);
    if(empty($_SESSION["basket"]->coaches)){
        $_SESSION["basket"]->items = 0;
    } else {
        $_SESSION["basket"]->items = count($_SESSION["basket"]->coaches);
    }
    $_SESSION["basket"]->passengers = $_REQUEST["passengers"];
    $_SESSION["basket"]->from = $_REQUEST["depart"];
    $_SESSION["basket"]->to = $_REQUEST["return"];
    $coaches = DataAccess::getInstance()->getSelectedCoaches($_SESSION["basket"]->coaches);
    $comesFromSearch = true;
} else if(isset($_SESSION["basket"]) && $_SESSION["basket"]->items > 0){
    $coaches = DataAccess::getInstance()->getSelectedCoaches($_SESSION["basket"]->coaches);
}

function calculateTripDays(){
    $dateFormatFrom = str_replace('/', '-', $_SESSION["basket"]->from);
    $dateFormatto = str_replace('/', '-', $_SESSION["basket"]->to);
    $dateFormatFrom = date('Y-m-d', strtotime($dateFormatFrom));
    $dateFormatto = date('Y-m-d', strtotime($dateFormatto));
    $timeFrom = new DateTime($dateFormatFrom);
    $timeTo = new DateTime($dateFormatto);
    //https://stackoverflow.com/questions/2040560/finding-the-number-of-days-between-two-dates
    $diff = $timeTo->diff($timeFrom)->format("%a");
    return $diff;
}

function getPromoCodes(){
    $codes = DataAccess::getInstance()->getPromotions();
    return $codes;
}

if($_SESSION["basket"]->isDriver){
    $dateFormatFrom = str_replace('/', '-', $_SESSION["basket"]->from);
    $dateFormatto = str_replace('/', '-', $_SESSION["basket"]->to);
    $dateFormatFrom = date('Y-m-d', strtotime($dateFormatFrom));
    $dateFormatto = date('Y-m-d', strtotime($dateFormatto));
    $drivers = DataAccess::getInstance()->getDrivers($dateFormatFrom, $dateFormatto);
}

if(isset($_REQUEST["price"])){
    $comesFromSearch = true;
}

if(isset($_REQUEST["applyPromo"])){
    header('Content-Type: application/json');
    $promoJson = json_decode($_REQUEST["applyPromo"]);
    $promoJson = htmlentities($promoJson);
    $codes = DataAccess::getInstance()->checkPromotion($promoJson);
    echo json_encode($codes);
    exit();
}

if(isset($_REQUEST["completeBooking"])){
    $_SESSION["basket"]->from = str_replace('/', '-', $_SESSION["basket"]->from);
    $_SESSION["basket"]->to = str_replace('/', '-', $_SESSION["basket"]->to);
    $_SESSION["basket"]->from = date('Y-m-d', strtotime($_SESSION["basket"]->from));
    $_SESSION["basket"]->to = date('Y-m-d', strtotime($_SESSION["basket"]->to));
    $insertBooking = DataAccess::getInstance()->completeBooking();
    unset($_SESSION['basket']);
}

if(isset($_REQUEST['clearBasket'])){
    unset($_SESSION['basket']);
}

if(isset($_REQUEST["givenName"])){
    $user = (object) [
        'givenName' => htmlentities($_REQUEST["givenName"]),
        'familyName' => htmlentities($_REQUEST["familyName"]),
        'dob' => htmlentities($_REQUEST["dob"]),
        'email' => htmlentities($_REQUEST["email"]),
        'password' => htmlentities($_REQUEST["password"]),
        'mobileNumber' => htmlentities($_REQUEST["mobileNumber"]),
        'houseNumber' => htmlentities($_REQUEST["houseNumber"]),
        'streetName' => htmlentities($_REQUEST["streetName"]),
        'town' => htmlentities($_REQUEST["town"]),
        'postcode' => htmlentities($_REQUEST["postcode"]),
        'licence' => htmlentities($_REQUEST["licence"]),
        'licenceExpiry' => htmlentities($_REQUEST["licenceExpiry"])
    ];
    $addUser = DataAccess::getInstance()->createUserAccount($user);
    logUser();
}

function logUser(){
    if ($_POST) {
        if(isset($_REQUEST["givenName"])) {
            $_SESSION["username"] = htmlentities($_REQUEST["email"]);
            $_SESSION["userLogged"] = true;
            $_SESSION["accountCreated"] = true;
        }
    }
}

if(isset($_REQUEST["fromLogin"])){
    header("Location: ../view/customer_view.php");
}

if ($_POST) {
    if(isset($_REQUEST["emailFromBasket"])) {
      $_SESSION["username"] = htmlentities($_REQUEST["emailFromBasket"]);
      $password = htmlentities($_REQUEST["passwordFromBasket"]);
      $user = DataAccess::getInstance()->checkLoginDetails($_SESSION["username"], $password, "Customer");
      if($user){
        if($user[0]->username == $_SESSION["username"] && $user[0]->password == $password){
          $_SESSION["userLogged"] = true;
          $_SESSION["id"] = $user[0]->id;
          $_SESSION["givenName"] = $user[0]->givenName;
          header("Location: " . $_SERVER['REQUEST_URI']);
          exit;
        }
      }
    }
}

require_once "../view/checkout.php";

?>