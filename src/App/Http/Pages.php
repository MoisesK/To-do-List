<?php

namespace App\App\Http;

// Gerenciador de páginas
use App\Controllers\HomeController;



// ROTA HOME
$obRouter->get('/', [
    function () {
        $home = new HomeController();
        return new Response(200, $home->getHome());
    }
]);

$obRouter->post('/create', [
    function () {
        $home = new HomeController();
        $request = new Request();
        return new Response(200, $home->newTodo($request));

        die();
    }
]);

$obRouter->post('/delete', [
    function () {
        $home = new HomeController();
        $request = new Request();
        return new Response(200, $home->deleteTodo($request));
    }
]);

$obRouter->post('/conclude', [
    function () {
        $home = new HomeController();
        $request = new Request();
        return new Response(200, $home->concludeTodo($request));
    }
]);
