<?php
require_once __DIR__.'/../helpers/base.model.php';
require_once __DIR__.'/item.class.php';

class Todo extends RESTorm {
    public function fromJSON($json) {
        $todoItem = null;
        $this->bean->name = $json->name;
        $this->bean->ownItems = [];
        foreach( $json->items as $item) {
            $todoItem = R::dispense("item");
            $todoItem->fromJSON($item);
            $this->bean->ownItems[] = $todoItem;
        };
    }
    
    public function validate($data) {}
}

?>