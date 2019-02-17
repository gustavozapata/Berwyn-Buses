<?php

require_once "../model/admin.php";
require_once "../model/database.php";

$isLogged = false;

if(isset($_REQUEST["username"])) {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $admin = checkLoginDetails($username, $password, "Admin");
    if($admin){
      if($admin[0]->username == $username && $admin[0]->password == $password){
        $isLogged = true;
      }
    }
  }

require_once "../view/admin_view.php"; 

?>