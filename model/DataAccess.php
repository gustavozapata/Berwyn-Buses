<?php

class DataAccess {
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
            self::$instance = new DataAccess();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }

    //MYSQL QUERY VIEW_COACH_TYPE
    //select coach.id, coach.registrationNumber, vehicletype.type, coach.make, coach.colour, vehicletype.maxCapacity, vehicletype.hourlyRate, coach.image from coach, vehicletype where coach.vehicleType = vehicletype.id order by coach.id
    function searchCoaches($passengers, $from, $to){
        $connection = $this->getConnection();
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

    function getSelectedCoaches($coachSelection){
        $connection = $this->getConnection();
        //https://stackoverflow.com/questions/14767530/php-using-pdo-with-in-clause-array
        $in = str_repeat('?,', count($coachSelection) - 1) . '?';
        $statement = $connection->prepare("SELECT * FROM view_coach_type WHERE id IN ($in)");
        //end of reference
        $statement->execute($coachSelection);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Coach");
        return $results;
    }

    // MYSQL QUERY VIEW_BOOKING_INFO
    // SELECT BookingAssignment.id "Assignment ID", Booking.id "Booking ID", Booking.destinationCity "Destination", Booking.numOfPassengers "Passengers", Driver.familyName "Driver", Booking.dateRequired "From", Booking.dateReturned "To", (Booking.dateReturned - Booking.dateRequired) "Days", Coach.registrationNumber "Coach", VehicleType.maxCapacity "Coach Capacity" from BookingAssignment, Booking, VehicleType, Coach, Driver where BookingAssignment.booking = Booking.id and BookingAssignment.driver = Driver.id and BookingAssignment.coach = Coach.id and VehicleType.id = Coach.vehicleType

    function checkLoginDetails($username, $password, $type){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT * FROM $type WHERE username = :username AND password = :password");
        $statement->bindValue(":username", $username, PDO::PARAM_INT);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, $type);
        return $results;
    }
}


?>