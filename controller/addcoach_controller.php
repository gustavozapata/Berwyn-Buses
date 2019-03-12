<?php

require_once "../model/Coach.php";
require_once "../model/DataAccess.php";

if(isset($_REQUEST["addType"])){
    $coach = (object) [
        'regNumber' => $_REQUEST["regNumber"],
        // 'type' => $_REQUEST["addType"],
        'make' => $_REQUEST["make"],
        'colour' => $_REQUEST["colour"]
    ];
    $addCoach = DataAccess::getInstance()->addCoach($coach);
}

require_once "../view/addcoach.php";

?>