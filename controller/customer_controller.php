<?php

require_once "../model/customer.php";
require_once "../model/DataAccess.php";

$isLogged = false;

if(isset($_REQUEST["email"])) {
    $username = htmlentities($_REQUEST["email"]);
    $password = htmlentities($_REQUEST["password"]);
    $user = DataAccess::getInstance()->checkLoginDetails($username, $password, "Customer");
    if($user){
      if($user[0]->username == $username && $user[0]->password == $password){
        $isLogged = true;
      }
    }
  }

require_once "../view/customer_view.php"; 

?>