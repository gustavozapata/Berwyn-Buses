<?php

require_once "../model/Promotion.php";
require_once "../model/DataAccess.php";

if(isset($_REQUEST["editPromoId"])){
    header('Content-Type: application/json');
    $editPromo = DataAccess::getInstance()->getEditableFieldsPromo($_REQUEST["editPromoId"]);
    echo json_encode($editPromo);
}
  
if(isset($_REQUEST["saveEditPromo"])){
    $promoJson = json_decode($_REQUEST["saveEditPromo"]);
    $updatePromo = DataAccess::getInstance()->updatePromo($promoJson);
    echo json_encode($updatePromo);
} 

if(isset($_REQUEST["promoDescription"])){
    $date = $_REQUEST["promoExpiry"];
    $date = str_replace('/', '-', $date);
    $promo = (object) [
        'description' => $_REQUEST["promoDescription"],
        'amount' => $_REQUEST["promoAmount"],
        'code' => $_REQUEST["promoCode"],
        'expiry' => date('Y-m-d', strtotime($date))
    ];
    $addPromo = DataAccess::getInstance()->addPromo($promo);
    require_once "../view/addpromotion.php";
}

?>




