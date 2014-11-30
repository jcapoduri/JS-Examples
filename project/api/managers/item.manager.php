<?php
require_once __DIR__.'/contracts/item.manager.contract.php';
require_once __DIR__.'/../models/item.class.php';


class itemManager implements IitemManager {

    public function createItem($item) {
        $todo = R::dispense("todo");
        $todo->fromJSON($item);
        return $todo;
    }
    
    public function updateItem($id, $item) {}
    
    public function deleteItem($id) {}
    
    public function getItems($user) {
        $todos = [];
        foreach($user->ownTodo as $todo) {
            $todos[] = $todo->export();
        };
        return $todos;
    }
    
    public function assignItemToUser($user, $todo) {
        $user->ownTodo[] = $todo;
        return R::store($user);
    }
};

?>