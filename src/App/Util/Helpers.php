<?php

// HELPERS //

use App\App\Util\View;

//RECARREGAR PÁGINA
function refresh($time): void
{
    header("Refresh: $time.;");
}

//REDIRECIONAMENTO
function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

//CRIA UMA FLASH MESSAGE
function flash($key, $msg, $type = 'danger')
{
    $msgRender = View::render('home/assetsHome/flashMessage', [
        "message" => $msg,
        "type" => $type
    ]);

    if (!isset($_SESSION['flash'][$key])) {
        $_SESSION['flash'][$key] = $msgRender;
    }
}

// RECUPERA A FLASH MESSAGE
function get($key)
{
    if (isset($_SESSION['flash'][$key])) {
        $message = $_SESSION['flash'][$key];

        unset($_SESSION['flash'][$key]);
        refresh(2);

        return $message ?? '';
    }
}
