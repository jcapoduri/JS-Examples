<?php
require_once  __DIR__.'/../../models/user.class.php';

interface ItokenManager {
    public function createToken(User $user);
    
    public function checkToken($tokenHash);
    
    public function checkTokenAndGetUserId($tokenHash);
};

?>