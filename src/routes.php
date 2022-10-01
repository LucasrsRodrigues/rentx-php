<?php

use core\Router;

$router = new Router();

$router->post('/', 'cars@createCategory');
