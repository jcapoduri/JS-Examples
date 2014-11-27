<?php

$app->group('/todo', function() use ($app) {
    require_once __DIR__.'/../controllers/todo.controller.php';
    require_once __DIR__.'/../managers/todo.manager.php';
    
    $controller = new todoController(new todoManager());
    $app = \Slim\Slim::getInstance();
    
    $app->get('/', array($controller, 'getAll'));
    $app->get('/:id', array($controller, 'get'));
    $app->post('/:id', array($controller, 'post'));
    $app->put('/:id', array($controller, 'put'));
    $app->delete('/:id', array($controller, 'delete'));
});

?>