<?php
require_once __DIR__.'/contracts/todo.manager.contract.php';
require_once __DIR__.'/../models/todo.class.php';
require_once __DIR__.'/../models/item.class.php';


class todoManager implements ItodoManager {
    public function __construct() {
    }

    public function createTodo($item) {}
    
    public function updateTodo($id, $item) {}
    
    public function deleteTodo($id) {}
    
    public function getTodos($user) {
        $todos = $user->ownTodos;
        return $todos;
    }
};

?>