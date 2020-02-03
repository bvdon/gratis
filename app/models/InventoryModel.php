<?php

class InventoryModel
{
    public $DBobject;

    public function __construct() {
        // to call methods that contain SQL statements in DbUser
        $this->DBobject = new DbUser;
    }

    public function getVehiclesData() {
        // select all vechicles from db table
        return $this->DBobject->getVehicles(); // 2d array
    }
}

/*
value returned is an array:

Array (
    [0] => Array (
        [autoId] => 1
        [make] => BMW
        [model] => X1
        [year] => 2013
        [miles] => 67k
        [newused] => Used
        [price] => $10,950 )
    [1] => Array (
        [autoId] => 2
        [make] => Nisssan
        [model] => Altima
        [year] => 2017

        etc....
 */


