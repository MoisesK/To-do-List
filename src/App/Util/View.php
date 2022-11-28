<?php

namespace App\Util;

class View
{
    private static array $vars;

    public static function init(array $vars = [])
    {
        //Método responsável por definir os dados iniciais da classe
        self::$vars = $vars;
    }

    public static function getContentView($view): string
    {
        $archive = __DIR__ . '/../../View/' . $view . '.php';

        //verifica a existência do arquivo e retorna ele.
        return file_exists($archive) ? file_get_contents($archive) : '';
    }

    public static function render(string $view, array $vars = []): string
    {
        $contentView = self::getContentView($view);

        $vars = array_merge(self::$vars, $vars);

        $keys = array_keys($vars);
        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $keys);

        //Retorna o conteúdo renderizado
        return str_replace(
            $keys,
            array_values($vars),
            $contentView
        );
    }
}
