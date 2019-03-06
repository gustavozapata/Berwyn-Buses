<?php

require_once "../model/DataAccess.php";
require_once "../model/Coach.php";


if(isset($_REQUEST["passengers"])) {
    $passengers = htmlentities($_REQUEST["passengers"]);
    //https://stackoverflow.com/questions/44969782/submitting-php-html-date-to-mysql-date
    $dateFrom = htmlentities(date("Y-m-d",strtotime($_REQUEST["depart"])));
    $dateTo = htmlentities(date("Y-m-d",strtotime($_REQUEST["return"])));
    $coaches = DataAccess::getInstance()->searchCoaches($passengers, $dateFrom, $dateTo);
}

require_once "../view/search.php"; 

?>