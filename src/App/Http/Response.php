<?php

namespace App\App\Http;

class Response
{
    private int $httpCode = 200;
    private array $headers = [];
    private string $contentType = 'text/html';
    private string $content = '';

    public function __construct(string $httpCode, mixed $content, mixed $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->contentType = $contentType;
    }

    public function addHeaderContentType(): void
    {
        $this->addHeader('Content-Type', $this->getContentType());
    }

    public function addHeader(string $key, string $value): void
    {
        $this->headers[$key] = $value;
    }

    public function sendHeaders(): void
    {
        http_response_code($this->httpCode);

        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }
    }

    public function sendResponse()
    {
        //Método que imprime o conteúdo para o usuário

        $this->sendHeaders();

        //imprime o conteúdo
        switch ($this->contentType) {
            case ($this->contentType = 'text/html'):
                echo $this->content;
                exit;
        }
    }

    public function getContentType()
    {
        return $this->contentType;
    }
}
