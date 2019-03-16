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

//the following if statement waits for the remove POST which is triggered by the remove button on the search page and the cart page.
//Once triggered, it searches for the coach to remove and then removes it from the session variable
if (isset($_POST["remove"])){
    $obj = json_decode($_POST["remove"]);
    $index = array_search($obj, $_SESSION["cart"]); //finds the index of the object
    unset($_SESSION["cart"][$index]); //removes the object
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