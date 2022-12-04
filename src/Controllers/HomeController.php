<?php

namespace App\Controllers;

use App\App\Http\Request;
use App\App\Util\View;
use App\Library\Connection\Connect;
use App\Model\Todo;

class HomeController
{
    public static function getHome()
    {
        $content = View::render('home/home', [
            "register-todo" => View::render('home/registerTodo'),
            "items" => self::getTodoes()
        ]);

        return View::getPage('TO-DO HOME', $content);
    }

    public static function newTodo(Request $request)
    {

        $postVars = $request->getPostVars();

        $descript = filter_var($postVars['descript-todo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $todo = new Todo($descript);

        $todo->create($todo);

        return self::getHome();
    }

    public static function getTodoes()
    {

        $todoes = new Todo('todoes');
        $todoes->read();

        foreach ($todoes->read() as $todo) {
            $items .= View::render('home/items', [
                'descript' => $todo['descript']
            ]);
        }

        return $items;
    }
}
