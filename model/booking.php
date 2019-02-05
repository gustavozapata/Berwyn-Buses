<?php
class Booking{
    
    private $id;
    private $customerID;
    private $dateRequired;
    private $numOfPassengers;
    private $destinationCity;
    private $destinationPostcode;
    private $approxJourneyHours;
    private $dateReturned;

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value){
        $this->$name = $value;
    }
}
?>