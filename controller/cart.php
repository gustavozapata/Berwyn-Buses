<?php
session_start();
require_once "../model/database.php";

$_SESSION["cart"] = $_REQUEST["registrationNumber"];
$cart = $_SESSION["cart"];

?>