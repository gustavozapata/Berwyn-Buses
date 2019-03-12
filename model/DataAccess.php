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
    //select Coach.id, Coach.registrationNumber, VehicleType.type, Coach.make, Coach.colour, VehicleType.maxCapacity, VehicleType.hourlyRate, VehicleType.image from Coach, VehicleType where Coach.vehicleType = VehicleType.id order by Coach.id
    function searchCoaches($passengers, $dateFrom, $dateTo){
        $connection = $this->getConnection();
        if($passengers <= 73){
            $statement = $connection->prepare("SELECT * FROM view_coach_type WHERE maxCapacity >= :passengers");
            //DATE RANGE
            // $statement = $connection->prepare("SELECT * FROM view_coach_type, view_booking_info WHERE view_coach_type.maxCapacity >= :passengers AND view_booking_info.dateRequired > :dateFrom");
        } else {
            $statement = $connection->prepare("SELECT * FROM view_coach_type");
        }
        $statement->bindValue(":passengers", $passengers, PDO::PARAM_INT);
        //DATE RANGE
        // $statement->bindValue(":dateFrom", $dateFrom);
        // $statement->bindValue(":dateTo", $dateTo);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Coach");
        // $results = $statement->fetchAll(PDO::FETCH_OBJ);
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

    function getEditableFields($editCoach){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT id, registrationNumber, type, make, colour, maxCapacity, hourlyRate FROM view_coach_type WHERE id = :editCoach");
        $statement->bindValue(":editCoach", $editCoach);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    function updateCoaches($updateCoach){
        $connection = $this->getConnection();

        //COACH
        $statement = $connection->prepare("UPDATE view_coach_type SET registrationNumber=:registrationNumber, make=:make, colour=:colour WHERE id = :id");
        $statement->bindValue(":registrationNumber", $updateCoach->registrationNumber);
        $statement->bindValue(":make", $updateCoach->make);
        $statement->bindValue(":colour", $updateCoach->colour);
        $statement->bindValue(":id", $updateCoach->id);
        $statement->execute();

        //VEHICLE TYPE
        $statement = $connection->prepare("UPDATE view_coach_type SET type=':type', maxCapacity=':maxCapacity', hourlyRate=':dailyRate' WHERE id = ':id'");
        $statement->bindValue(":type", $updateCoach->type);
        $statement->bindValue(":maxCapacity", $updateCoach->maxCapacity);
        $statement->bindValue(":dailyRate", $updateCoach->dailyRate);
        $statement->bindValue(":id", $updateCoach->id);
        $statement->execute();
        // $results = $statement->fetch();
        // return $results;
    }


    function getVehicleTypes(){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT type FROM VehicleType");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "VehicleType");
        return $results;
    }

    // MYSQL QUERY VIEW_BOOKING_INFO
    // SELECT BookingAssignment.id "assignmentId", Booking.id "bookingId", Booking.destinationCity, Booking.numOfPassengers, Driver.id "driverId", Driver.familyName, Booking.dateRequired, Booking.dateReturned, (Booking.dateReturned - Booking.dateRequired) "days", Coach.registrationNumber, VehicleType.maxCapacity from BookingAssignment, Booking, VehicleType, Coach, Driver where BookingAssignment.booking = Booking.id and BookingAssignment.driver = Driver.id and BookingAssignment.coach = Coach.id and VehicleType.id = Coach.vehicleType

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