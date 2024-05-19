<?php

namespace Core;

class App
{
    protected static $registry = [];

    /**
     * @param $key
     * @param $value
     * @return void
     */
    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new \Exception("No {$key} is bound in the container.");
        }

        return static::$registry[$key];
    }

    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public static function resolve($key)
    {
        return static::get($key);
    }
}
