<?php

// TAVO DB
$database = "db_k1715308";
$username = "k1715308";
$password = "webdevdatabase";

// LEWIS DB
// $database = "db_k1732912";
// $username = "k1732912";
// $password = "laptop";

$pdo = new PDO("mysql:host=kunet;dbname=$database", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


function getAllCoaches(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Coach");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Coach");
    return $results;
}

?>