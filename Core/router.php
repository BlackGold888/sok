<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
];

if (array_key_exists($uri, $routes)) {
    require_once base_path($routes[$uri]);
} else {
    http_response_code(404);
    require_once 'controllers/404.php';
}