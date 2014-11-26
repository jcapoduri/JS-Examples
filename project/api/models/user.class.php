<?php
require_once 'base.model.php';

class User extends RESTorm {
    public function fromJSON ($json) {
        $this->bean->username = $json->name;
        $this->bean->email = $json->email;
        $this->bean->password = $json->pass;
    }
    
};

?>