<?php
class Customer implements JsonSerializable {
    private $id;
    private $givenName;
    private $familyName;
    private $dateOfBirth;
    private $email;
    private $password;
    private $mobileNumber;
    private $houseNumber;
    private $streetName;
    private $town;
    private $postcode;
    private $licenseNumber;
    private $licenseExpiry;
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