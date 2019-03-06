<?php

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";


if(isset($_REQUEST["passengers"])) {
    $passengers = htmlentities($_REQUEST["passengers"]);
    //https://stackoverflow.com/questions/44969782/submitting-php-html-date-to-mysql-date
    $from = htmlentities(date("Y-m-d",strtotime($_REQUEST["depart"])));
    $to = htmlentities(date("Y-m-d",strtotime($_REQUEST["return"])));
    $coaches = DataAccess::getInstance()->searchCoaches($passengers, $from, $to);
}

require_once "../view/search.php"; 

?>