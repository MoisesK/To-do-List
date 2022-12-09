<?php

namespace App\Library\Connection;

use PDO;
use WilliamCosta\DotEnv\Environment;

//CARREGAR VARIÁVEIS DE AMBIENTE DO PROJETO
Environment::load(__DIR__ . '/../../');

class Connect
{
    private static $instance;

    public static function getConn(): PDO

    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME') . ";charset=utf8", getenv('DB_USER'), getenv('DB_PASS'));
        }

        return self::$instance;
    }
}
