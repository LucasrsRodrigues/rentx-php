<?php

$router->post('/cars', 'cars@createCar');
$router->get('/cars', 'cars@listCars');
