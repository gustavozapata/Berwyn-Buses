<?php

require_once "../model/Coach.php";
require_once "../model/DataAccess.php";

if(isset($_REQUEST["addType"])){
    $coach = (object) [
        'type' => $_REQUEST["addType"],
        'regNumber' => $_REQUEST["regNumber"],
        'make' => $_REQUEST["make"],
        'colour' => $_REQUEST["colour"]
    ];
    $addCoach = DataAccess::getInstance()->addCoach($coach);
    //HEADER IT'S USED INSTEAD OF REQUIRE_ONCE TO PREVENT FORM RESUBMISSION ISSUE
    // header("Location: ../view/addcoach.php");
    // header("Location: " . $_SERVER['REQUEST_URI']);
    // exit;
}   
    require_once "../view/addcoach.php";

?>