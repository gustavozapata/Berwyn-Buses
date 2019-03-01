<?php

session_start();


$_SESSION["basketItems"] = $_REQUEST["basketItems"];


require_once "../view/checkout_test.php";

?>