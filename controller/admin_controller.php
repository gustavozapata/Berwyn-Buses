<?php

session_start();

require_once "../model/admin.php";
require_once "../model/DataAccess.php";

if(isset($_SESSION["isLogged"]) && $_SESSION["isLogged"]){
  $_SESSION["isLogged"] = true;
} else {
  $_SESSION["isLogged"] = false;
}

if(isset($_REQUEST["username"])) {
  $_SESSION["username"] = htmlentities($_REQUEST["username"]);
  $password = htmlentities($_REQUEST["password"]);
  $admin = DataAccess::getInstance()->checkLoginDetails($_SESSION["username"], $password, "Admin");
  if($admin){
    if($admin[0]->username == $_SESSION["username"] && $admin[0]->password == $password){
      $_SESSION["isLogged"]  = true;
    }
  }
}

require_once "../view/admin_view.php"; 

?>