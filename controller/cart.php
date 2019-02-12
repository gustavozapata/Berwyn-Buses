<?php
session_start();
require_once "../model/database.php";

if(isset($_POST['regNumber']) && isset($_SESSION['cart']) ){
    $_SESSION['cart'][] = $_POST['regNumber'];
}
if (!isset($_POST['regNumber'])&& !isset($_SESSION['cart'])){
    $_SESSION['cart'][] = 'Empty';
}
if(!isset($_SESSION['cart']) && isset($_POST['regNumber'])){
    $_SESSION['cart'][] = $_POST['regNumber'];
}
if($_SESSION['cart'][0]=='Empty' && !isset($_POST['regNumber'])){}

if(isset($_POST['regNumber']) && $_SESSION['cart'][0]=='Empty'){
    $_SESSION['cart'][0] = $_POST['regNumber'];
}

?>