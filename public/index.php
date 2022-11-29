<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\App\Http\Request as HttpRequest;
use App\App\Http\Response;
use App\App\Util\View;
use App\Controllers\HomeController;
use App\Http\Request;
use WilliamCosta\DatabaseManager\Database;
use WilliamCosta\DotEnv\Environment;

// Carrega Variaveis de ambiente
Environment::load(__DIR__ . '/../');

// Define as configurações de Banco de Dados
Database::config(getenv('DB_HOST'), getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_PORT'));

// Definir constante URL projeto
define('URL', getenv('URL'));

//Definir valor padrão de variaveis
View::init([
    'URL' => URL
]);

$home = new HomeController();


$response = new Response();
$response->sendResponse($home->getHome());

echo "<pre>";
var_dump($response);
echo "</pre>";
