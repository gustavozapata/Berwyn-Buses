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

if(isset($_REQUEST["editVehicleId"])){
  header('Content-Type: application/json');
  $editVehicle = DataAccess::getInstance()->getEditableFieldsVehicle($_REQUEST["editVehicleId"]);
  echo json_encode($editVehicle);
}

if(isset($_REQUEST["saveEditVehicle"])){
  $vehicleJson = json_decode($_REQUEST["saveEditVehicle"]);
  $updateVehicle = DataAccess::getInstance()->updateVehicleTypes($vehicleJson);
  echo json_encode($updateVehicle);
}

?>