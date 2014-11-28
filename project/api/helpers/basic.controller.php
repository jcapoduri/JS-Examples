<?php

require_once __DIR__.'/basic.controller.contract.php';

abstract class basicController implements IbasicController {
    protected $extended = [];
    protected $fields = [];
    protected $app;
    
    public function __construct () {
        $this->app = \Slim\Slim::getInstance();
    }
};

?>