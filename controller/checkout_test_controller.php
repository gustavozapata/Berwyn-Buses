<?php

session_start();

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";


if(isset($_REQUEST["coachSelection"])) {
    $_SESSION["basketItems"] = $_REQUEST["basketItems"];
    $_SESSION["coachSelection"] = explode(",", $_REQUEST['coachSelection']);
    $coaches = DataAccess::getInstance()->getSelectedCoaches($_SESSION["coachSelection"]);
}

require_once "../view/checkout_test.php";

?>