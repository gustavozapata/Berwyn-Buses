<?php


require_once "../model/Coach.php";
require_once "../model/DataAccess.php";

if(isset($_REQUEST["editCoachId"])){
  header('Content-Type: application/json');
  $editCoach = DataAccess::getInstance()->getEditableFields($_REQUEST["editCoachId"]);
  echo json_encode($editCoach);
}

if(isset($_REQUEST["saveEditCoach"])){
  $coachJson = json_decode($_REQUEST["saveEditCoach"]);
  $updateCoach = DataAccess::getInstance()->updateCoaches($coachJson);
  echo json_encode($updateCoach);
}

?>