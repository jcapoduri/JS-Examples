<?php

require_once '../controllers/todos.controller.php';
require_once '../managers/todos.manager.php';

$app->group('/todos', function() use ($app) {
    require_once '../controller/todo.controller.php';
    require_once '../managers/todo.manager.php';
    
    $controller = new todoController(new todoManager());
    
    $app->get('/', array($controller, 'getAll'));
    $app->get('/:id', array($controller, 'get'));
    $app->post('/:id', array($controller, 'post'));
    $app->put('/:id', array($controller, 'put'));
    $app->delete('/:id', array($controller, 'delete'));
});

?>