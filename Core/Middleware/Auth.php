<?php

//create middle
//return function () {
//    if (!isset($_SESSION['user'])) {
//        header('Location: /login');
//        exit;
//    }
//};

namespace Core\Middleware;
class Auth
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }

}