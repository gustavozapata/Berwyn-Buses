<?php
session_start();
if (!isset($_SESSION["cart"]))
{
    $_SESSION["cart"] = [];
}
if (isset($_POST["cart"])){
    
    $obj = json_decode($_POST["cart"]);
    $_SESSION["cart"][] = $obj;
}


?>