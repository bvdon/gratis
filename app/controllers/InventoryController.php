<?php

class InventoryController extends Controller
{
    public $InventoryModel;

    public function __construct() {
        $this->InventoryModel = $this->model('InventoryModel');
        $this->display();
    }

    public function display() {
        // get vehicle data[] from model, then render the view.
        $this->view('inventory/index', $this->InventoryModel->getVehiclesData());
    }
}

