<?php

namespace App\App\Http;

// Gerenciador de páginas
use App\Controllers\HomeController;



// ROTA HOME
$obRouter->get('/', [
    function () {
        return new Response(200, HomeController::getHome());
    }
]);

$obRouter->post('/create', [
    function () {
        $request = new Request();
        return new Response(200, HomeController::newTodo($request));

        die();
    }
]);

$obRouter->post('/delete', [
    function () {
        $request = new Request();
        return new Response(200, HomeController::deleteTodo($request));
    }
]);

$obRouter->post('/conclude', [
    function () {
        $request = new Request();
        return new Response(200, HomeController::concludeTodo($request));
    }
]);
