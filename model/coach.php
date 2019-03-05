<?php
require_once "vehicleType.php";
class Coach extends VehicleType implements \JsonSerializable {
    private $id;
    private $vehicleType;
    private $registrationNumber;
    private $make;
    private $colour;
    private $image;
    function __get($name) {
        return $this->$name;
    }
    function __set($name, $value){
        $this->$name = $value;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}
?>