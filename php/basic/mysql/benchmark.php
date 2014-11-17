<?php

class benchmark {
    
    protected $timer = 0;
    protected $marks = [];

    public function __construct($autostart = false){
        if ($autostart) $this->start();
    }

    public function mark(string $name) {
        $this->marks[$name] = microtime();
    }

    public function start() {
        $timer = microtime();
    }

    public function elapsed() {
        return microtime() - $this->timer;
    }
}

?>