<?php

namespace App\Controllers;

use App\App\Util\View;

class HomeController
{
    public static function getHome()
    {
        $content = View::render('home/home', [
            "register-todo" => View::render('home/registerTodo'),
            "teste" => "teste"
        ]);

        return View::getPage('TO-DO HOME', $content);
    }
}
