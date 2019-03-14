<?php


if(isset($_REQUEST["promoAmount"])){
    $promo = (object) [
        'description' => $_REQUEST["promoDescription"],
        'amount' => $_REQUEST["promoAmount"],
        'code' => $_REQUEST["promoCode"],
        'expiry' => $_REQUEST["promoExpiry"]
    ];

    $file = file_get_contents("../model/promotions.json");
    $fileDecode = json_decode($file);
    array_push($fileDecode, $promo);
    $fileEncode = json_encode($fileDecode);
    file_put_contents("../model/promotions.json", $fileEncode);
}   
    require_once "../view/addpromotion.php";

?>