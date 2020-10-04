<?php
spl_autoload_register(function ($class) {
    if(file_exists('Controllers' . '/'. $class . '.php')){
        include 'Controllers' . '/'. $class . '.php';
    }else if(file_exists('Classes' . '/'. $class . '.php')){
        include 'Classes' . '/'. $class . '.php';
    }else if (file_exists('Models' . '/'. $class . '.php')){
        include 'Models' . '/'. $class . '.php';
    }else if (file_exists('Services' . '/' . $class . '.php')) {
        include 'Services' . '/' . $class . '.php';
    }
});