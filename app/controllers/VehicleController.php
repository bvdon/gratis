<?php

class VehicleController extends Controller
{
    public $VehicleModel;

    public function __construct()
    {
        $this->VehicleModel = $this->model('VehicleModel');
    }

    public function display($data=9)
    {
        // get vehicle data[] from model, then render the view.
        $this->view('vehicle/index', $this->VehicleModel->getVehicleData($data));
    }
}

