<?php
require_once __DIR__.'/../managers/contracts/user.manager.contract.php';
require_once __DIR__.'/basic.controller.php';

class userController implements basicController {
    protected $manager;
    protected $app;
    
    public function __construct(userManagerContract $mgr) {
        $this->manager = $mgr;
        $this->app = \Slim\Slim::getInstance();
    }
    
    public function getAll() {
        $hash = $this->app->getCookie('auth_token');
        $user = $manager->getUserFromHash($hash);
        $this->app->response->write($user->toJSON());
    }
    
    public function get($id) {
        //$manager->load
    }
    
    public function post() {
        $json_data = $this->app->request->getBody();
        $data = json_decode($json_data);
        $newid = $this->manager->singUpUser($data->username, $data->email, $data->password);
        return $newid;
    }
    
    public function login() {
        $json_data = $this->app->request->getBody();
        $data = json_decode($json_data);
        $hash = $this->manager->logInUser($data->username, $data->password);
        $this->app->setCookie("auth_token", $hash, "+1 hour", "/", $_SERVER['SERVER_NAME'], false, true);
    }
    
    public function put($id, $data){}
    
    public function delete($id){
        
    }
}

?>