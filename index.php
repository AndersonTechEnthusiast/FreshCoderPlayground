<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();

    if(@$_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
    {
        header('Location: Perfil-User.php');
    }
    else
    if(@$_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
    {
        header("Location: Autor.php");
    }
    else
    if(@$_SESSION['Administrador']['Login'] == true && @$_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
    {
        header("Location: Administrador.php");
    }
    {
        require_once("index/cabecalho.php");
        require_once("index/Corpo.php");
        require_once("index/Links.php");
    }
?>