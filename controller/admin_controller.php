<?php

session_start();

require_once "../model/admin.php";
require_once "../model/DataAccess.php";

if(isset($_SESSION["adminLogged"]) && $_SESSION["adminLogged"]){
  $_SESSION["adminLogged"] = true;
} else {
  $_SESSION["adminLogged"] = false;
}

if ($_POST) {
  if(isset($_REQUEST["adminname"])) {
    $_SESSION["adminname"] = htmlentities($_REQUEST["adminname"]);
    $password = htmlentities($_REQUEST["password"]);
    $admin = DataAccess::getInstance()->checkLoginDetails($_SESSION["adminname"], $password, "Admin");
    if($admin){
      if($admin[0]->username == $_SESSION["adminname"] && $admin[0]->password == $password){
        $_SESSION["adminLogged"]  = true;
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
      }
    }
  }
}

require_once "../view/admin_view.php"; 

?>