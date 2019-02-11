<?php
//EITHER THIS APPROACH OR [CUSTOMER TABLE AND ADMIN TABLE ONLY] AND [ONE WEBPAGE FOR CUSTOMERS AND ONE FOR ADMIN]
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