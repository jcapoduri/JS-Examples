<?php
require_once __DIR__.'/contracts/user.manager.contract.php';
require_once __DIR__.'/contracts/token.manager.contract.php';
require_once __DIR__.'/../models/user.class.php';
require_once __DIR__.'/../helpers/passwordHasher.php';
require_once __DIR__.'/token.manager.php';

class userManager implements IuserManager {
    protected $tokenManager;
    
    public function __construct(ItokenManager $mgr) {
        $this->tokenManager = $mgr;
    }
    
    public function getUserById($id) {
        return R::load("user", $id);
    }
    
    public function singUpUser ($username, $email, $pass) {
        $user = R::dispense("user");
        $user->username = $username;
        $user->email = $email;
        $user->password = passwordHasher::hash($pass);
        return R::store($user);
    }
    
    public function logInUser ($username, $password) {
        $user = R::findOne("user", "username = ?", [
                    $username
                ]);
        if (is_null($user)) return null;
        if (!passwordHasher::check_password($user->password, $password)) return null;
        return $this->tokenManager->createToken($user->box());
    }
    
    public function checkLogin ($hash) {
        return $this->tokenManager->checkToken($hash);
    }
    
    public function getUserFromHash($hash = "") {
        $id = $this->tokenManager->checkTokenAndGetUserId($hash);
        if (is_null($id)) return null;
        return R::load("user", $id);
    }

    public function getCurrentUser() {
        return $this->getUserFromHash();
    }
};

?>