<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    require base_path("Core/{$class}.php");
});

require BASE_PATH . 'Core/router.php';


// connect to the database MySQL

$config = require('config.php');
$database = new Database($config['database']);