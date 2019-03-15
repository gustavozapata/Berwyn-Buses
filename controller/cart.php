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

//Setting the session variables for the trip details
//If we make the dates and number of passengers required, we set all variables in one if statement

if (!isset($_SESSION["trip"]))
{
    $_SESSION["trip"]=[
        'depart' => '',
        'return' => '',
        'passengers' => 0
    ];
}

if (isset($_GET["depart"]))
{
    $_SESSION["trip"] ['depart'] = $_GET["depart"];
}

if (isset($_GET["return"]))
{
    $_SESSION["trip"] ['return'] = $_GET["return"];
    
}

if (isset($_GET["passengers"]))
{
    $_SESSION["trip"] ['passengers'] = $_GET["passengers"];
}


?>