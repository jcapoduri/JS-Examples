<?php

abstract class RESTorm extends RedBean_SimpleModel {
    
    public function toJSON () {
        return json_encode($this->bean->export());
    }
    
    abstract public function fromJSON ($data);
    
    abstract public function validate($data);
    
    public function sanitize($data) {
        return $data
    }
    
}

?>