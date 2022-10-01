<?php


use core\Router;

$router = new Router();

$router->post('/cars', 'cars@createCategory');
// $router->post('/cars', 'cars@createCategory');

// require('./cars.routes.php');
// $router->loadRouteFile('cars');
