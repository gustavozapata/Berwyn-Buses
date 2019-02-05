<?php
class Customer{
    private $id;
    private $givenName;
    private $familyName;
    private $dateOfBirth;
    private $email;
    private $mobileNumber;
    private $houseNumber;
    private $streetName;
    private $town;
    private $postcode;
    private $licenseNumber;
    private $licenseExpiery;

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value){
        $this->$name = $value;
    }
}
?>