<?php
require_once __DIR__.'/../managers/contracts/user.manager.contract.php';
require_once __DIR__.'/../helpers/basic.controller.php';

class userController extends basicController {
    protected $manager;
    
    public function __construct(IuserManager $mgr) {
        $this->manager = $mgr;
        parent::__construct();
    }
    
    public function getAll() {
        $hash = $this->app->getCookie('auth_token');
        $user = $this->manager->getUserFromHash($hash);
        if (is_null($user)) {
            $this->app->halt(500);
        };
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
        if (is_null($hash)) {
            $this->app->halt(500);
        };
        $this->app->setCookie("auth_token", $hash, "1 hour");
    }
    
    public function put($id) {}
    
    public function delete($id){
        
    }
}

?>