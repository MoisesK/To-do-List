<?php

namespace App\Controllers;

use App\App\Http\Request;
use App\App\Util\View;
use App\Model\Todo;

class HomeController
{
    public static function getHome()
    {
        $content = View::render('home/home', [
            "register-todo" => View::render('home/registerTodo'),
            "items" => self::getTodoes(),
            "total" => self::getQtdTodoes("stats", 0),
            "conclude" => self::getQtdTodoes("stats", 1)
        ]);

        return View::getPage('TO-DO HOME', $content);
    }


    public static function getTodoes()
    {

        $todoes = new Todo('');
        $todoes->read();
        $items = '';

        foreach ($todoes->read() as $todo) {
            $items .= View::render('home/items', [
                'descript' => $todo['descript'],
                'actionsButton' => View::render('home/actionButtons', [
                    'id' => $todo['id']
                ])
            ]);
        }


        return $items;
    }

    public static function getQtdTodoes($column, $value)
    {
        $todoes = new Todo('');
        return $todoes->readAdvanced("SELECT * FROM `todoes` WHERE '$column' = $value");
    }




    public static function actionsTodoes(Request $request)
    {
        $postVars = $request->getPostVars();

        switch ($postVars) {
            case isset($postVars['createButton']):

                $postVars = $request->getPostVars();
                $descript = filter_var($postVars['descript-todo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $todo = new Todo($descript);
                $todo->create($todo);

                return self::getHome();
                break;

            case isset($postVars['deleteButton']):

                $todo = new Todo('');
                $todo->delete($postVars['deleteButton']);

                return self::getHome();
                break;

            case isset($postVars['concludeButton']):
                $todo = new Todo('');
                $todo->conclude($postVars['concludeButton']);

                return self::getHome();
                break;
            default:
                break;
        }
    }
}
