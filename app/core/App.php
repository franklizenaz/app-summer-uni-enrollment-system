<?php
require_once __DIR__ . '/Autoload.php';

class App {
    public function run() {
        $router = new Router();
        $router->dispatch();
    }
}
