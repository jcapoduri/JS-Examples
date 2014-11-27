<?php
require_once __DIR__.'/contracts/token.manager.contract.php';
require_once __DIR__.'/../models/todo.model.php';

class tokenManager implements tokenManagerContract {
    
    public function createToken(User $user) {
        $token = R::dispense("authtoken");
    }
    
    public function checkToken($tokenHash) {
        $token = R::findOne("authtoken", "token = ? and expireAt > curdate()", [$tokenHash]);
        return (is_null($token)) ? false : true;
    }
    
    public function checkTokenAnGetUserId($tokenHash) {
        $token = R::findOne("authtoken", "token = ? and expireAt > curdate()", [$tokenHash]);
        if (is_null($token)) return $token;
        
        return $token->userid;
    }
};

?>