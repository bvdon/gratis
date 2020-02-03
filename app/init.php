<?php

// spl_autoload_register, get path to class files
require_once 'app/autoload/MyAutoload.php';

class Init {
    // this class only exists to pre-load the database.
    public $DBobject;

    public function __construct() {
        // call methods that contain SQL statements @ db/DbUser
        $this->DBobject = new DbUser;
    }

    // initialize database one time: REQUIRES DATABASE 'gratis_dhenning' to exist.
    public function initDB() {
        $this->DBobject->createUsersTable();
        $this->DBobject->createVehiclesTable();
    }
}

// bootstrap
$init = new Init();
$init->initDB();

// new app
$app = new App;
