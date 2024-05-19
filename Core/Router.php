<?php

namespace Core;

use Core\Middleware\Middleware;

class Router {

    protected $routes = [];

    private function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }


    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function direct($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // apply middleware
                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }
                require base_path($route['controller']);
                return;
            }
        }

        http_response_code(404);
        require base_path('controllers/404.php');
    }

    public function middleware($key)
    {
        $this->routes[count($this->routes) - 1]['middleware'] = $key;
        return $this;
    }
}
