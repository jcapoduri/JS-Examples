<?php
require_once __DIR__.'/base.model.php';

class Item extends RESTorm {
    public function fromJSON($json) {
        $this->bean->text = $json->text;
        $this->bean->done = $json->done;
    }
}

?>