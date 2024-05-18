<?php

/**
 * @param $value
 * @return bool
 */
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] == $value;
}

/**
 * @param $data
 * @return void
 */
function dd($data)
{
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}

function base_path($path = '')
{
    return __DIR__ . "/../{$path}";
}

function view($path, $data = [])
{
    extract($data);

    require_once base_path($path);
}
