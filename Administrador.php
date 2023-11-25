<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
    {
        require_once("Administrador/content/Cabecalho.php");
        require_once("Administrador/content/Corpo.php");
        require_once("Administrador/content/Links.php");
    }
    else
    {
        echo "Não tem Acesso a Essa Area";
    }
?>