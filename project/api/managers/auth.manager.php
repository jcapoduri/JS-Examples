<?php

require_once __DIR__.'/contracts/auth.manager.contract.php';
require_once __DIR__.'/contracts/token.manager.contract.php';
require_once __DIR__.'/contracts/user.manager.contract.php';

class authManager {
    protected $tokenManager;
    protected $userManager;
    protected $app;

    public function __construct (ItokenManager $tokenmgr, IuserManager $usermgr) {
        $this->tokenManager = $tokenmgr;
        $this->userManager = $usermgr;
        $this->app = \Slim\Slim::getInstance();
    }

    public function isValidSession() {
        $token = $this->app->getCookie("auth_token");
        return $this->userManager->checkLogin($token);
    }

    public function getCurrentUser() {
        $token = $this->app->getCookie("auth_token");
        return $this->userManager->getUserFromHash($token);
    }
}

?>