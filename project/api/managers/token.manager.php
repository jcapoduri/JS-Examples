<?php
require_once __DIR__.'/contracts/token.manager.contract.php';
require_once __DIR__.'/../models/token.class.php';

class tokenManager implements ItokenManager {
    
    public function createToken(User $user) {
        $token = R::dispense("authtoken");
        $token->userid = $user->id;
        R::store($token);
        return $token->token;
    }
    
    public function checkToken($tokenHash = "") {
        if ($tokenHash === "") {
            $app = \Slim\Slim::getInstance();
            $tokenHash = $app->getCookie("auth_token");
        };
        $token = R::findOne("authtoken", "token = ? and expire_at > UTC_TIMESTAMP()", [$tokenHash]);
        if (is_null($token)) return false;
        $token->updateExpirationTime();
        R::store($token);
        return true;
    }
    
    public function checkTokenAndGetUserId($tokenHash = "") {
        if ($tokenHash === "") {
            $app = \Slim\Slim::getInstance();
            $tokenHash = $app->getCookie("auth_token");
        };
        $token = R::findOne("authtoken", "token = ? and expire_at > UTC_TIMESTAMP()", [$tokenHash]);
        if (is_null($token)) return $token;
        
        return $token->userid;
    }

    public function checkTokenAndUserId($userid, $tokenHash = "") {
        if ($tokenHash === "") {
            $app = \Slim\Slim::getInstance();
            $tokenHash = $app->getCookie("auth_token");
        };
        $token = R::findOne("authtoken", "token = ? and userid = ? and expire_at > UTC_TIMESTAMP()", [$tokenHash, $userid]);
        if (is_null($token)) return $token;
        
        return $token->userid;
    }
};

?>