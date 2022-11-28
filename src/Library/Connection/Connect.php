<?php

namespace App\Library\Connection;

// Modelo para caso queira conectar ao banco de dados sem utilizar dependencia.

abstract class Connect
{

    private static $instance;
    public static function getConn()
    {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO("mysql:host=localhost;dbname=crud;charset=utf8", "root", "");
        }
        return self::$instance;
    }
}
