<?php

class Promotion {
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
}

?>