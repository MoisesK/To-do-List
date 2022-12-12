<?php

namespace App\Controllers;

use App\App\Http\Request;
use App\App\Util\View;
use App\Library\Connection\Connect;
use App\Model\Todo;

class HomeController
{
    public function getHome()
    {
        $view = new View();
        $content = $view->render('home/home', [
            "register-todo" => $view->render('home/registerTodo'),
            "message" => get('message'),
            "items" => $this->getTodoes(),
            "total" => $this->getQtdTodoes("stats", '0'),
            "totalConclude" => $this->getQtdTodoes("stats", '1'),
            "completedTasks" => $this->getCompletedTodoes()
        ]);

        return $view->getPage('TO-DO HOME', $content);
    }


    public function getTodoes()
    {
        $view = new View();
        $todoes = new Todo('');
        $todoes->read('stats');
        $items = '';

        foreach ($todoes->read('stats') as $todo) {
            $items .= $view->render('home/items', [
                'title' => $todo['title'],
                'actionsButton' => $view->render('home/actionButtons', [
                    'id' => $todo['id'],
                    'title' => $todo['title']
                ])
            ]);
        }

        return $items;
    }

    public function getCompletedTodoes()
    {
        $view = new View();
        $todoes = new Todo('');
        $todoes->read('stats');
        $items = '';

        foreach ($todoes->read('stats', 1) as $todo) {
            $items .= $view->render('home/assetsHome/itemsCompleted', [
                'title' => $todo['title'],
                'id' => $todo['id'],
            ]);
        }

        return $items;
    }



    public function getQtdTodoes($column, $value)
    {
        $todoes = new Todo('');
        return $todoes->readQtdTodoes("SELECT * FROM `todoes` WHERE $column = $value");
    }

    public function newTodo(Request $request)
    {

        $postVars = $request->getPostVars();

        $title = filter_var($postVars['titleTodo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $todo = new Todo($title);

        $todo->create($todo);

        flash('message', 'Parabéns, Tarefa Adicionada!', 'success', 'bi-calendar2-plus');
        return redirect("/");
        return $this->getHome();
    }

    public function deleteTodo(Request $request)
    {

        $postVars = $request->getPostVars();

        $todo = new Todo('');

        $todo->delete($postVars['deleteButton']);
        flash('message', "Tarefa " . $postVars['title'] . " excluída!", 'danger', 'bi-calendar-x');

        return redirect("/");
        return $this->getHome();
    }

    public function concludeTodo(Request $request)
    {

        $postVars = $request->getPostVars();

        $todo = new Todo('', '');
        $todo->update($postVars['concludeButton']);

        flash('message', "Parabéns, " . $postVars['title'] . " concluída!", 'success', 'bi-calendar-check');
        return redirect("/");
        return $this->getHome();
    }
}
