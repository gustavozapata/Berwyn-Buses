<?php
class User{
    private $username;
    private $password;
    private $userType;

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value){
        $this->$name = $value;
    }
}
?>