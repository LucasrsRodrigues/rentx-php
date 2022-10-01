<?php


ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

session_start();
require '../vendor/autoload.php';
require '../src/routes/index.routes.php';

$router->run($router->routes);
