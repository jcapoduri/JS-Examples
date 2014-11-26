<?php
require_once 'contracts/user.manager.contract.php';
require_once '../models/user.model.php';
require_once '../helpers/passwordHasher.php';


class userManager implements userManagerContract {
    public createUser ($username, $email, $pass) {}
    
    public validateUser ($userid, $hash) {}
    
    public startUserSession ($user) {}
    
    public removeUserSession ($user) {}
};

?>