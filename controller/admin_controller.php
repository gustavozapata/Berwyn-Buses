<?php

// require_once "../view/admin_view.php";
require_once "../model/admin.php";
require_once "../model/database.php";

$isLogged = false;

if(isset($_REQUEST["username"])) {
    global $pdo;
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $admin = checkAdminLogin($password);
    if($admin[0]->password == $password){
      $isLogged = true;
    }
  }

require_once "../view/admin_view.php"; 

?>