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
            $newNamesEditionAutor = ['ID','Novo_Nivel_de_Acessos'];
            $ValuesEditionAutor = array_values($_POST);
            $Novos_Dados = [];
            $count = count($_POST);
            for($i = 0; $i < $count; $i++)
            {
                $Novos_Dados[$newNamesEditionAutor[$i]] = $ValuesEditionAutor[$i];
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
                    $sql = "UPDATE usuarios SET nivel_acessos = :nivel_acessos WHERE id = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':nivel_acessos',$Novos_Dados['Novo_Nivel_de_Acessos']);
                    $stmt->bindValue(':id',$Novos_Dados['ID']);
                    if($stmt->execute())
                    {
                        die
                        (
                            '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Nivel de Acesso Atualizado Com Sucesso",
                                    text: "O Nivel de Acesso do Autor foi Atualizado com Sucesso !!!",
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
                                    title: "Error na Consulta",
                                    text: "A Consulta do Banco de Dados Não foi Executada !!!",
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
                                title: "Banco de Dados Não Encontrado",
                                text: "O Banco de Dados Não foi Localizado verifique os parametros !!!",
                                didClose: () => {
                                    window.location.href = "../Administrador.php";
                                }
                            })
                        </script>'
                        );
                }
            }catch(PDOException $error)
            {
                die
                (
                    '<script>
                        Swal.fire({
                            icon: "error",
                            title: "SQL Error",
                            text: "Houve um error no SQL ["'.$error->getMessage().'"] !!!",
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
                        title: "Error no Metodo",
                        text: "O Formulario não foi enviado de maneira correta !!!",
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
