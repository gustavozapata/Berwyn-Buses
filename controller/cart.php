<?php
session_start();
require_once "../model/database.php";
if (!isset($_POST['regNumber'])&& !isset($_SESSION['cart'])){
    $_SESSION['cart'][] = array('regNumber' => 'empty',
                                'vehicleType' => 'empty',
                                'coachIMG' => 'empty',
                                'rate' => 'empty');
}

elseif(isset($_POST['regNumber']) && $_SESSION['cart'][0]['regNumber'] =='empty'){
    $_SESSION['cart'][0] = array('regNumber' => $_POST['regNumber'],
                                'vehicleType' => $_POST['vehicleType'],
                                'coachIMG' => $_POST['coachIMG'],
                                'rate' => $_POST['rate']);
}

elseif(isset($_POST['regNumber']) && isset($_SESSION['cart']) ){
    $_SESSION['cart'][] = array('regNumber' => $_POST['regNumber'],
                                'vehicleType' => $_POST['vehicleType'],
                                'coachIMG' => $_POST['coachIMG'],
                                'rate' => $_POST['rate']);
}

elseif(!isset($_SESSION['cart']) && isset($_POST['regNumber'])){
    $_SESSION['cart'][] = array('regNumber' => $_POST['regNumber'],
                                'vehicleType' => $_POST['vehicleType'],
                                'coachIMG' => $_POST['coachIMG'],
                                'rate' => $_POST['rate']);
                                // 'rate' => $_POST['rate']);
}

?>