<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require('config.php');
    return new Core\Database($config['database']);
});

App::bind(Database::class, $container->resolve(Database::class));

