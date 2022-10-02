<?php

use core\AppError;

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

session_start();
require '../vendor/autoload.php';
require '../src/routes/index.routes.php';

set_exception_handler(function (\Throwable $e) {
  echo $e->getMessage();
});

$router->run($router->routes);
