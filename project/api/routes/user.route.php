<?php

$app->group('/user', function() {
    require_once __DIR__.'/../controllers/user.controller.php';
    require_once __DIR__.'/../managers/user.manager.php';
    
    $controller = new userController(new userManager());
    $app = \Slim\Slim::getInstance();
    
    $app->get('/me', array($controller, 'getAll'));
    $app->post('/login', array($controller, 'login'));
    $app->post('/singup', array($controller, 'post'));
    $app->put('/', array($controller, 'put'));
    $app->delete('/', array($controller, 'delete'));
});


?>