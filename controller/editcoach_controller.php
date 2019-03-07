<?php
header('Content-Type: application/json');

require_once "../model/Coach.php";
require_once "../model/DataAccess.php";

if(isset($_REQUEST["editCoachId"])){
    $editCoach = DataAccess::getInstance()->getSelectedCoaches2($_REQUEST["editCoachId"]);
    echo json_encode($editCoach);
}

//PAUL'S CODE
/* header('Content-Type: application/json');
require_once ("customer.php");
require_once ("dataAccess-db.php");

if (!isset($_REQUEST["surname"]))
{
  echo json_encode([]); // send empty array
}
else {
  $names = getUsersByStartOfSurname($_REQUEST["surname"]);
  echo json_encode($names);
} */


?>