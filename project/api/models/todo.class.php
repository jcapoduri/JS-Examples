<?php
require_once __DIR__.'/base.model.php';
require_once __DIR__.'/item.class.php';

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