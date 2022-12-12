<?php

namespace App\App\Util;

class View
{
    public array $vars = [];

    public function init(array $vars = [])
    {
        //Método responsável por definir dados como URL(exemplo).
        $this->$vars = $vars;
    }

    public function getContentView($view): string
    {
        $archive = __DIR__ . '/../../View/' . $view . '.php';

        //verifica a existência do arquivo e retorna ele.
        return file_exists($archive) ? file_get_contents($archive) : '';
    }

    public function render(string $view, array $vars = []): string
    {
        $contentView = $this->getContentView($view);

        $vars = array_merge($this->vars, $vars);

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

    public function getPage(string $title, mixed $content): mixed
    {
        //método que retorna a página genérica
        return $this->render(
            'layout/page',
            [
                "header" => $this->getHeader(),
                "title" => $title,
                "content" => $content,
                "footer" => $this->getFooter()

            ]
        );
    }

    private function getHeader(): string
    {
        return $this->render("layout/header");
    }

    private function getFooter(): string
    {
        return $this->render("layout/footer");
    }
}
