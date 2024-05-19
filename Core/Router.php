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


    /**
     * @param $uri
     * @param $controller
     * @return $this
     */
    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     * @return $this
     */
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     * @return $this
     */
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     * @return $this
     */
    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    /**
     * @param $uri
     * @param $method
     * @return void
     * @throws \Exception
     */
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

    /**
     * @param $key
     * @return $this
     */
    public function middleware($key)
    {
        $this->routes[count($this->routes) - 1]['middleware'] = $key;
        return $this;
    }
}
