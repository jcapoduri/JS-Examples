<?php

interface basicController {
    public function getAll();
    public function get($id);
    public function post($data);
    public function put($id, $data);
    public function delete($id);
};

?>