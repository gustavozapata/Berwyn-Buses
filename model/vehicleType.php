<?php

class VehicleType {
    private $id;
    private $type;
    private $maxCapacity;
    private $hourlyRate;

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value){
        $this->$name = $value;
    }
}

?>