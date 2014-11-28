<?php

interface IbasicController {
    public function getAll();
    public function get($id);
    public function post();
    public function put($id);
    public function delete($id);
};

?>