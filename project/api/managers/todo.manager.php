<?php
require_once __DIR__.'/contracts/todo.manager.contract.php';
require_once __DIR__.'/../models/todo.class.php';
require_once __DIR__.'/../models/item.class.php';


class todoManager implements ItodoManager {
    public function __construct() {
    }

    public function createTodo($item) {
        $todo = R::dispense("todo");
        $todo->fromJSON($item);
        return $todo;
    }
    
    public function updateTodo($id, $item) {}
    
    public function deleteTodo($id) {}
    
    public function getTodos($user) {
        $todos = [];
        foreach($user->ownTodo as $todo) {
            $todos[] = $todo->export();
        };
        return $todos;
    }
    
    public function assignTodoToUser($user, $todo) {
        $user->ownTodo[] = $todo;
        return R::store($user);
    }
};

?>