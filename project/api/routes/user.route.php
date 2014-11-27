<?php

$app->group('/user', function() {
    require_once '../controller/user.controller.php';
    require_once '../managers/user.manager.php';
    
    $controller = new userController(new userManager());
    
    $app->get('/me', array($controller, 'getAll'));
    $app->post('/login', array($controller, 'login'));
    $app->post('/singup', array($controller, 'post'));
    $app->put('/', array($controller, 'put'));
    $app->delete('/', array($controller, 'delete'));
});


?>