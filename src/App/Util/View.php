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

    public static function getPage(string $title, mixed $content): mixed
    {
        //método que retorna a página genérica
        return self::render(
            'layout/page',
            [
                "title" => $title,
                "header" => self::getHeader(),
                "content" => $content,
                "footer" => self::getFooter()

            ]
        );
    }

    private function getHeader(): string
    {
        return self::render('layout/header');
    }

    private function getFooter(): string
    {
        return self::render('layout/footer');
    }
}