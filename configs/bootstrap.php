<?php

spl_autoload_register(function($className)
{
    $classPath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($classPath)) {
        require_once $classPath;
    }
});


