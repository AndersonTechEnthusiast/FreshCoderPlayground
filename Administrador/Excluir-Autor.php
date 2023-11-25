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
            $newDadosForDelete = ['ID','Nivel_De_Acessos'];
            $valuesforDelete = array_values($_POST);
            $count = count($_POST);
            $Autor = [];
            for($i = 0; $i < $count; $i++)
            {
                $Autor[$newDadosForDelete[$i]] = $valuesforDelete[$i];
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
                    $sql_verificacao_postagens = "SELECT*FROM postagens WHERE id_postagem = :id_postagem";
                    $stmt_verificacao_postagens = $conn->prepare($sql_verificacao_postagens);
                    $stmt_verificacao_postagens->bindValue(':id_postagem',$Autor['ID']);
                    if($stmt_verificacao_postagens->execute())
                    {
                        if($stmt_verificacao_postagens->rowCount() > 0)
                        {
                            $sql_deletar_postagem = "DELETE FROM postagens WHERE id_postagem = :id_postagem";
                            $stmt_deletar_postagem = $conn->prepare($sql_deletar_postagem);
                            $stmt_deletar_postagem->bindValue(':id_postagem',$Autor['ID']);
                            if($stmt_deletar_postagem->execute())
                            {
                                $sql_verificacao_termos = "SELECT*FROM TermosDeServico WHERE id_usuario = :id_usuario";
                                $stmt_verificacao_termos = $conn->prepare($sql_verificacao_termos);
                                $stmt_verificacao_termos->bindValue(':id_usuario',$Autor['ID']);
                                if($stmt_verificacao_termos->execute())
                                {
                                    if($stmt_verificacao_termos->rowCount() > 0)
                                    {
                                        $sql_deletar_termos = "DELETE FROM TermosDeServico WHERE id_usuario = :id_usuario";
                                        $stmt_deletar_termos = $conn->prepare($sql_deletar_termos);
                                        $stmt_deletar_termos->bindValue(':id_usuario',$Autor['ID']);
                                        if($stmt_deletar_termos->execute())
                                        {
                                            $sql_verificacao_imagem = "SELECT*FROM ImagemPerfil WHERE id_user = :id_user";
                                            $stmt_verificacao_imagem = $conn->prepare($sql_verificacao_imagem);
                                            $stmt_verificacao_imagem->bindValue(':id_user',$Autor['ID']);
                                            if($stmt_verificacao_imagem->execute())
                                            {
                                                if($stmt_verificacao_imagem->rowCount() > 0)
                                                {
                                                    $sql_deletar_imagem = "DELETE FROM ImagemPerfil WHERE id_user = :id_user";
                                                    $stmt_deletar_imagem = $conn->prepare($sql_deletar_imagem);
                                                    $stmt_deletar_imagem->bindValue(':id_user',$Autor['ID']);
                                                    if($stmt_deletar_imagem->execute())
                                                    {
                                                        $sql_DeletarAutor = "DELETE FROM usuarios WHERE id = :id AND nivel_acessos = :nivel_acessos";
                                                        $stmt_DeletarAutor = $conn->prepare($sql_DeletarAutor);
                                                        $stmt_DeletarAutor->bindValue(':id',$Autor['ID']);
                                                        $stmt_DeletarAutor->bindValue(':nivel_acessos',$Autor['Nivel_De_Acessos']);
                                                        if($stmt_DeletarAutor->execute())
                                                        {
                                                            die
                                                            ("
                                                                <script>
                                                                    Swal.fire({
                                                                        icon: 'success',
                                                                        title: 'Autor Deletado',
                                                                        text: 'Autor Deletado com Sucesso',
                                                                        didClose: () => {
                                                                            window.location.href = '../Administrador.php';
                                                                        }
                                                                    });
                                                                </script>
                                                            ");
                                                        }
                                                        else
                                                        {
                                                            die
                                                            ("
                                                                <script>
                                                                    Swal.fire({
                                                                        icon: 'error',
                                                                        title: 'Autor Não Deletado',
                                                                        text: 'Alguem Error na Execução da Consulta Para Deletar o Autor',
                                                                        didClose: () => {
                                                                            window.location.href = '../Administrador.php';
                                                                        }
                                                                    });
                                                                </script>
                                                            ");
                                                        }
                                                    }
                                                    else
                                                    {
                                                        die(
                                                            "<script>
                                                                Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Error na Execução da Consulta',
                                                                    text: 'Error na Execução da Consulta de deletar a Imagem do Autor',
                                                                    didClose: () =>
                                                                    {
                                                                        window.location.href = '../Administrador.php';
                                                                    }
                                                                });
                                                            </script>"
                                                        );
                                                    }
                                                }
                                                else
                                                {
                                                    $sql_DeletarAutor = "DELETE FROM usuarios WHERE id = :id AND nivel_acessos = :nivel_acessos";
                                                            $stmt_DeletarAutor = $conn->prepare($sql_DeletarAutor);
                                                            $stmt_DeletarAutor->bindValue(':id',$Autor['ID']);
                                                            $stmt_DeletarAutor->bindValue(':nivel_acessos',$Autor['Nivel_De_Acessos']);
                                                            if($stmt_DeletarAutor->execute())
                                                            {
                                                                die
                                                                ("
                                                                    <script>
                                                                        Swal.fire({
                                                                            icon: 'success',
                                                                            title: 'Autor Deletado',
                                                                            text: 'Autor Deletado com Sucesso',
                                                                            didClose: () => {
                                                                                window.location.href = '../Administrador.php';
                                                                            }
                                                                        });
                                                                    </script>
                                                                ");
                                                            }
                                                            else
                                                            {
                                                                die
                                                                ("
                                                                    <script>
                                                                        Swal.fire({
                                                                            icon: 'error',
                                                                            title: 'Autor Não Deletado',
                                                                            text: 'Alguem Error na Execução da Consulta Para Deletar o Autor',
                                                                            didClose: () => {
                                                                                window.location.href = '../Administrador.php';
                                                                            }
                                                                        });
                                                                    </script>
                                                                ");
                                                            }
                                                }
                                            }
                                            
                                        }
                                        else
                                        {
                                            die
                                            ("
                                                <script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error Termos de Serviços',
                                                        text: 'Error ao Deletar o Termo de Serviço do Autor',
                                                        didClose: () => {
                                                            window.location.href = '../Administrador.php';
                                                        }
                                                    });
                                                </script>
                                            ");
                                        }
                                    }
                                    else
                                    {
                                        $sql_DeletarAutor = "DELETE FROM usuarios WHERE id = :id AND nivel_acessos = :nivel_acessos";
                                        $stmt_DeletarAutor = $conn->prepare($sql_DeletarAutor);
                                        $stmt_DeletarAutor->bindValue(':id',$Autor['ID']);
                                        $stmt_DeletarAutor->bindValue(':nivel_acessos',$Autor['Nivel_De_Acessos']);
                                        if($stmt_DeletarAutor->execute())
                                        {
                                            die
                                            ("
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Autor Deletado',
                                                        text: 'Autor Deletado com Sucesso',
                                                        didClose: () => {
                                                            window.location.href = '../Administrador.php';
                                                        }
                                                    });
                                                </script>
                                            ");
                                        }
                                    }
                                }
                                else
                                {
                                    die
                                    ("
                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error no Termos de Serviços',
                                                text: 'Error ao Deletar o Termos de Serviços de Autor',
                                                didClose: () => {
                                                    window.location.href = '../Administrador.php';
                                                }
                                            });
                                        </script>
                                    ");
                                }
                            }
                        }
                        else
                        {
                            $sql_DeletarAutor = "DELETE FROM usuarios WHERE id = :id AND nivel_acessos = :nivel_acessos";
                            $stmt_DeletarAutor = $conn->prepare($sql_DeletarAutor);
                            $stmt_DeletarAutor->bindValue(':id',$Autor['ID']);
                            $stmt_DeletarAutor->bindValue(':nivel_acessos',$Autor['Nivel_De_Acessos']);
                            if($stmt_DeletarAutor->execute())
                            {
                                die
                                ("
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Autor Deletado',
                                            text: 'Autor Deletado com Sucesso',
                                            didClose: () => {
                                                window.location.href = '../Administrador.php';
                                            }
                                        });
                                    </script>
                                ");
                            }
                            else
                            {
                                die
                                ("
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error ao Deletar Autor',
                                            text: 'Erro ao Executar a Consulta de Deletar o Autor',
                                            didClose: () => {
                                                window.location.href = '../Administrador.php';
                                            }
                                        });
                                    </script>
                                ");
                            }
                        }
                    }
                    else
                    {
                        die
                        ("
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error na Consulta de Postagem',
                                    text: 'Error ao Consultar a Postagem',
                                    didClose: () => {
                                        window.location.href = '../Administrador.php';
                                    }
                                });
                            </script>
                        ");
                    }
                }
                else
                {
                    die
                    ("
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error no Banco de Dados',
                                text: 'Banco de Dados não Encontrado',
                                didClose: () => {
                                    window.location.href = '../Administrador.php';
                                }
                            });
                        </script>
                    ");
                }
            }catch(PDOException $error)
            {
                die
                ("
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'SQL Error',
                            text: 'Error SQL: ['".$error->getMessage()."']',
                            didClose: () => {
                                window.location.href = '../Administrador.php';
                            }
                        });
                    </script>
                ");
            }
        }
        else
        {
            die
            ("
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error no Metodo',
                        text: 'Error metodo Divergente do POST',
                        didClose: () => {
                            window.location.href = '../Administrador.php';
                        }
                    });
                </script>
            ");
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