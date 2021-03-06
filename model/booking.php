<?php
class Booking implements JsonSerializable {
    private $id;
    private $customerID;
    private $dateRequired;
    private $numOfPassengers;
    private $dateReturned;
    
    function __get($name) {
        return $this->$name;
    }
    function __set($name, $value){
        $this->$name = $value;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
?>