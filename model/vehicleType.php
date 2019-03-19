<?php
class VehicleType implements JsonSerializable {
    private $id;
    private $type;
    private $maxCapacity;
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