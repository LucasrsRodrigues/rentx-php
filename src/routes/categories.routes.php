<?php

$router->post('/categories', 'cars@createCategory');

$router->get(
  '/categories',
  'cars@listCategory'
);
