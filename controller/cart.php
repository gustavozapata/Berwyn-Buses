<?php
session_start();
require_once "../model/database.php";

if (!isset($_REQUEST['regNumber'])&& !isset($_SESSION['cart'])){
    $_SESSION['cart'][] = "Your Cart is Empty";
}
elseif($_SESSION['cart'][0]=="Your Cart is Empty" && !isset($_REQUEST['regNumber'])){}

elseif(isset($_REQUEST['regNumber']) && $_SESSION['cart'][0]=="Your Cart is Empty"){
    $_SESSION['cart'][0] = $_REQUEST['regNumber'];
}
else{
    $_SESSION['cart'][] = $_REQUEST['regNumber'];
}
?>