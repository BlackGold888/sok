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

/**
 * @param $path
 * @return string
 */
function base_path($path = '')
{
    return __DIR__ . "/../{$path}";
}


/**
 * @param $viewName
 * @param $data
 * @return void
 */
function view($viewName, $data = [])
{
    extract($data);

    //recursive view finder
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(base_path('views')));

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getFilename() == $viewName) {
            require $file->getPathname();
            return;
        }
    }
}
