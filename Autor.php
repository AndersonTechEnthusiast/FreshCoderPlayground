<?php
session_set_cookie_params(3600*24*30,'/');
session_start();
    if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
    {
        require_once("Autor/index.php");
    }
    else
    if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario' || $_SESSION['autor']['Login'] == null && $_SESSION['autor']['nivel_acessos'] == null){
        if(session_status() == PHP_SESSION_ACTIVE)
        {
            session_destroy();
            echo 
            "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Montserrat:wght@500;600&family=Rajdhani:wght@500&display=swap');
                    body
                    {
                        background: #202020;
                        color: white;
                        font-family: 'Rajdhani',sans-serif;
                    }
                </style>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Você Não Tem Acesso a Essa Area !!!',
                        text: 'Erro Inesperado Você Não Tem Permissão para Estar Nessa Area',
                        didClose: () =>
                        {
                            window.location.href = 'index.php';
                        }
                    });
                </script>
            </body>
            </html>
            ";
        }
        else
        {
            session_destroy();
            echo 
            "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Montserrat:wght@500;600&family=Rajdhani:wght@500&display=swap');
                    body
                    {
                        background: #202020;
                        color: white;
                        font-family: 'Rajdhani',sans-serif;
                    }
                </style>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Você Não Tem Acesso a Essa Area !!!',
                        text: 'Erro Inesperado Você Não Tem Permissão para Estar Nessa Area',
                        didClose: () =>
                        {
                            window.location.href = 'index.php';
                        }
                    });
                </script>
            </body>
            </html>
            ";
        }
    }
?>