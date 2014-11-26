<?php
require_once 'contracts/todo.manager.contract.php';
require_once '../models/todo.model.php';


class todoManager implements todoManagerContract {
    public function createTodo($item) {
        $todo = R::dispense("todo");
        $todo->fromJSON($item);
        $id = R::store($todo);
        return $id;
    }
    
    public function updateTodo($id, $item) {
        $todo = R::load("todo", $id);
        $todo->fromJSON($item);
        $id = R::store($todo);
        return $id;
    }
    
    public function deleteTodo($id) {
        $todo = R::load("todo", $id);
        return R::trash($todo);
    }
    
    public function getTodos($user) {
        return R::findAll('todo');
    }
};

?>