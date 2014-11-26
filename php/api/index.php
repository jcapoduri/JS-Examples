<?php
    error_reporting(E_ALL);
    require 'libs/Slim/Slim/Slim.php';
    \Slim\Slim::registerAutoloader();
    
    class controller {
        public $get;
        
        public function __construct(){
            //$this->get = $this->getfn(); 
        }
        
        public function getfn($name) {
            //return function ($name) {
                echo "Hello, " . $name;  
            //};
        }
    };
    
    $a = new controller();
    
    $app = new \Slim\Slim();
    $app->get('/hello/:name', array($a, "getfn"));
    $app->run();
?>