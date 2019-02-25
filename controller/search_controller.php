<?php

//REGULAR DB ACCESS ^^^
// require_once "../model/database.php";
require_once "../model/dao.php";
require_once "../model/coach.php";


if(isset($_REQUEST["passengers"])) {
    $passengers = $_REQUEST["passengers"];
    // $coaches = DAO::getAllCoaches($passengers);
    $coaches = DAO::getInstance()->getAllCoaches($passengers);
    //REGULAR DB ACCESS ^^^
    // $coaches = getAllCoaches($passengers);
}

require_once "../view/search.php"; 


?>