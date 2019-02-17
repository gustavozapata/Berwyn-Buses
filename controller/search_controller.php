<?php

require_once "../model/database.php";
require_once "../model/coach.php";


if(isset($_REQUEST["passengers"])) {
    $passengers = $_REQUEST["passengers"];
    $coaches = getAllCoaches($passengers);
}

require_once "../view/search.php"; 



?>