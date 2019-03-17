<?php
class Admin {
    private $id;
    private $givenName;
    private $familyName;
    private $username;
    private $password;
    function __get($name) {
        return $this->$name;
    }
    function __set($name, $value){
        $this->$name = $value;
    }
}
?>