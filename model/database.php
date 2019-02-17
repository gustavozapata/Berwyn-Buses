<?php
$database = "db_k1715308";
//TAVO'S DATABASE
$host = "kunet";
$username = "k1715308";
$password = "webdevdatabase";
//XAMPP (LOCALHOST)
$username = "root";
$password = "";
$host = "localhost";
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
function getAllCoaches(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM view_coach_type WHERE maxCapacity > 45");
    // $statement->bindValue(":passengers", $passengers, PDO::PARAM_INT);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Coach");
    /*foreach($results as $result) {
        $statement = $pdo->prepare("SELECT * FROM VehicleType WHERE id = :id");
        $statement->bindValue(":id", $result->vehicleType, PDO::PARAM_INT);
        $statement->execute();
        $queryResult = $statement->fetch(PDO::FETCH_OBJ);
        $result->vehicleType = $queryResult->type; 
        $result->maxCapacity = $queryResult->maxCapacity; 
        $result->hourlyRate = $queryResult->hourlyRate; 

        $queryResult = $statement->fetchAll(PDO::FETCH_CLASS, "VehicleType");
    }*/
    return $results;
}
function getAllVehicleTypes(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM VehicleType");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "VehicleType");
    return $results;
}

function checkAdminLogin($username, $password){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM Admin WHERE username = :username AND password = :password");
    $statement->bindValue(":username", $username, PDO::PARAM_INT);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "Admin");
    return $results;
}
?>