<?php
require_once  __DIR__.'/../../models/user.model.php';

interface tokenManagerContract {
    public function createToken(User $user);
    
    public function checkToken($tokenHash);
    
    public function checkTokenAnGetUserId($tokenHash);
};

?>