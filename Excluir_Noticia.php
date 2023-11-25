<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap');
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

    if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
    {
        if($_SERVER['REQUEST_METHOD'])
        {
            $id = implode('',array_values($_POST));
            if($id)
            {
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
                        $sql_DeletarPost = "DELETE FROM Postagens WHERE id_postagem = :id_postagem AND id_autor = :id_autor";
                        $stmt_DeletarPost = $conn->prepare($sql_DeletarPost);
                        $stmt_DeletarPost->bindValue(':id_postagem',$id);
                        $stmt_DeletarPost->bindValue(':id_autor',$_SESSION['autor']['id']);
                        if($stmt_DeletarPost->execute())
                        {
                            if($stmt_DeletarPost->rowCount() > 0)
                            {
                                echo 
                                "
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Postagem Deletada com sucesso !!!',
                                            text: 'A Postagem foi Deletada com sucesso da sua Galeria de Postagens',
                                            didClose: () => {
                                                window.location.href = 'Autor.php';
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
                                            title: 'Postagem Não foi Deletada !!!',
                                            text: 'A Postagem naõ foi Deletada da sua Galeria de Postagens',
                                            didClose: () => {
                                                window.location.href = 'Autor.php';
                                            }
                                        });
                                    </script>
                                ";
                            }
                        }
                        else
                        {
                            echo 
                            "
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error na Consulta',
                                        text: 'Error na Execução da Consulta do Banco de Dados',
                                        didClose: () => {
                                            window.location.href = 'Autor.php';
                                        }
                                    });
                                </script>
                            ";
                        }
                    }
                    else
                    {
                        echo 
                        "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Banco de Dados Não Encontrado !!!',
                                    text: 'O Banco de Dados não foi Encontrado por favor revise os Parametros do Banco de Dados',
                                    didClose: () => {
                                        window.location.href = 'Autor.php';
                                    }
                                });
                            </script>
                        ";
                    }
                }catch(PDOException $error)
                {
                    echo 
                    "
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error MySQL',
                                text: 'Erro ['".$error->getMessage()."']',
                                didClose: () => {
                                    window.location.href = 'Autor.php';
                                }
                            });
                        </script>
                    ";
                }
            }
            else
            {
                echo 
                "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Nenhum Id Localizado',
                            text: 'A Postagem esta sem id por favor tente novamente',
                            didClose: () => {
                                window.location.href = 'Autor.php';
                            }
                        });
                    </script>
                ";
            }
        }
        else
        {
            echo 
            "
                <script>
                    Swal.fire({
                        icon: 'Metodo Errado',
                        title: 'Formulario esta no metodo Errado !!!',
                        text: 'O formulario não esta no metodo correto',
                        didClose: () => {
                            window.location.href = 'Autor.php';
                        }
                    });
                </script>
            ";
        }
    }
    else
    {

    }
?>
</body>
</html>