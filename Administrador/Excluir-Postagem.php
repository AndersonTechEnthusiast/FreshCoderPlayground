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
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $newNamesPostFordelete = ['ID','Título','Descrição','Categoria'];
            $ValuesPostFordelete = array_values($_POST);
            $count = count($_POST);
            $Post = [];
            for($i = 0; $i < $count; $i ++)
            {
                $Post[$newNamesPostFordelete[$i]] = $ValuesPostFordelete[$i];
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
                    $sql = "DELETE FROM postagens WHERE id_postagem = :id_postagem";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':id_postagem',$Post['ID']);
                    if($stmt->execute())
                    {
                        die
                        (
                            '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Postagem Excluida Com Sucesso !!!",
                                    text:  "A Postagem foi deletada com sucesso !!!",
                                    didClose: () => {
                                        window.location.href = "../Administrador.php";
                                    }
                                })
                            </script>'
                            );
                    }
                    else
                    {
                        die
                        (
                            '<script>
                                Swal.fire({
                                    icon: "error",
                                    title: "Error no Consulta",
                                    text:  "A consulta não foi executada com sucesso devido erros de consulta",
                                    didClose: () => {
                                        window.location.href = "../Administrador.php";
                                    }
                                })
                            </script>'
                            );
                    }
                }
                else
                {
                    die
                    (
                        '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Banco de Dados não Encontrado",
                                text:  " Banco de Dados não foi encontrado",
                                didClose: () => {
                                    window.location.href = "../Administrador.php";
                                }
                            })
                        </script>'
                        );
                }
            }
            catch(PDOException $error)
            {
                die
            (
                '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error SQL",
                        text: "Error no SQL ['.$error->getMessage().']!!!",
                        didClose: () => {
                            window.location.href = "../Administrador.php";
                        }
                    })
                </script>'
                );
            }
        }
        else
        {
            die
            (
                '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Metodo Errado",
                        text: "Metodo do Formulario Divergente de POST !!!",
                        didClose: () => {
                            window.location.href = "../Administrador.php";
                        }
                    })
                </script>'
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