<?php

// TAVO DB
$database = "db_k1715308";
$username = "k1715308";
$password = "webdevdatabase";


$pdo = new PDO("mysql:host=kunet;dbname=$database", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


function getAllCoaches(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Coach");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Coach");
    return $results;
}

function getAllVehicleTypes(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM VehicleType");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "VehicleType");
    return $results;
}

function testing($id){
    global $pdo;
    $statement = $pdo->prepare("SELECT type FROM VehicleType WHERE id = :id");
    $statement->bindValue(":id", $id, PDO::PARAM_INT);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_NUM);
    return $results;
}

?>