<?php
class VehicleType implements \JsonSerializable{
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

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}
?>