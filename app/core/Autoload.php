<?php

    function autoload($className) {
        $paths = [
            __DIR__ . '/../controllers/' . $className . '.php',
            __DIR__ . '/../models/' . $className . '.php',
            __DIR__ . '/' . $className . '.php',
            __DIR__ . '/../helpers/' . $className . '.php',
            __DIR__ . '/../../config/' . $className . '.php',
            __DIR__ . '/../repositories/' . $className . '.php',
        ];

        foreach ($paths as $path) {
            if (file_exists($path)) {
                require_once $path;
                return;
            }
        }
    }
    spl_autoload_register('autoload');
?>