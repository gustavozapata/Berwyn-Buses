<?php

require_once "../model/database.php";
require_once "../model/coach.php";

$coaches = getAllCoaches();

require_once "../view/search.php"; 

?>