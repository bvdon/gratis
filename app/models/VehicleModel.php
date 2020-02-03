<?php

class VehicleModel
{
    public $DBobject;

    public function __construct() {
        // to call methods that contain SQL statements in DbUser
        $this->DBobject = new DbUser;
    }

    public function getVehicleData($id) {
        // select vechicle from db table with autoId
        return $this->DBobject->getVehicle($id); // array
    }
}

/*
value returned is an array:

Array (
        [autoId] => 1
        [make] => BMW
        [model] => X1
        [year] => 2013
        [miles] => 67k
        [newused] => Used
        [price] => $10,950 )
       )
 */


