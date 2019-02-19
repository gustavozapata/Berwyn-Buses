<?php
session_start();
require_once "../model/database.php";
if (!isset($_POST['regNumber'])&& !isset($_SESSION['cart'])){  
    $_SESSION['cart'][] = array('regNumber' => 'empty',
                                'vehicleType' => 'empty',
                                'coachIMG' => 'empty',
                                'rate' => 'empty');
}
//if no values are set in "regNumber" or "$_SESSION[cart]", create a session (associative) array with the elements  values set to empty. 
elseif(isset($_POST['regNumber']) && $_SESSION['cart'][0]['regNumber'] =='empty'){
    $_SESSION['cart'][0] = array('regNumber' => $_POST['regNumber'],
                                'vehicleType' => $_POST['vehicleType'],
                                'coachIMG' => $_POST['coachIMG'],
                                'rate' => $_POST['rate']);
}
//else if "regNumber" has a value and "$_SESSION['cart'][0]['regNumber'] =='empty'", request and add the following values into the arrays properties.  
elseif(isset($_POST['regNumber']) && isset($_SESSION['cart']) ){
    $_SESSION['cart'][] = array('regNumber' => $_POST['regNumber'],
                                'vehicleType' => $_POST['vehicleType'],
                                'coachIMG' => $_POST['coachIMG'],
                                'rate' => $_POST['rate']);
}
//else if both values are set in "regNumber" and "$_SESSION['cart']" add a new array as an element and add the following values into the arrays properties.
elseif(!isset($_SESSION['cart']) && isset($_POST['regNumber'])){
    $_SESSION['cart'][] = array('regNumber' => $_POST['regNumber'],
                                'vehicleType' => $_POST['vehicleType'],
                                'coachIMG' => $_POST['coachIMG'],
                                'rate' => $_POST['rate']);
                               
}


?>