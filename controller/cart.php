<?php
session_start();
require_once "../model/database.php";

if(isset($_POST['regNumber']) && isset($_SESSION['cart']) ){
    $_SESSION['cart'][] = array('regNumber' => $_POST['regNumber'],
                                'vehicleType' => $_POST['vehicleType'],
                                'coachIMG' => $_POST['coachIMG'],
                                'rate' => '1');
}

if(!isset($_SESSION['cart']) && isset($_POST['regNumber'])){
    $_SESSION['cart'][] = array('regNumber' => $_POST['regNumber'],
                                'vehicleType' => $_POST['vehicleType'],
                                'coachIMG' => $_POST['coachIMG'],
                                'rate' => '2');
                                // 'rate' => $_POST['rate']);
}

if(isset($_POST['regNumber']) && $_SESSION['cart'][0]=='Empty'){
    $_SESSION['cart'][0] = array('regNumber' => $_POST['regNumber'],
                                'vehicleType' => $_POST['vehicleType'],
                                'coachIMG' => $_POST['coachIMG'],
                                'rate' => '3');
}



?>