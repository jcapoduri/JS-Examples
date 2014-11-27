<?php
require_once __DIR__.'/base.model.php';

class AuthToken extends RESTorm {
    public function fromJSON($json) {
        $this->bean->token = $json->token;
        $this->bean->userid = $json->userid;
        $this->bean->expireAt = $json->expireAt;
    }
    
    public function update() {
        if ($this->bean->expireAt == "") {
            $this->bean->expireAt = date("+1 hour");
        };
        
        if ($this->bean->token == "") {
            $salt = substr(sha1(mt_rand()), 0, 22);
            $this->bean->token = sha1($this->bean->userid . $salt . $this->bean->expireAt);
        };
        
        //TODO check token collission
    }
    
    public function validate($data) {}
}

?>