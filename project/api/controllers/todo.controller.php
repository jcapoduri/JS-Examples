<?php
require_once __DIR__.'/../managers/todo.manager.php';
require_once __DIR__.'/../managers/auth.manager.php';
require_once __DIR__.'/basic.controller.php';

class todoController implements basicController{
    protected $todoManager;
    protected $userManager;
    protected $app;

    public function __construct(ItodoManager $todomgr, IuserManager $usermgr) {
        $this->todoManager = $todomgr;
        $this->userManager = $usermgr;
        $this->app = \Slim\Slim::getInstance();
    }

    public function getAll() {
        $user = $this->userManager->getCurrentUser();
        $todos = $this->todoManager->getTodos($user);
        $this->app->response->write(json_encode($todos));
    }
    
    public function get($id) {}
    public function post() {}
    public function put($id) {}
    public function delete($id) {}
};

?>