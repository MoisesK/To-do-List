<?php

namespace App\Controllers;

use App\App\Util\View;

class HomeController
{
    public static function getHome()
    {
        $content = View::render('home', [
            "teste" => "teste"
        ]);

        return View::getPage('TO-DO HOME', $content);
    }
}
