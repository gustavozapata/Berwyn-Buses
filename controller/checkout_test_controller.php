<?php

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";

$comesFromSearch = false;

if(isset($_REQUEST["coachSelection"])) {
    $temp = explode(",", $_REQUEST['coachSelection']);
    $_SESSION["basket"]->coaches = array_merge($_SESSION["basket"]->coaches, $temp);
    $_SESSION["basket"]->items = count($_SESSION["basket"]->coaches);
    $coaches = DataAccess::getInstance()->getSelectedCoaches($_SESSION["basket"]->coaches);
    $comesFromSearch = true;
} else if(isset($_SESSION["basket"]) && $_SESSION["basket"]->items > 0){
    $coaches = DataAccess::getInstance()->getSelectedCoaches($_SESSION["basket"]->coaches);
}

if(isset($_REQUEST["price"])){
    $comesFromSearch = true;
}

if(isset($_REQUEST['clearBasket'])){
    unset($_SESSION['basket']);
}

if(isset($_REQUEST["givenName"])){
    $user = (object) [
        'givenName' => $_REQUEST["givenName"],
        'familyName' => $_REQUEST["familyName"],
        'dob' => $_REQUEST["dob"],
        'email' => $_REQUEST["email"],
        'password' => $_REQUEST["password"],
        'mobileNumber' => $_REQUEST["mobileNumber"],
        'houseNumber' => $_REQUEST["houseNumber"],
        'streetName' => $_REQUEST["streetName"],
        'town' => $_REQUEST["town"],
        'postcode' => $_REQUEST["postcode"],
        'licence' => $_REQUEST["licence"],
        'licenceExpiry' => $_REQUEST["licenceExpiry"]
    ];
    $addUser = DataAccess::getInstance()->createUserAccount($user);
    logUser();
}

function logUser(){
    if ($_POST) {
        if(isset($_REQUEST["email"])) {
            $_SESSION["username"] = htmlentities($_REQUEST["email"]);
            $_SESSION["userLogged"] = true;
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }
}

require_once "../view/checkout_test.php";

?>