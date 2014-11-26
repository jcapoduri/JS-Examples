<?php

interface basicController {
    public function getAll();
    public function get($id);
    public function post($id, $data);
    public function put($id, $data);
    public function delete($id);
};

?>