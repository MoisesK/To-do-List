<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\App\Util\View;
use App\Controllers\HomeController;
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

$home->getHome();
