<?php
require_once __DIR__.'/../helpers/base.model.php';

class Item extends RESTorm {
    public function fromJSON($json) {
        $this->bean->text = $json->text;
        $this->bean->done = $json->done;
    }
    
    public function validate($data) {}
}

?>