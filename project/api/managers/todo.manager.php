<?php
require_once 'contracts/token.manager.contract.php';
require_once '../models/token.model.php';


class tokenManager implements tokenManagerContract {
    public function createToken($user) {
        
    }
    
    public function checkTokenAnGetUser($tokenHash) {
        $token = R::findOne("authtoken", "token = ? and expireat > curdate()", [$tokenHash]);
        
    }
};

?>