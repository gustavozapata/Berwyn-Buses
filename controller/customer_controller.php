<?php

require_once "../model/customer.php";
require_once "../model/database.php";

$isLogged = false;

if(isset($_REQUEST["email"])) {
    $username = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $user = checkLoginDetails($username, $password, "Customer");
    if($user){
      if($user[0]->username == $username && $user[0]->password == $password){
        $isLogged = true;
      }
    }
  }

require_once "../view/customer_view.php"; 

?>