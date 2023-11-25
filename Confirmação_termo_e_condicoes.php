<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termos e Serviços</title>
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
            color: white;
        }
    </style>
</head>
<body>
<?php
    if(@$_SESSION['usuario']['Login'] == true && @$_SESSION['usuario']['nivel_acessos'] == 'usuario')
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $METHOD = $_POST;
            $_SESSION['autor'] = [
                'Login' => true
            ];
            function Termos_Servicos($GLOBAL)
            {
                if(implode('',array_values($GLOBAL)) == 'Aceitou')
                {
                    try
                    {
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $dtbs = "conquest_go";
                        $conn = new PDO("mysql:host=$host;dbname=$dtbs",$user,$pass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        if($conn)
                        {
                            $sql_Verificacion = "SELECT*FROM TermosDeServico WHERE id_usuario = :id_usuario";
                            $stmt_Verificacion = $conn->prepare($sql_Verificacion);
                            $stmt_Verificacion->bindValue(':id_usuario',$_SESSION['usuario']['id']);
                            if($stmt_Verificacion->execute())
                            {
                                $stmt_Verificacion->fetchAll(PDO::FETCH_ASSOC);
                                if($stmt_Verificacion->rowCount() > 0)
                                {
                                $sql_Verificacion_Usuario = "SELECT*FROM usuarios WHERE id = :id AND nivel_acessos = :nivel_acessos";
                                $stmt_Verificacion_Usuario = $conn->prepare($sql_Verificacion_Usuario);
                                $stmt_Verificacion_Usuario->bindValue(':id',$_SESSION['usuario']['id']);
                                $stmt_Verificacion_Usuario->bindValue(':nivel_acessos','autor');
                                if($stmt_Verificacion_Usuario->execute())
                                {
                                    $row = $stmt_Verificacion_Usuario->fetchAll(PDO::FETCH_ASSOC);
                                    if($stmt_Verificacion_Usuario->rowCount() > 0)
                                    {
                                        $param = ['status' => 1,'Dados' => $row];
                                        return $param;
                                    }
                                }
                                }
                                else
                                {
                                    $sql_InsertInto = "INSERT INTO TermosDeServico (aceitacao_de_Termos,id_usuario) VALUES (:aceitacao_de_Termos,:id_usuario)";
                                    $stmt_InsertInto = $conn->prepare($sql_InsertInto);
                                    $stmt_InsertInto->bindValue(':aceitacao_de_Termos',true);
                                    $stmt_InsertInto->bindValue(':id_usuario',$_SESSION['usuario']['id']);
                                    if($stmt_InsertInto->execute())
                                    {
                                        $Autor = 'autor';
                                        $sql_AtualizarNivel_Acessos = "UPDATE usuarios SET nivel_acessos = :nivel_acessos WHERE id = :id";
                                        $stmt_AtualizarNivel_Acessos = $conn->prepare($sql_AtualizarNivel_Acessos);
                                        $stmt_AtualizarNivel_Acessos->bindValue(':nivel_acessos',$Autor);
                                        $stmt_AtualizarNivel_Acessos->bindValue(':id',$_SESSION['usuario']['id']);
                                        if($stmt_AtualizarNivel_Acessos->execute())
                                        {
                                            $sql_SELECT_FROM = "SELECT*FROM usuarios WHERE id = :id";
                                            $stmt_SELECT_FROM = $conn->prepare($sql_SELECT_FROM);
                                            $stmt_SELECT_FROM->bindValue(':id',$_SESSION['usuario']['id']);
                                            if($stmt_SELECT_FROM->execute())
                                            {
                                                if($stmt_SELECT_FROM->rowCount() > 0)
                                                {
                                                    $row = $stmt_SELECT_FROM->fetchAll(PDO::FETCH_ASSOC);
                                                    $Param = ['status' => 2, 'Dados'=> $row];
                                                    return $Param;
                                                }
                                            }
                                        }
                                        else
                                        {
                                            /** o usuario não se tornou autor */
                                            return false;
                                        }
                                    }
                                }
                            }
                        }
                    }catch(PDOException $error)
                    {
                        // return 
                        // "
                        //     <script>
                        //         Swal.fire({
                        //             icon: 'error',
                        //             title: 'Error no Banco de Dados',
                        //             text: ' Error ['".$error->getMessage()."']',
                        //             didClose: () => {
                        //                 window.location.href = 'Perfil_User.php';
                        //             }
                        //         });
                        //     </script>
                        // ";
                        echo $error->getMessage();
                    }
                }
                else
                if(implode('',array_keys($GLOBAL)) == 'Recusou')
                {
                    return 'O_Usuario_Recusou_os_Termos';
                }
            }
            $Termos_Servicos = Termos_Servicos($METHOD);
            if($Termos_Servicos['status'] == 1)
            {
                $Dados = $Termos_Servicos['Dados'];
                foreach($Dados as $Lines)
                {
                    $count = count($Lines);
                    $keys = array_keys($Lines);
                    $values = array_values($Lines);
                    for($i = 0; $i < $count; $i++)
                    {
                        $_SESSION['autor'][$keys[$i]] = $values[$i];
                    }
                }
                if($_SESSION['autor']['Login'] == true)
                {
                    $_SESSION['usuario']['Login'] = false;
                    if($_SESSION['usuario']['Login'] == false)
                    {
                        echo
                        "
                            <script>
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Você Já é um Autor',
                                    text: 'Você ja é um autor no nosso Banco de Dados',
                                    didClose: () => {
                                        window.location.href = 'Autor.php';
                                    }
                                });
                            </script>
                        ";
                    }
                }
            }
            else
            if($Termos_Servicos['status'] == 2)
            {
                $Dados = $Termos_Servicos['Dados'];
                foreach($Dados as $Lines)
                {
                    $count = count($Lines);
                    $keys = array_keys($Lines);
                    $values = array_values($Lines);
                    for($i = 0; $i < $count; $i++)
                    {
                        $_SESSION['autor'][$keys[$i]] = $values[$i];
                    }
                }
                if($_SESSION['autor']['Login'] == true)
                {
                    $_SESSION['usuario']['Login'] = false;
                    if($_SESSION['usuario']['Login'] == false)
                    {
                        echo
                        "
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Você Agora é Autor !!!',
                                    text: 'Você Agora e um Autor no Conquest Go, Seja Bem - Vindo ao nosso Time !!!',
                                    didClose: () => {
                                        window.location.href = 'Autor.php';
                                    }
                                });
                            </script>
                        ";
                    }
                }
            }
            else
            if($Termos_Servicos == false)
            {
                echo "Retornou False";
            }
            else
            {
                echo
                "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Inesperado',
                            text: 'Desculpe mas houve um Erro inesperado !!!',
                            didClose: () => {
                                window.location.href = 'termo_e_condições.php';
                            }
                        });
                    </script>
                ";
            }
        }
        else
        {
            return 'MetodoErrado';
        }
    }
    else
    if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
    {
        echo 
        "
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Você já e um Autor',
                    text: 'Você não tem acesso a essa Area mais..',
                    didClose: () => {
                        window.location.href = 'Autor.php';
                    }
                });
            </script>
        ";
    }
?>
</body>
</html>
<?php
?>