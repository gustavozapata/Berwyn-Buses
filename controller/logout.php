<?php

session_start();
session_destroy();
header('Location: ../view/index.php');

/* if($_SESSION["adminLogged"]){
    header('Location: ../view/admin_view.php');
} else {
    header('Location: ../view/customer_view.php');
} */

exit;

?>