<?php


use core\Router;

$router = new Router();

require('categories.routes.php');
require('users.routes.php');
require('authenticate.routes.php');

// $router->post('/cars', 'cars@createCategory');
// $router->get('/cars', 'cars@listCategory');
// $router->post('/users', 'accounts@createUser');
