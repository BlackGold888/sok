<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'auth' => Auth::class,
    ];

    /**
     * @param $key
     * @return void
     * @throws \Exception
     */
    public static function resolve($key)
    {
        $middleware = self::MAP[$key];

        if (!class_exists($middleware)) {
            throw new \Exception("Middleware {$middleware} not found");
        }

        (new $middleware)->handle();
    }
}
