<?php

error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    require_once(__DIR__ . '/../vendor/' . str_replace('\\', '/', $class) . '.class.php');
});