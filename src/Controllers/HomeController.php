<?php

namespace App\Controllers;

use App\App\Util\View;

class HomeController
{
    public function getHome()
    {
        $content = View::render('home', [
            "teste" => "teste"
        ]);

        return View::getPage('TO-DO HOME', $content);
    }
}
