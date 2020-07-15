<?php

function autoload($className) {
    $extension = '.php';
    $path = 'src';
    $filename = __DIR__ . '\\'. $path . DIRECTORY_SEPARATOR . $className;
    if (is_file($filename . $extension)) {
        include_once $filename . $extension;
    }
}
