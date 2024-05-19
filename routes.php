<?php

$router->get('/', 'controllers/index.php')->middleware('auth');
$router->get('/about', 'controllers/about.php')->middleware('auth');
$router->get('/login', 'controllers/auth/login.php');
$router->post('/login', 'controllers/auth/signIn.php');
$router->get('/logout', 'controllers/auth/logout.php');
