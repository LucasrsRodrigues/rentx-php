<?php

$router->post('/users', 'accounts@createUser');
$router->post('/avatar', 'accounts@updateUserAvatar');
