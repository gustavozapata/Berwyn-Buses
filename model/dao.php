<?php

class DAO {
    private static $instance = null;
    private $connection;

    private $database = "db_k1715308";

    private $host = "kunet";
    private $user = "k1715308";
    private $password = "webdevdatabase";

    // private $host = "localhost";
    // private $user = "root";
    // private $password = "";
    
    private function __construct() {
        $this->connection = new PDO("mysql:host={$this->host}; dbname={$this->database}", $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new DAO();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }

    function getAllCoaches($passengers){
        // IS THE BELOW RIGHT?
        // $instance = DAO::getInstance();
        // $connection = $instance->getConnection();
        $connection = $this->getConnection();
        // IS THE ABOVE RIGHT?
        if($passengers <= 73){
            $statement = $connection->prepare("SELECT * FROM view_coach_type WHERE maxCapacity >= :passengers");
        } else {
            $statement = $connection->prepare("SELECT * FROM view_coach_type");
        }
        $statement->bindValue(":passengers", $passengers, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Coach");
        return $results;
    }

    function checkLoginDetails($username, $password, $type){
        // IS THE BELOW RIGHT?
        $instance = DAO::getInstance();
        $connection = $instance->getConnection();
        // IS THE ABOVE RIGHT?
        $statement = $connection->prepare("SELECT * FROM $type WHERE username = :username AND password = :password");
        $statement->bindValue(":username", $username, PDO::PARAM_INT);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, $type);
        return $results;
    }
}


?>