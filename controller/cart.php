<?php
session_start();
require_once "../model/database.php";
$cart = "";
if ($_REQUEST["registrationNumber"]==null){
    $_SESSION["cart"] == 'Empty';
    $cart = $_SESSION["cart"];
}
else{
    $_SESSION["cart"] = $_REQUEST["registrationNumber"];
    $cart = $_SESSION["cart"];
}
?>