<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WilliamCosta\DatabaseManager\Database;
use WilliamCosta\DotEnv\Environment;

// Carrega Variaveis de ambiente
Environment::load(__DIR__ . '/../');

// Define as configurações de Banco de Dados
Database::config(getenv('DB_HOST'), getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_PORT'));

echo "sucesso";
