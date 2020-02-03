<?php
// spl_autoload_register, get path to class files
require_once 'app/autoload/MyAutoload.php';

class LoginModel
{
    public $DBobject;
    public $loginUsername;
    public $loginPassword;
    private $validLogin = [];

    public function __construct() {
        $this->loginUsername = "";
        $this->loginPassword = "";
        $this->validLogin = [];

        // to call methods that contain SQL statements in DbUser
        $this->DBobject = new DbUser;
    }

    public function getLoginForm() {
        /*
         * check user/pass against database
         * if valid, show the inventory.
         * if not valid, re-display login form with error message and pre-filled username
         */
        if ((isset($_POST['loginUsername'])) && ($_POST['loginPassword'])) {
            $this->loginUsername = stripslashes(filter_var(rtrim($_POST['loginUsername'])));
            $this->loginPassword = stripslashes(filter_var(rtrim($_POST['loginPassword'])));

            // check the form inputs against the database
            if ($this->DBobject->getLoginAuth($this->loginUsername,$this->loginPassword)) {
                $this->validLogin = ['valid'=>1];
                return $this->validLogin;
            }
            else {
                $this->validLogin = ['valid'=>0, 'formName' => $this->loginUsername];
                return $this->validLogin;
            }
         }
        else {
            $this->validLogin = ['valid'=>0, 'formName' => $this->loginUsername];
            return $this->validLogin;
        }
    }
}