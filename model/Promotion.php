<?php

class Promotion implements JsonSerializable {
    private $id;
    private $description;
    private $amount;
    private $code;
    private $expiry;

    function __get($name){
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