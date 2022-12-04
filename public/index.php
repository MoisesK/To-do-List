<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\App\Http\Router;
use App\App\Util\View;
use WilliamCosta\DotEnv\Environment;

// Carrega Variaveis de ambiente
Environment::load(__DIR__ . '/../');

// Definir constante URL projeto
define('URL', getenv('URL'));

//Definir valor padrão de variaveis
View::init([
    'URL' => URL
]);

// Inicia o roteador
$obRouter = new Router(URL);

// Inclui as Rotas de Páginas
include __DIR__ . '/../src/App/Http/Pages.php';

// Imprime as Páginas
$obRouter->run()->sendResponse();
