<?php

/*
 * App handles uri routing. We configure the .htaccess to return part of the uri request and access that via
 * the global $_SERVER['REQUEST_URI']. In general, the parsed uri looks something like
 *
 * Array ( [0] =>  [1] => login [2] => display [3] => param )
 *
 * corresponding to this URL
 * http://localhost/login/display/optionalparam
 *
 * 'login' is the controller name, 'display' is the method name, and the remaining elements are zero or more params.
 * We start with default values in case we have invalid values relative to the available objects.
 */

class App
{
    protected $controller   = 'login';
    protected $method       = '';
    protected $params       = [];
    protected $routes       = "";

    public function __construct() {

        $this->routes = $this->parseUrl();

        // 0 index is null, unset
        unset($this->routes[0]);

        if (count($this->routes) < 2) {
            // not a valid request, make it valid
            $this->routes = ['',$this->controller,$this->method];
        }
        $this->controller = ucFirst($this->routes[1]) . 'Controller';

        // if the controller does not exist, then default controller
        if (!file_exists('app/controllers/' . $this->controller . '.php')) {
            $this->controller = 'LoginController';
        }
        unset($this->routes[1]);

        // test if method_exists
        if ((isset($this->routes[2])) && (method_exists($this->controller, $this->routes[2]))) {
            // method named from routes[2] exists, we have a valid method name.
            $this->method = $this->routes[2];

            // we now have a valid controller
            require_once 'app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
        }
        else {
            // the method does not exist, so we need to default to login.
            $this->method = "display";
            $this->controller = 'LoginController';
            require_once 'app/controllers/LoginController.php';
            $this->controller = new $this->controller;
        }
        unset($this->routes[2]);

         // remaining elements of the array are param list, default is no params
        $this->params =  $this->routes ? array_values($this->routes) : [];

        /*
        //calls class::method(params);
        echo "Class:".get_class($this->controller)."<BR>";
        echo "Method:".$this->method."<BR>Params: ";
        print_r($this->params);echo "<BR>";
        */
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // parse the URI string, explode to array.
    public function parseUrl() {
        if (isset($_SERVER['REQUEST_URI'])) {
            return explode('/', filter_var(rtrim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));
        }
     }
}
