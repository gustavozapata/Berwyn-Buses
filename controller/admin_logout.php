<?php

session_start();
session_destroy();
header('Location: ../view/admin_view.php');
exit;

?>