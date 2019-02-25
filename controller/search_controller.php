<?php

require_once "../model/DataAccess.php";
require_once "../model/coach.php";


if(isset($_REQUEST["passengers"])) {
    $passengers = htmlentities($_REQUEST["passengers"]);
    $coaches = DataAccess::getInstance()->getAllCoaches($passengers);
}

require_once "../view/search.php"; 

?>