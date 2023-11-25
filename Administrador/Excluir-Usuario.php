<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Montserrat:wght@500;600&family=Rajdhani:wght@500&display=swap');
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body
        {
            background-color: #202020;
            color: white;
            font-size: 20px;
            font-family: 'Rajdhani',sans-serif;
        }
    </style>
</head>
<body>
<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();

    if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $newNamesUser = ['ID','Nivel_De_Acessos'];
            $valuesUser = array_values($_POST);
            $User = [];
            $count = count($_POST);
            for($i = 0; $i < $count; $i++)
            {
                $User[$newNamesUser[$i]] = $valuesUser[$i];
            }
            try
            {
                $host = 'localhost';
                $user = 'root';
                $pass = '';
                $dtbs = 'conquest_go';
                $conn = new PDO("mysql:host=$host;dbname=$dtbs", $user , $pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                if($conn)
                {
                    $sql_termosServicos = "SELECT*FROM TermosDeServico WHERE id_usuario = :id_usuario";
                    $stmt_termosServicos = $conn->prepare($sql_termosServicos);
                    $stmt_termosServicos->bindValue(':id_usuario',$User['ID']);
                    if($stmt_termosServicos->execute())
                    {
                        if($stmt_termosServicos->rowCount() > 0)
                        {
                            $sql_Delete_termosServicos = "DELETE FROM TermosDeServico WHERE id_usuario = :id_usuario";
                            $stmt_Delete_termosServicos = $conn->prepare($sql_Delete_termosServicos);
                            $stmt_Delete_termosServicos->bindValue(':id_usuario',$User['ID']);
                            if($stmt_Delete_termosServicos->execute())
                            {
                                $sql_verificacion_imagem = "SELECT*FROM ImagemPerfil WHERE id_user = :id_user";
                                $stmt_verificacion_imagem = $conn->prepare($sql_verificacion_imagem);
                                $stmt_verificacion_imagem->bindValue(':id_user',$User['ID']);
                                if($stmt_verificacion_imagem->execute())
                                {
                                    if($stmt_verificacion_imagem->rowCount() > 0)
                                    {
                                        $sql_delete_imagem = "DELETE FROM ImagemPerfil WHERE id_user = :id_user";
                                        $stmt_delete_imagem = $conn->prepare($sql_delete_imagem);
                                        $stmt_delete_imagem->bindValue(':id_user',$User['ID']);
                                        if($stmt_delete_imagem->execute())
                                        {
                                            $sql_DeleteUser = "DELETE FROM usuarios WHERE id = :id AND nivel_acessos = :nivel_acessos";
                                                $stmt_DeleteUser = $conn->prepare($sql_DeleteUser);
                                                $stmt_DeleteUser->bindValue(':id',$User['ID']);
                                                $stmt_DeleteUser->bindValue(':nivel_acessos',$User['Nivel_De_Acessos']);
                                                if($stmt_DeleteUser->execute())
                                                {
                                                    die
                                                    (
                                                        "<script>
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Usuario Deletado com Sucesso',
                                                                text: 'Usuario Deletado com Sucesso do Conquest GO',
                                                                didClose: () =>{
                                                                    window.location.href = '../Administrador.php';
                                                                }
                                                            });
                                                        </script>"
                                                    );
                                                }
                                                else
                                                {
                                                    die
                                                    (
                                                        "<script>
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Error na Execução',
                                                                text: 'Erro na Execução do Usuario sem Termos de Serviços',
                                                                didClose: () =>{
                                                                    window.location.href = '../Administrador.php';
                                                                }
                                                            });
                                                        </script>"
                                                    );
                                                }  
                                        }
                                    }
                                    else
                                    {
                                        $sql_DeleteUser = "DELETE FROM usuarios WHERE id = :id AND nivel_acessos = :nivel_acessos";
                                        $stmt_DeleteUser = $conn->prepare($sql_DeleteUser);
                                        $stmt_DeleteUser->bindValue(':id',$User['ID']);
                                        $stmt_DeleteUser->bindValue(':nivel_acessos',$User['Nivel_De_Acessos']);
                                        if($stmt_DeleteUser->execute())
                                        {
                                            die
                                            (
                                                "<script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Usuario Deletado com Sucesso',
                                                        text: 'Usuario Deletado com Sucesso do Conquest GO',
                                                        didClose: () =>{
                                                            window.location.href = '../Administrador.php';
                                                        }
                                                    });
                                                </script>"
                                            );
                                        }
                                        else
                                        {
                                            die
                                            (
                                                "<script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error na Execução',
                                                        text: 'Erro na Execução do Usuario sem Termos de Serviços',
                                                        didClose: () =>{
                                                            window.location.href = '../Administrador.php';
                                                        }
                                                    });
                                                </script>"
                                            );
                                        }
                                    }
                                }
                            }
                            else
                            {
                                die
                                (
                                    "<script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error na Execução da Consulta',
                                            text: 'Error na Execução da Consulta que e responsavel por Deletar o Termos de Servicos',
                                            didClose: () =>{
                                                window.location.href = '../Administrador.php';
                                            }
                                        });
                                    </script>"
                                );
                            }
                        }
                        else
                        {
                            $sql_verificacion_imagem = "SELECT*FROM ImagemPerfil WHERE id_user = :id_user";
                                $stmt_verificacion_imagem = $conn->prepare($sql_verificacion_imagem);
                                $stmt_verificacion_imagem->bindValue(':id_user',$User['ID']);
                                if($stmt_verificacion_imagem->execute())
                                {
                                    if($stmt_verificacion_imagem->rowCount() > 0)
                                    {
                                        $sql_delete_imagem = "DELETE FROM ImagemPerfil WHERE id_user = :id_user";
                                        $stmt_delete_imagem = $conn->prepare($sql_delete_imagem);
                                        $stmt_delete_imagem->bindValue(':id_user',$User['ID']);
                                        if($stmt_delete_imagem->execute())
                                        {
                                            $sql_DeleteUser = "DELETE FROM usuarios WHERE id = :id AND nivel_acessos = :nivel_acessos";
                                                $stmt_DeleteUser = $conn->prepare($sql_DeleteUser);
                                                $stmt_DeleteUser->bindValue(':id',$User['ID']);
                                                $stmt_DeleteUser->bindValue(':nivel_acessos',$User['Nivel_De_Acessos']);
                                                if($stmt_DeleteUser->execute())
                                                {
                                                    die
                                                    (
                                                        "<script>
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Usuario Deletado com Sucesso',
                                                                text: 'Usuario Deletado com Sucesso do Conquest GO',
                                                                didClose: () =>{
                                                                    window.location.href = '../Administrador.php';
                                                                }
                                                            });
                                                        </script>"
                                                    );
                                                }
                                                else
                                                {
                                                    die
                                                    (
                                                        "<script>
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Error na Execução',
                                                                text: 'Erro na Execução do Usuario sem Termos de Serviços',
                                                                didClose: () =>{
                                                                    window.location.href = '../Administrador.php';
                                                                }
                                                            });
                                                        </script>"
                                                    );
                                                }  
                                        }
                                    }
                                    else
                                    {
                                        $sql_DeleteUser = "DELETE FROM usuarios WHERE id = :id AND nivel_acessos = :nivel_acessos";
                                        $stmt_DeleteUser = $conn->prepare($sql_DeleteUser);
                                        $stmt_DeleteUser->bindValue(':id',$User['ID']);
                                        $stmt_DeleteUser->bindValue(':nivel_acessos',$User['Nivel_De_Acessos']);
                                        if($stmt_DeleteUser->execute())
                                        {
                                            die
                                            (
                                                "<script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Usuario Deletado com Sucesso',
                                                        text: 'Usuario Deletado com Sucesso do Conquest GO',
                                                        didClose: () =>{
                                                            window.location.href = '../Administrador.php';
                                                        }
                                                    });
                                                </script>"
                                            );
                                        }
                                        else
                                        {
                                            die
                                            (
                                                "<script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error na Execução',
                                                        text: 'Erro na Execução do Usuario sem Termos de Serviços',
                                                        didClose: () =>{
                                                            window.location.href = '../Administrador.php';
                                                        }
                                                    });
                                                </script>"
                                            );
                                        }
                                    }
                                }
                        }
                    }
                    else
                    {
                        die
                        (
                            "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error na Consulta',
                                    text: 'Erro na Execução da Consulta que e responsavel pela verificação dos Termos de Serviços',
                                    didClose: () =>{
                                        window.location.href = '../Administrador.php';
                                    }
                                });
                            </script>"
                        );
                    }
                }
                else
                {
                    die
                    (
                        "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error no Banco de Dados',
                                text: 'Error no Banco de Dados, Banco de Dados Não Encontrado',
                                didClose: () =>{
                                    window.location.href = '../Administrador.php';
                                }
                            });
                        </script>"
                    );
                }
            }
            catch(PDOException $error)
            {
                die
                (
                    "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error SQL',
                            text: 'Error SQL ['".$error->getMessage()."']',
                            didClose: () =>{
                                window.location.href = '../Administrador.php';
                            }
                        });
                    </script>"
                );
            }
        }
        else
        {
            die
            (
                "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error no Metodo',
                        text: 'Error no Metodo Divergente de POST',
                        didClose: () =>{
                            window.location.href = '../Administrador.php';
                        }
                    });
                </script>"
            );
        }
    }
    else
    {
        if(session_status() == PHP_SESSION_ACTIVE)
        {
            session_destroy();
            die
            (
                '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Voce Não Tem Acesso a Essa Area",
                        text: " Voce não tem Acesso a Essa Area por seu Nivel de Acesso !!!",
                        didClose: () => {
                            window.location.href = "../Administrador.php";
                        }
                    })
                </script>'
                );
        }
        else
        {
            session_destroy();
            die
            (
                '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Voce Não Tem Acesso a Essa Area",
                        text: " Voce não tem Acesso a Essa Area por seu Nivel de Acesso !!!",
                        didClose: () => {
                            window.location.href = "../Administrador.php";
                        }
                    })
                </script>'
                );
        }
    }
?>
</body>
</html>