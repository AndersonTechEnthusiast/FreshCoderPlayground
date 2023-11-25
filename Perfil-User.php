<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
    {
        require_once("Perfil-User/Cabecalho.php");
        require_once("Perfil-User/Corpo.php");
        require_once("Perfil-User/Links.php");
    }
    else
    if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
    {
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
                    icon: 'warning',
                    title: 'Você Não Tem Acesso a Essa Area !!!',
                    text: 'Erro Inesperado Você Não Tem Permissão para Estar Nessa Area',
                    didClose: () =>
                    {
                        window.location.href = 'Autor.php';
                    }
                });
            </script>
        </body>
        </html>
        ";
    }
?>



