<?php

$app->group('/user', function() use ($app) {
    require_once '../controller/user.controller.php';
    require_once '../managers/user.manager.php';
    
    $controller = new userController(new userManager());
    
    $app->get('/me', array($controller, ''));
});


?>