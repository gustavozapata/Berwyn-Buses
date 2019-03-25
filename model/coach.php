<?php
require_once "VehicleType.php";
class Coach extends VehicleType implements JsonSerializable {
    private $id;
    private $vehicleType;
    private $registrationNumber;
    private $make;
    private $colour;
    private $image;
    private $dailyRate;
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