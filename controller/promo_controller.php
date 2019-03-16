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

// require_once "../view/addpromotion.php";


    //  PROMO JSON FILE
    /* $promo = (object) [
        'description' => $_REQUEST["promoDescription"],
        'amount' => $_REQUEST["promoAmount"],
        'code' => $_REQUEST["promoCode"],
        'expiry' => $_REQUEST["promoExpiry"]
    ];

    $file = file_get_contents("../model/promotions.json");
    $fileDecode = json_decode($file);
    array_push($fileDecode, $promo);
    $fileEncode = json_encode($fileDecode);
    file_put_contents("../model/promotions.json", $fileEncode); */

?>




