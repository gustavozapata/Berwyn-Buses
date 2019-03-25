<?php

session_start();

require_once "../model/Customer.php";
require_once "../model/Booking.php";
require_once "../model/DataAccess.php";

if(isset($_SESSION["userLogged"]) && $_SESSION["userLogged"]){
  unset($_SESSION['adminLogged']);
  $_SESSION["userLogged"] = true;
  $booking = DataAccess::getInstance()->getBookings($_SESSION['id']);
} else {
  $_SESSION["userLogged"] = false;
}

//https://stackoverflow.com/questions/4142809/simple-post-redirect-get-code-example
if ($_POST) {
  if(isset($_REQUEST["email"])) {
    $_SESSION["username"] = htmlentities($_REQUEST["email"]);
    $password = htmlentities($_REQUEST["password"]);
    $user = DataAccess::getInstance()->checkLoginDetails($_SESSION["username"], $password, "Customer");
    if($user){
      if($user[0]->username == $_SESSION["username"] && $user[0]->password == $password){
        $_SESSION["userLogged"] = true;
        $_SESSION["givenName"] = $user[0]->givenName;
        $_SESSION["id"] = $user[0]->id;
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
      }
    }
  }
}

require_once "../view/customer_view.php"; 

?>