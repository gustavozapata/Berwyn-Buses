<?php

require_once "../model/database.php";
require_once "../model/coach.php";

$passengers = $_REQUEST["passengers"];

$coaches = getAllCoaches();

require_once "../view/search.php"; 



?>