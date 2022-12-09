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

        $todoes = new Todo('', '');
        $todoes->read();
        $items = '';

        foreach ($todoes->read() as $todo) {
            $items .= View::render('home/items', [
                'title' => $todo['title'],
                'actionsButton' => View::render('home/actionButtons', [
                    'id' => $todo['id'],
                    'title' => $todo['title']

                ])
            ]);
        }

        return $items;
    }

    public static function getQtdTodoes($column, $value)
    {
        $todoes = new Todo('', '');
        return $todoes->readAdvanced("SELECT * FROM `todoes` WHERE '$column' = $value");
    }

    public static function newTodo(Request $request)
    {

        $postVars = $request->getPostVars();

        $title = filter_var($postVars['titleTodo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $todo = new Todo($title, '');

        $todo->create($todo);

        flash('message', 'Parabéns, Tarefa Adicionada!', 'success');
        return redirect("/");
        return self::getHome();
    }

    public static function deleteTodo(Request $request)
    {

        $postVars = $request->getPostVars();

        $todo = new Todo('', '');

        $todo->delete($postVars['deleteButton']);
        flash('message', "Tarefa " . $postVars['title'] . " Excluída!", 'danger');

        return redirect("/");
        return self::getHome();
    }
}
