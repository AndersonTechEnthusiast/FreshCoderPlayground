<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600&family=Roboto:wght@500;700&display=swap');
        body{
            font-family: 'Montserrat',sans-serif;
            background: #202020;
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            try{
                $host = 'localhost';
                $user = 'root';
                $pass = '';
                $dtbs = 'conquest_go';
                $PDO = new PDO("mysql:host=$host;dbname=$dtbs",$user,$pass);
                $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                if($PDO){
                    $Verificacion = "SELECT*FROM usuarios WHERE email = :email AND senha = :senha";
                    $stmt_Verificacion = $PDO->prepare($Verificacion);
                    $stmt_Verificacion->bindValue(':email',$_POST['emailLogin']);
                    $stmt_Verificacion->bindValue(':senha',$_POST['senhaLogin']);
                    if($stmt_Verificacion->execute()){
                        if($stmt_Verificacion->rowCount() > 0){
                            $row = $stmt_Verificacion->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $dados)
                            {
                                foreach($dados as $keys => $values)
                                {
                                    if($keys == 'nome')
                                    {
                                        $nome = $values;
                                    }
                                }
                            }
                            echo 
                            "
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Bem Vindo',
                                        text: 'Seja Bem Vindo(a)".$nome." .',
                                        didClose: () => {
                                            window.location.href = 'Sessão.php';
                                        }
                                    })
                                </script>
                            ";
                            $_SESSION['Dados'] = [
                                'Email' => $_POST['emailLogin'],
                                'Senha' => $_POST['senhaLogin']
                            ];
                        }else{
                            echo 
                            "
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'O Usuario Não foi Encontrado',
                                        text: 'Usuario Não Cadastrado',
                                        didClose: () => {
                                            window.location.href = '../';
                                        }
                                    })
                                </script>
                            ";
                        }
                    }else{
                        echo 
                        "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'O Banco de Dados Não foi Encontrado',
                                    text: 'O Banco de Dados Não Esta sendo Encontrado',
                                    didClose: () => {
                                        window.location.href = '../';
                                    }
                                })
                            </script>
                        ";
                    }
                }
            }catch(PDOException $error){
                echo 
                "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: Error: no Banco de Dados,
                            text  'Error: [".$error->getMessage()."]',
                            didClose: () => {
                                window.location.href = '../';
                            }
                        });
                    </script>
                ";
            }
        }else{
            echo 
            "
                <script>
                    Swal.fire({
                        icon: 'error'
                        title: 'Error Formulario Não Encontrado no Metodo',
                        Text: 'Error: O formulario Não se Encontra no Metodo Requisitado (POST)',
                        didClose: () => {
                            window.location.href = '../';
                        }
                    })
                </script>
            ";
        }
    ?>
</body>
</html>