<?php

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";
require_once "../model/Customer.php";

$_SESSION["accountCreated"] = false;


if(isset($_REQUEST["completeBooking"])){
    $bookingJson = json_decode($_REQUEST["completeBooking"]);
    $bookingJson->datefrom = str_replace('/', '-', $bookingJson->datefrom);
    $bookingJson->dateto = str_replace('/', '-', $bookingJson->dateto);
    $bookingJson->datefrom = date('Y-m-d', strtotime($bookingJson->datefrom));
    $bookingJson->dateto = date('Y-m-d', strtotime($bookingJson->dateto));
    $insertBooking = DataAccess::getInstance()->completeBooking($bookingJson);
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
          header("Location: " . $_SERVER['REQUEST_URI']);
          exit;
        }
      }
    }
}

require_once "../view/checkout.php";

?>