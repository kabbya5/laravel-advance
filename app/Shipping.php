<?php
namespace App;
class Shipping{
    public $name;
    public $address;
    public $phone;

    public function __construct($name,$address,$phone){

        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;

    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function getName(){
        return $this->name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getPhone(){
        return $this->phone;
    }
}
?>