<?php
class Driver implements JsonSerializable {
    private $id;
    private $givenName;
    private $familyName;
    private $licenceNumber;
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