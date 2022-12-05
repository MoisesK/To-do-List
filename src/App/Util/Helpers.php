<?php

// HELPERS

//RECARREGAR PÁGINA
function refresh($time): void
{
    header("Refresh: $time.;");
}

//RECUPERAR MENSAGEM QUE ESTAVA NA SESSÃO
function getMessage(): mixed
{
    if (isset($_SESSION["message"])) {

        echo $_SESSION["message"];
        session_unset($_SESSION["message"]);
        refresh(3);
    }
}
