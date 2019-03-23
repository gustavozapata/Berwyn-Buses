<?php

class DataAccess {
    private static $instance = null;
    private $connection;

    private $database = "db_k1715308";

    // private $host = "kunet";
    // private $user = "k1715308";
    // private $password = "webdevdatabase";

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    
    private function __construct() {
        $this->connection = new PDO("mysql:host={$this->host}; dbname={$this->database}", $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
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

    function searchCoaches__OLD($passengers, $dateFrom, $dateTo, $price, $isDriver){
        $connection = $this->getConnection();
        if($passengers <= 73){
            $statement = $connection->prepare("SELECT * FROM view_coach_type WHERE maxCapacity >= :passengers AND dailyRate >= :price");
        } else {
            $statement = $connection->prepare("SELECT * FROM view_coach_type WHERE maxCapacity < :passengers AND dailyRate >= :price");
        }
        $statement->bindValue(":passengers", $passengers, PDO::PARAM_INT);
        $statement->bindValue(":price", $price);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Coach");
        return $results;
    }

    function searchCoaches($passengers, $dateFrom, $dateTo, $price, $isDriver){
        $connection = $this->getConnection();
        if($passengers <= 73){
            $statement = $connection->prepare("SELECT * FROM view_coach_type WHERE maxCapacity >= :passengers AND dailyRate >= :price");
        } else {
            $statement = $connection->prepare("SELECT * FROM view_coach_type WHERE maxCapacity < :passengers AND dailyRate >= :price");
        }
        $statement->bindValue(":passengers", $passengers);
        $statement->bindValue(":price", $price);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Coach");
        //LOOKUP BOOKED COACHES
        $filterResults = $this->checkBookedCoaches($results, $dateFrom, $dateTo);
        return $filterResults;
    }

    function checkBookedCoaches($results, $dateFrom, $dateTo){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT coach FROM view_booked_coach WHERE dateRequired BETWEEN CAST(':dateFrom' AS DATE) AND CAST(':dateTo' AS DATE)");
        // $statement = $connection->prepare("SELECT coach FROM view_booked_coach WHERE dateRequired >= ':dateFrom' AND dateReturned <= ':dateTo'");
        $statement->bindValue(":dateFrom", $dateFrom);
        $statement->bindValue(":dateTo", $dateTo);
        $statement->execute();
        $coachesId = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
        foreach($results as $key => $value){
            if(in_array($value->id, $coachesId)){
                unset($results[$key]);
            }
        }
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
        $statement = $connection->prepare("SELECT id, registrationNumber, make, colour FROM Coach WHERE id = :editCoach");
        $statement->bindValue(":editCoach", $editCoach);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Coach");
        return $results;
    }

    function getEditableFieldsVehicle($editVehicle){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT id, type, maxCapacity, dailyRate FROM VehicleType WHERE id = :editVehicle");
        $statement->bindValue(":editVehicle", $editVehicle);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "VehicleType");
        return $results;
    }

    function updateCoaches($updateCoach){
        $connection = $this->getConnection();
        $statement = $connection->prepare("UPDATE Coach SET registrationNumber=:registrationNumber, make=:make, colour=:colour WHERE id = :id");
        $statement->bindValue(":registrationNumber", $updateCoach->registrationNumber);
        $statement->bindValue(":make", $updateCoach->make);
        $statement->bindValue(":colour", $updateCoach->colour);
        $statement->bindValue(":id", $updateCoach->id);
        $statement->execute();
    }

    function updateVehicleTypes($updateVehicle){
        $connection = $this->getConnection();
        $statement = $connection->prepare("UPDATE VehicleType SET type=:type, maxCapacity=:maxCapacity, dailyRate=:dailyRate WHERE id = :id");
        $statement->bindValue(":type", $updateVehicle->type);
        $statement->bindValue(":maxCapacity", $updateVehicle->maxCapacity);
        $statement->bindValue(":dailyRate", $updateVehicle->dailyRate);
        $statement->bindValue(":id", $updateVehicle->id);
        $statement->execute();
    }


    function getVehicleTypes(){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT * FROM VehicleType");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "VehicleType");
        return $results;
    }

    function addCoach($coach){
        $connection = $this->getConnection();
        $statement = $connection->prepare("INSERT INTO Coach (vehicleType, registrationNumber, make, colour) VALUES (?,?,?,?)");
        $statement->execute([$coach->type, $coach->regNumber, $coach->make, $coach->colour]);
    }

    
    function checkLoginDetails($username, $password, $type){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT * FROM $type WHERE username = :username AND password = :password");
        $statement->bindValue(":username", $username, PDO::PARAM_INT);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, $type);
        return $results;
    }

    function createUserAccount($user){
        $connection = $this->getConnection();
        $statement = $connection->prepare("INSERT INTO Customer (givenName, familyName, dateOfBirth, username, password, mobileNumber, houseNumber, streetName, town, postcode, licenceNumber, licenceExpiry) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute([$user->givenName, $user->familyName, $user->dob, $user->email, $user->password, $user->mobileNumber, $user->houseNumber, $user->streetName, $user->town, $user->postcode, $user->licence, $user->licenceExpiry]);
        $_SESSION["id"] = $connection->lastInsertId();
    }

    function addPromo($promo){
        $connection = $this->getConnection();
        $statement = $connection->prepare("INSERT INTO Promotion (description, amount, code, expiry) VALUES (?,?,?,?)");
        $statement->execute([$promo->description, $promo->amount, $promo->code, $promo->expiry]);
    }

    function getPromotions(){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT * FROM Promotion");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Promotion");
        return $results;
    }

    function getEditableFieldsPromo($editPromo){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT * FROM Promotion WHERE id = :editPromo");
        $statement->bindValue(":editPromo", $editPromo);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "Promotion");
        $results[0]->expiry = date('d/m/Y', strtotime($results[0]->expiry));
        return $results;
    }

    function updatePromo($updatePromo){
        $date = $updatePromo->expiry;
        $date = str_replace('/', '-', $date);
        $connection = $this->getConnection();
        $statement = $connection->prepare("UPDATE Promotion SET description=:description, amount=:amount, code=:code, expiry=:expiry WHERE id = :id");
        $statement->bindValue(":description", $updatePromo->description);
        $statement->bindValue(":amount", $updatePromo->amount);
        $statement->bindValue(":code", $updatePromo->code);
        $statement->bindValue(":expiry", date('Y-m-d', strtotime($date)));
        $statement->bindValue(":id", $updatePromo->id);
        $statement->execute();
    }

    function newCoachAdded(){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT id FROM Coach ORDER BY id DESC LIMIT 1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
        return $this->getEditableFields($result[0]);
    }

    function completeBooking($booking){
        $connection = $this->getConnection();
        $statement = $connection->prepare("INSERT INTO Booking (customerID, dateRequired, numOfPassengers, dateReturned) VALUES (?,?,?,?)");
        $statement->execute([$_SESSION["id"], $booking->datefrom, $booking->passengers, $booking->dateto]);

        if($_SESSION["basket"]->isDriver){
            $isDriver =  getDrivers();
        } else {
            $isDriver =  null;
        }
        $lastid = $connection->lastInsertId();
        foreach($_SESSION["basket"]->coaches as $coach){
            $statement = $connection->prepare("INSERT INTO BookingAssignment (booking, driver, coach) VALUES(?,?,?)");
            $statement->execute([$lastid, $isDriver, $coach]);
        }
    }

    function getDrivers(){
        $connection = $this->getConnection();
        $statement = $connection->prepare("SELECT id FROM Driver");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result;
    }
}


///// DATABASE VIEWS QUERIES //////

//MYSQL QUERY VIEW_COACH_TYPE
    //select Coach.id, Coach.registrationNumber, VehicleType.type, Coach.make, Coach.colour, VehicleType.maxCapacity, VehicleType.dailyRate, VehicleType.image from Coach, VehicleType where Coach.vehicleType = VehicleType.id order by Coach.id

// MYSQL QUERY VIEW_BOOKING_INFO
    // SELECT BookingAssignment.id "assignmentId", Booking.id "bookingId", Booking.destinationCity, Booking.numOfPassengers, Driver.id "driverId", Driver.familyName, Booking.dateRequired, Booking.dateReturned, (Booking.dateReturned - Booking.dateRequired) "days", Coach.registrationNumber, VehicleType.maxCapacity from BookingAssignment, Booking, VehicleType, Coach, Driver where BookingAssignment.booking = Booking.id and BookingAssignment.driver = Driver.id and BookingAssignment.coach = Coach.id and VehicleType.id = Coach.vehicleType

// MYSQL QUERY VIEW_BOOKING_INFO V2
    //SELECT BookingAssignment.id "assignmentId", Booking.id "bookingId", Booking.numOfPassengers, Driver.id "driverId", Driver.familyName,Coach.id "coachId", Booking.dateRequired, Booking.dateReturned, (Booking.dateReturned - Booking.dateRequired) "days", Coach.registrationNumber, VehicleType.maxCapacity from BookingAssignment, Booking, VehicleType, Coach, Driver where BookingAssignment.booking = Booking.id and BookingAssignment.driver = Driver.id and BookingAssignment.coach = Coach.id and VehicleType.id = Coach.vehicleType

//MYSQL QUERY VIEW_BOOKED_COACH
    //select Booking.id "booking", Coach.id "coach", Booking.dateRequired, Booking.dateReturned from Booking, Coach, BookingAssignment where Booking.id = BookingAssignment.booking and Coach.id = BookingAssignment.coach
?>