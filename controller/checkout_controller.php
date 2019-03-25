<?php

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";
require_once "../model/Customer.php";
require_once "../model/Promotion.php";
require_once "../model/Driver.php";

$_SESSION["accountCreated"] = false;


// if(isset($_REQUEST["completeBooking"])){
//     $bookingJson = json_decode($_REQUEST["completeBooking"]);
//     $bookingJson->datefrom = str_replace('/', '-', $bookingJson->datefrom);
//     $bookingJson->dateto = str_replace('/', '-', $bookingJson->dateto);
//     $bookingJson->datefrom = date('Y-m-d', strtotime($bookingJson->datefrom));
//     $bookingJson->dateto = date('Y-m-d', strtotime($bookingJson->dateto));
//     $insertBooking = DataAccess::getInstance()->completeBooking($bookingJson);
//     unset($_SESSION['basket']);
// }

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

//CONTROLLER MERGED FROM OLD CART CONTROLLER
if (!isset($_SESSION["cart"])){
    $_SESSION["cart"] = [];
}
if (!isset($_SESSION["drivers"])){
    $_SESSION["drivers"] = [];
}

if(!isset($_SESSION["coaches"])){
    $_SESSION["coaches"] = [];
}
if (isset($_POST["driver"])){
    $_SESSION["driver"] = $_POST["driver"];
    if ($_SESSION["driver"] == "true"){
        $dateFormatFrom = str_replace('/', '-', $_SESSION["trip"]['depart']);
        $dateFormatto["trip"]['return'] = str_replace('/', '-', $_SESSION["trip"]['return']);
        $dateFormatFrom["trip"]['depart'] = date('Y-m-d', strtotime($_SESSION["trip"]['depart']));
        $dateFormatto["trip"]['return'] = date('Y-m-d', strtotime($_SESSION["trip"]['return']));
        $drivers = DataAccess::getInstance()->getDrivers($dateFormatFrom, $dateFormatto);  
        $_SESSION["drivers"] = $drivers;
    }
 }

if (isset($_POST["clear"])){
    if ($_POST["clear"]==true && isset($_SESSION["cart"])){
        unset($_SESSION["cart"]);
        $_POST["clear"]="false";
    }
    //$_SESSION["driver"] = $_POST["driver"];
}

if (isset($_POST["cart"])){
    $obj = json_decode($_POST["cart"]);
    $_SESSION["cart"][] = $obj;
    if(empty($_SESSION["cart"])){
        $items=0;
    } else{
        $items = count($_SESSION["cart"]);
    }
    $coaches = DataAccess::getInstance()->getSelectedCoaches($_SESSION["cart"]);
    $_SESSION["coaches"] = $coaches;
}

//the following if statement waits for the remove POST which is triggered by the remove button on the search page and the cart page.
//Once triggered, it searches for the coach to remove and then removes it from the session variable
if (isset($_POST["remove"])){
    $obj = json_decode($_POST["remove"]);
    $index = array_search($obj, $_SESSION["cart"]); //finds the index of the object
    unset($_SESSION["cart"][$index]); //removes the object
}

//Setting the session variables for the trip details
//If we make the dates and number of passengers required, we set all variables in one if statement

if (!isset($_SESSION["trip"]))
{
    $_SESSION["trip"]=[
        'depart' => '',
        'return' => '',
        'passengers' => 0
    ];
}

if (isset($_POST["depart"])){
    $_SESSION["trip"]['depart'] = $_POST["depart"];
}

if (isset($_POST["return"])){
    $_SESSION["trip"]['return'] = $_POST["return"];
    
}

if (isset($_POST["passengers"])){
    $_SESSION["trip"]['passengers'] = $_POST["passengers"];
}


if(isset($_POST["completeBooking"])){
    $_SESSION["trip"]['depart'] = str_replace('/', '-', $_SESSION["trip"]['depart']);
    $_SESSION["trip"]['return'] = str_replace('/', '-', $_SESSION["trip"]['return']);
    $_SESSION["trip"]['depart'] = date('Y-m-d', strtotime($_SESSION["trip"]['depart']));
    $_SESSION["trip"]['return'] = date('Y-m-d', strtotime($_SESSION["trip"]['return']));
    $insertBooking = DataAccess::getInstance()->completeBooking();
    unset($_SESSION["cart"]);
    unset($_SESSION["trip"]);
}


require_once "../view/checkout.php";
?>