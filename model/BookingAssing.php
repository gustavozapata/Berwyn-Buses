<?php

class BookingAssignment {
    private $id;
    private $booking;
    private $driver;
    private $coach;

    function __get($name) {
        return $this->$name;
    }
    
    function __set($name, $value){
        $this->$name = $value;
    }
}


?>