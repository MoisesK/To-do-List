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
            "message" => get('message'),
            "items" => self::getTodoes(),
            "total" => self::getQtdTodoes("stats", 0)
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
        $queryParams = $request->getQueryParams();

        switch ($postVars) {
            case isset($queryParams['createButton']):
                $descript = filter_var($queryParams['descriptTodo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $todo = new Todo($descript);
                $todo->create($todo);

                flash('message', 'Parabéns, Tarefa Adicionada!', 'success');
                return self::getHome();
                break;

            case isset($postVars['deleteButton']):
                $todo = new Todo('');
                $todo->delete($postVars['deleteButton']);
                flash('message', 'Parabéns, Tarefa Concluída!', 'success');
                return self::getHome();
                break;

            default:
                break;
        }
    }
}
