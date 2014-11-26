<?php
require_once 'base.model.php';
require_once 'item.class.php';

class Todo extends RESTorm {
    public function fromJSON($json) {
        $todoItem = null;
        $this->bean->name = $json->name;
        $this->bean->ownItems = [];
        foreach($item as $json->items) {
            $todoItem = R::dispense("item");
            $todoItem->fromJSON($item);
            $this->bean->ownItems[] = $todoItem;
        };
    }
}

?>