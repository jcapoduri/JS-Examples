<?php
require_once __DIR__.'/contracts/token.manager.contract.php';
require_once __DIR__.'/../models/todo.class.php';

class tokenManager implements ItokenManager {
    
    public function createToken(User $user) {
        $token = R::dispense("authtoken");
        $token->userid = $user->id;
        R::store($token);
        return $token->toke;
    }
    
    public function checkToken($tokenHash) {
        $token = R::findOne("authtoken", "token = ? and expireAt > curdate()", [$tokenHash]);
        return (is_null($token)) ? false : true;
    }
    
    public function checkTokenAndGetUserId($tokenHash) {
        $token = R::findOne("authtoken", "token = ? and expireAt > curdate()", [$tokenHash]);
        if (is_null($token)) return $token;
        
        return $token->userid;
    }
};

?>