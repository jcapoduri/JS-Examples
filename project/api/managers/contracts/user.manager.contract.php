<?php

interface IuserManager {
    public function getUserById($id);
    
    public function singUpUser($username, $email, $password);
    
    public function logInUser($username, $password);
    
    public function checkLogin($hash);
    
    public function getUserFromHash($hash);

    public function getCurrentUser();
};

?>