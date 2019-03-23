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

    if (isset($_REQUEST["promoCode"])){
        $enteredCode = $_REQUEST["promoCode"];
        $promotions = DataAccess::getInstance()->getPromotions();
        $correctCode = "'".$enteredCode."'" . " is an incorrect code";
        $codeValue = "0";
          
        foreach($promotions as $i){   
            if($enteredCode == $i->code){
              $correctCode = $i->code;
              $codeValue = $i->amount;  
            }
            
            
        }
        require_once "../view/checkout.php";
}

?>




