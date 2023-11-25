<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap');
         *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body
        {
            background: #202020;
            color: white;
            font-family: 'Rajdhani',sans-serif;
            font-size: 20px;
        }
    </style>
</head>
<body>
<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(@$_SESSION['usuario']['Login'] == true && @$_SESSION['usuario']['nivel_acessos'] == 'usuario')
        { 
            $METHOD = $_POST;
            function UpdateSetWhere($Global)
            {
                try
                {
                    $host = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $dtbs = 'conquest_go';
                    $conn = new PDO("mysql:host=$host;dbname=$dtbs", $user , $pass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    if($conn)
                    {
                        $chave = array_keys($Global);
                        $ultimoTermo = end($chave);
                        $Set = $ultimoTermo." = :".$ultimoTermo;
                        $sql = "UPDATE usuarios SET $Set WHERE id = :id";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindValue(":".$ultimoTermo,end($Global));
                        $stmt->bindValue(':id',$_SESSION['usuario']['id']);
                        if($stmt->execute())
                        {
                           $_SESSION['usuario'][$ultimoTermo] = end($Global);
                           return true;
                        }
                        else
                        {
                           return false;
                        }
                    }
                    else
                    {
                        return 'ErrorBancoNaoExecutouUser';
                    }
                }catch(PDOException $error)
                {
                    return 
                    "
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error no Banco de Dados',
                                text: 'O erro no Banco de Dados se Deve ao ['".$error->getMessage()."'].',
                                didClose: () => {
                                    window.location.href = '../Perfil-User.php';
                                }
                            });
                        </script>
                    ";
                }
            }
            function Notificacao($Global)
            {
                $UserLogado = 
                "
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'A Informação Foi Alterada com Sucesso !!!',
                            text: 'O ".implode('',array_keys($Global))." foi alterado com sucesso !!!',
                            didClose: () => {
                                window.location.href = '../Perfil-User.php';
                            }
                        });
                    </script>
                ";
                $UserLogadoErrorConsult = 
                "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error na Execução da Consulta de Edição',
                            text: 'Ocorre um Erro Inesperado na Execução da Consulta que e responsavel pela Edição',
                            didClose: () => {
                                window.location.href = '../Perfil-User.php';
                            }
                        });
                    </script>
                ";
                $BancoNaoExecutadoUser = 
                "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Inesperado',
                            text: ' O Banco de Dados Não foi Executado Corretamente, Por Favor tente mais Tarde !!!',
                            didClose: () => {
                                window.location.href = '../Perfil-User.php';
                            }
                        });
                    </script>
                ";
                $conjunto = [
                    'UsuarioLogado' => $UserLogado,
                    'UsuarioLogadoErrorConsult' => $UserLogadoErrorConsult,
                    'ErroBancoUsuario' => $BancoNaoExecutadoUser
                ];
                return $conjunto;
            }
            $UpdateSetWhere = UpdateSetWhere($METHOD);
            $Notificacao = Notificacao($METHOD);
            if($UpdateSetWhere == true)
            {
                echo $Notificacao['UsuarioLogado'];
            }
            else
            if($UpdateSetWhere == false)
            {
                echo $Notificacao['UsuarioLogadoErrorConsult'];
            }
            else
            if($UpdateSetWhere == 'ErrorBancoNaoExecutouUser')
            {
                echo $Notificacao['ErroBancoUsuario'];
            }
            else
            {
                echo $UpdateSetWhere;
            }
        }
        else
        if(@$_SESSION['autor']['Login'] == true && @$_SESSION['autor']['nivel_acessos'] == 'autor')
        {
            $METHOD = $_POST;
            function UpdateSetWhere($Global)
            {
                try
                {
                    $host = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $dtbs = 'conquest_go';
                    $conn = new PDO("mysql:host=$host;dbname=$dtbs", $user , $pass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    if($conn)
                    {
                        $chave = array_keys($Global);
                        $ultimoTermo = end($chave);
                        $Set = $ultimoTermo." = :".$ultimoTermo;
                        $sql = "UPDATE usuarios SET $Set WHERE id = :id";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindValue(":".$ultimoTermo,end($Global));
                        $stmt->bindValue(':id',$_SESSION['autor']['id']);
                        if($stmt->execute())
                        {
                           $_SESSION['autor'][$ultimoTermo] = end($Global);
                           return true;
                        }
                        else
                        {
                           return false;
                        }
                    }
                    else
                    {
                        return 'ErrorBancoNaoExecutouAutor';
                    }
                }catch(PDOException $error)
                {
                    return 
                    "
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error no Banco de Dados',
                                text: 'O erro no Banco de Dados se Deve ao ['".$error->getMessage()."'].',
                                didClose: () => {
                                    window.location.href = '../Autor.php';
                                }
                            });
                        </script>
                    ";
                }
            }
            function Notificacao($Global)
            {
                $AutorLogado = 
                "
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'A Informação Foi Alterada com Sucesso !!!',
                            text: 'O ".implode('',array_keys($Global))." foi Alterada com Sucesso !!!',
                            didClose: () => {
                                window.location.href = '../Autor.php';
                            }
                        });
                    </script>
                ";
                $AutorLogadoErrorConsult = 
                "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro na Consulta da Edição',
                            text: 'Houve um Erro inesperado na Consulta do Banco de Dados que e Respansavel pela Edição',
                            didClose: () => {
                                window.location.href = '../Autor.php';
                            }
                        });
                    </script>
                ";
                $BancoNaoExecutadoAutor =
                "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Inesperado',
                            text: ' O Banco de Dados Não foi Executado Corretamente, Por Favor tente mais Tarde !!!',
                            didClose: () => {
                                window.location.href = '../Autor.php';
                            }
                        });
                    </script>
                ";
                $conjunto = [
                    'AutorLogado' => $AutorLogado,
                    'AutorLogadoErrorConsult' => $AutorLogadoErrorConsult,
                    'ErroBancoAutor' => $BancoNaoExecutadoAutor
                ];
                return $conjunto;
            }
            $UpdateSetWhere = UpdateSetWhere($METHOD);
            $Notificacao = Notificacao($METHOD);
            if($UpdateSetWhere == true)
            {
                echo $Notificacao['AutorLogado'];
            }
            else
            if($UpdateSetWhere == false)
            {
                echo $Notificacao['AutorLogadoErrorConsult'];
            }
            else
            if($UpdateSetWhere == 'ErrorBancoNaoExecutouAutor')
            {
                echo $Notificacao['ErroBancoAutor'];
            }
            else
            {
                echo $UpdateSetWhere;
            }
        }
    }
    else
    {
        if($_SESSION['usuario']['nivel_acessos'] == 'usuario')
        {
            echo 
            "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: Formulario Incompativel',
                        text: 'O Formulario Não Foi Enviado Corretamente',
                        didClose: () => {
                            window.location.href = '../Perfil-User.php';
                        }
                    });
                </script>
            ";
        }
        else
        if($_SESSION['usuario']['nivel_acessos'] == 'autor')
        {
            echo 
            "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: Formulario Incompativel',
                        text: 'O Formulario Não Foi Enviado Corretamente',
                        didClose: () => {
                            window.location.href = '../Autor.php';
                        }
                    });
                </script>
            ";
        }
    }
?>
</body>
</html>