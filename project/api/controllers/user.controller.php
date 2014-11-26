<?php
require_once '../managers/contracts/user.manager.contract.php';
require_once 'basic.controller.php';

class userController implements basicController{
    protected $manager;
    
    public function __construct(userManagerContract $mgr) {
        $this->manager = $mgr;
    }
    
    public getAll() {
        
    }
}

?>