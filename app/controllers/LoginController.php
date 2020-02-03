<?php

class LoginController extends Controller
{
    private $LoginModel;
    private $validLogin;

    public function __construct() {
        $this->LoginModel = $this->model('LoginModel');
        $this->validLogin = [];
        $this->InventoryModel = $this->model('InventoryModel');
    }

    // A bad request will direct you to login page.
    public function display() {
        $this->view('login/index', ['errorMessage'=>'', 'formName' => '']);
    }

    // Form POST on login accesses this method
    public function authLogin() {
        $this->validLogin = $this->LoginModel->getLoginForm();

        // login success, render a new view with cars if valid login
        if ($this->validLogin['valid'] === 1) {
            $this->view('inventory/index', $this->InventoryModel->getVehiclesData());
        }
        else {
            // failed login attempt, render a login form, pre-fill the username
            $this->view('login/index', ['errorMessage'=>'Login Error', 'formName' => $this->LoginModel->loginUsername]);
        }
    }

}