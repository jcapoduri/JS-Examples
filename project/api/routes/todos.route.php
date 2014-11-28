<?php

$app->group('/todo', function() {
    require_once __DIR__.'/../controllers/todo.controller.php';
    require_once __DIR__.'/../managers/todo.manager.php';
    require_once __DIR__.'/../managers/user.manager.php';
    require_once __DIR__.'/../managers/token.manager.php';
    
    $usermgr = new userManager(new tokenManager());
    $todomgr = new todoManager($usermgr);

    $controller = new todoController($todomgr, $usermgr);
    $app = \Slim\Slim::getInstance();
    
    $app->get('/', array($controller, 'getAll'));
    $app->get('/:id', array($controller, 'get'));
    $app->post('/:id', array($controller, 'post'));
    $app->put('/:id', array($controller, 'put'));
    $app->delete('/:id', array($controller, 'delete'));
});

?>