<?php
require_once __DIR__.'/contracts/token.manager.contract.php';
require_once __DIR__.'/../models/token.model.php';


class tokenManager implements tokenManagerContract {
    public function createToken(User $user) {
        
    }
    
    public function checkTokenAnGetUser($tokenHash) {
        $token = R::findOne("authtoken", "token = ? and expireat > curdate()", [$tokenHash]);
        
    }
};

?>