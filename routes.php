<?php

$router->get('/', 'controllers/index.php')->middleware('auth');
$router->get('/about', 'controllers/about.php')->middleware('auth');
$router->get('/login', 'controllers/auth/login.php');
$router->post('/login', 'controllers/auth/signIn.php');
$router->get('/logout', 'controllers/auth/logout.php');

$router->get('/section/edit', 'controllers/sections/edit.php')->middleware('auth');
$router->patch('/section/update', 'controllers/sections/update.php')->middleware('auth');
$router->delete('/section/delete', 'controllers/sections/delete.php')->middleware('auth');
$router->get('/section/add', 'controllers/sections/add.php')->middleware('auth');
$router->post('/section/store', 'controllers/sections/store.php')->middleware('auth');
