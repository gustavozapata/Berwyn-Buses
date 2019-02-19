<?php

session_start();

require_once "../model/admin.php";
// require_once "../model/database.php";
require_once "../model/dao.php";

$_SESSION["isLogged"] = false;

if(isset($_REQUEST["username"])) {
    $_SESSION["username"] = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $admin = DAO::checkLoginDetails($_SESSION["username"], $password, "Admin");
    if($admin){
      if($admin[0]->username == $_SESSION["username"] && $admin[0]->password == $password){
        $_SESSION["isLogged"]  = true;
      }
    }
  }

require_once "../view/admin_view.php"; 

?>