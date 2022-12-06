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

$obRouter->get('/create', [
    function () {
        $request = new Request();
        return new Response(200, HomeController::actionsTodoes($request));
    }
]);

$obRouter->post('/', [
    function () {
        $request = new Request();
        return new Response(200, HomeController::actionsTodoes($request));
    }
]);
