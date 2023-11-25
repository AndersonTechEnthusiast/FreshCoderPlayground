<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap');
        body
        {
            background: #202020;
            font-family: 'Montserrat',sans-serif;
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
    $email_para_Verificacao = $_SESSION['Dados']['Email'];
    $senha_para_Verificacao = $_SESSION['Dados']['Senha'];
    try
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dtbs = 'conquest_go';
        $conn = new PDO("mysql:host=$host;dbname=$dtbs", $user , $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if($conn)
        {
            $sql = "SELECT*FROM usuarios WHERE email = :email AND senha = :senha";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email',$email_para_Verificacao);
            $stmt->bindValue(':senha',$senha_para_Verificacao);
            if($stmt->execute()){
                if($stmt->rowCount() > 0)
                {
                    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($row as $dados)
                    {
                        $nivel_acessos = $dados['nivel_acessos'];
                    }
                    if($nivel_acessos == 'usuario')
                    {
                        foreach($row as $dados)
                        {
                            $_SESSION['usuario'] = [
                                'Login' => true,
                                'Photo' => null
                            ];
                            $count = count($dados);
                            $keys = array_keys($dados);
                            $value = array_values($dados);
                            for($i = 0; $i < $count; $i++)
                            {
                                $_SESSION['usuario'][$keys[$i]] = $value[$i];  
                            }
                        }
                        $sql_Photo = "SELECT*FROM ImagemPerfil WHERE id_user = :id_user";
                        $stmt_Photo = $conn->prepare($sql_Photo);
                        $stmt_Photo->bindValue(':id_user',$_SESSION['usuario']['id']);
                        if($stmt_Photo->execute())
                        {
                            if($stmt_Photo->rowCount() > 0)
                            {
                                $Column = $stmt_Photo->fetchAll(PDO::FETCH_ASSOC);
                                foreach($Column as $Dados)
                                {
                                    $Photo = $Dados['FotoPerfil'];
                                    $_SESSION['usuario']['Photo'] = $Photo;
                                }
                            }
                            else
                            {
                                $_SESSION['usuario']['Photo'] = null;
                            }
                        }
                        if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
                        {
                            header('Location: ../Perfil-User.php');
                        }
                    }
                    else
                    if($nivel_acessos == 'autor')
                    {
                        foreach($row as $dados)
                        {
                            $_SESSION['autor'] = [
                                'Login' => true,
                                'Photo' => null
                            ];
                            $count = count($dados);
                            $keys = array_keys($dados);
                            $value = array_values($dados);
                            for($i = 0; $i < $count; $i++)
                            {
                                $_SESSION['autor'][$keys[$i]] = $value[$i];  
                            }
                            $sql_Photo = "SELECT*FROM ImagemPerfil WHERE id_user = :id_user";
                            $stmt_Photo = $conn->prepare($sql_Photo);
                            $stmt_Photo->bindValue(':id_user',$_SESSION['autor']['id']);
                            if($stmt_Photo->execute())
                            {
                                if($stmt_Photo->rowCount() > 0)
                                {
                                    $Column = $stmt_Photo->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($Column as $Dados)
                                    {
                                        $Photo = $Dados['FotoPerfil'];
                                        $_SESSION['autor']['Photo'] = $Photo;
                                    }
                                }
                                else
                                {
                                    $_SESSION['autor']['Photo'] = null;
                                }
                            }
                        }
                        if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
                        {
                            header('Location: ../Autor.php');
                        }
                    }
                    else
                    if($nivel_acessos == 'Administrador')
                    {
                        foreach($row as $dados)
                        {
                            $_SESSION['Administrador'] = [
                                'Login' => true,
                                'Photo' => null
                            ];
                            $count = count($dados);
                            $keys = array_keys($dados);
                            $value = array_values($dados);
                            for($i = 0; $i < $count; $i++)
                            {
                                $_SESSION['Administrador'][$keys[$i]] = $value[$i];  
                            }
                            $sql_Photo = "SELECT*FROM ImagemPerfil WHERE id_user = :id_user";
                            $stmt_Photo = $conn->prepare($sql_Photo);
                            $stmt_Photo->bindValue(':id_user',$_SESSION['Administrador']['id']);
                            if($stmt_Photo->execute())
                            {
                                if($stmt_Photo->rowCount() > 0)
                                {
                                    $Column = $stmt_Photo->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($Column as $Dados)
                                    {
                                        $Photo = $Dados['FotoPerfil'];
                                        $_SESSION['Administrador']['Photo'] = $Photo;
                                    }
                                }
                                else
                                {
                                    $_SESSION['Administrador']['Photo'] = null;
                                }
                            }
                        }
                        if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
                        {
                            header('Location: ../Administrador.php');
                        }
                    }
                    else
                    {
                        if(session_status() == PHP_SESSION_ACTIVE)
                        {
                            session_destroy();
                            echo 
                            "
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro na Coletagem de Dados',
                                        text: 'Os Dados Não Foram Coletados Corretamente',
                                        didClose: () => {
                                            window.location.href = '../';
                                        }
                                    });
                                </script>
                            ";
                        }
                        else
                        {
                            echo 
                            "
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro na Coletagem de Dados',
                                        text: 'Os Dados Não Foram Coletados Corretamente',
                                        didClose: () => {
                                            window.location.href = '../';
                                        }
                                    });
                                </script>
                            ";
                        }
                    }
                }
            }
            else
            {
                if(session_status() == PHP_SESSION_ACTIVE)
                {
                    session_destroy();
                    echo 
                    "
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'O Banco Não foi Executado',
                                text: 'O Banco de Dados do Sistema Conquest Go não esta Executado Corretamente',
                                didClose: () => {
                                    window.location.href = '../';
                                }
                            });
                        </script>
                    ";
                }
                else
                {
                    echo 
                    "
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'O Banco Não foi Executado',
                                text: 'O Banco de Dados do Sistema Conquest Go não esta Executado Corretamente',
                                didClose: () => {
                                    window.location.href = '../';
                                }
                            });
                        </script>
                    ";
                }
            }
        }
        else
        {
            if(session_status() == PHP_SESSION_ACTIVE)
            {
                session_destroy();
                echo 
                "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Banco Não Encontrado',
                            text: 'O sistema do Banco de Dados não foi Encontrado',
                            didClose: () => {
                                window.location.href = '../';
                            }
                        });
                    </script>
                ";
            }
            else
            {
                echo 
                "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Banco Não Encontrado',
                            text: 'O sistema do Banco de Dados não foi Encontrado',
                            didClose: () => {
                                window.location.href = '../';
                            }
                        });
                    </script>
                ";
            }
        }
    }catch(PDOException $error)
    {
        if(session_status() == PHP_SESSION_ACTIVE)
        {
            session_destroy();
            echo 
            "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Especifico',
                        text: 'O Erro especifico em ".$error->getMessage()." ',
                        didClose: () => {
                            window.location.href = '../';
                    });
                </script>
            ";
        }
        else
        {
            echo 
            "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Especifico',
                        text: 'O Erro especifico em ".$error->getMessage()." ',
                        didClose: () => {
                            window.location.href = '../';
                    });
                </script>
            ";
        }
    }
?>
</body>
