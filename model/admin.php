<?php
class Admin{
    private $id;
    private $employeeNumber;
    private $givenName;
    private $familyName;
    private $adminType;
    function __get($name) {
        return $this->$name;
    }
    function __set($name, $value){
        $this->$name = $value;
    }
}
?>