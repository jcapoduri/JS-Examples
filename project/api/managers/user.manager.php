<?php
require_once __DIR__.'/contracts/user.manager.contract.php';
require_once __DIR__.'/../models/user.class.php';
require_once __DIR__.'/../helpers/passwordHasher.php';
require_once __DIR__.'/token.manager.php';

class userManager implements userManagerContract {
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
    
    public function logInUser ($username, $passsword) {
        $user = R::findOne("user", "username = ? AND password = ?", [
                    $username,
                    $password
                ]);
        return $user;
    }
    
    public function checkLogin ($hash) {
        $manager = new tokenManager();
        return $manager->createToken($hash);
    }
    
    public function getUserFromHash($hash) {
        $manager = new tokenManager();
        $id = $manager->checkTokenAnGetUserId($hash);
        if (is_null($id)) return null;
        return R::load("user", $id);
    }
};

?>