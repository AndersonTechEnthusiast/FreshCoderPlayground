<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600&family=Roboto:wght@500;700&display=swap');
        body{
            font-family: 'Montserrat',sans-serif;
            background: #202020;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            try{
                $host = 'localhost';
                $user = 'root';
                $pass = '';
                $dtbs = 'conquest_go';
                $PDO = new PDO("mysql:host=$host;dbname=$dtbs", $user , $pass);
                $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                if($PDO){
                    $Verificacao_Impedicao_de_Repeticoes = "SELECT*FROM usuarios WHERE nome = :nome AND email = :email AND telefone = :telefone AND senha = :senha AND nivel_acessos = :nivel_acessos";
                    $stmt_Verificacao_Impedicao_de_Repeticoes = $PDO->prepare($Verificacao_Impedicao_de_Repeticoes);
                    $stmt_Verificacao_Impedicao_de_Repeticoes->bindValue(':nome', $_POST['nome']);
                    $stmt_Verificacao_Impedicao_de_Repeticoes->bindValue(':email',$_POST['emailCadastrar']);
                    $stmt_Verificacao_Impedicao_de_Repeticoes->bindValue(':telefone',$_POST['Telefone']);
                    $stmt_Verificacao_Impedicao_de_Repeticoes->bindValue(':senha',$_POST['passwordCadastrar']);
                    $stmt_Verificacao_Impedicao_de_Repeticoes->bindValue(':nivel_acessos','usuario');
                    if($stmt_Verificacao_Impedicao_de_Repeticoes->execute()){
                        $stmt_Verificacao_Impedicao_de_Repeticoes->fetchAll(PDO::FETCH_ASSOC);
                        if($stmt_Verificacao_Impedicao_de_Repeticoes->rowCount() > 0){
                            echo 
                            "
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Usuario Já se Encontra Cadastrado no Sistema',
                                        didClose: () => {
                                            window.location.href = '../';
                                        }
                                    });
                                </script>
                            ";
                        }
                        else{
                            $Insercao_no_Banco_de_Dados = "INSERT INTO usuarios (nome,email,telefone,senha,nivel_acessos) VALUES (:nome,:email,:telefone,:senha,:nivel_acessos)";
                            $stmt_Insercao_no_Banco_de_Dados = $PDO->prepare($Insercao_no_Banco_de_Dados);
                            $stmt_Insercao_no_Banco_de_Dados->bindValue(':nome',$_POST['nome']);
                            $stmt_Insercao_no_Banco_de_Dados->bindValue(':email',$_POST['emailCadastrar']);
                            $stmt_Insercao_no_Banco_de_Dados->bindValue(':telefone',$_POST['Telefone']);
                            $stmt_Insercao_no_Banco_de_Dados->bindValue(':senha',$_POST['passwordCadastrar']);
                            $stmt_Insercao_no_Banco_de_Dados->bindValue(':nivel_acessos','usuario');
                            if($stmt_Insercao_no_Banco_de_Dados->execute()){
                                echo
                                "
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Cadastro Efetivado !!!',
                                            text: 'Usuario Cadastrado com Sucesso no Conquest GO',
                                            didClose: () => {
                                                window.location.href = '../';
                                            }
                                        });
                                    </script>
                                ";
                            }else{
                                echo
                                "
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error ao Tentar Inserir o Usuario',
                                            text: 'O Usuario não foi Inserido no Sistema',
                                            didClose: () => {
                                                window.location.href = '../';
                                            }
                                        })
                                    </script>
                                ";
                            }
                        }
                    }else{
                        echo
                        "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error: Banco de Dados Não executado',
                                    text: 'O Banco Não foi Executado',
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
                                title: 'Error: Banco de Dados Não Encontrado',
                                text: 'O Banco de Dados Não Foi Encontrado no Sistema',
                                didClose: () => {
                                    window.location.href = '../';
                                }
                            })
                        </script>
                    ";
                }
            }catch(PDOException $error){
             echo
             "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error: Error no Banco de Dados',
                        text: 'Banco de Dados Error: [".$error->getMessage()."]',
                        didClose: () => {
                            window.location.href = '../';
                        }
                    })
                </script>
             "   ;
            }
            
        }else{
            echo
            "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error: Error o Formulario Não esta no Metodo Correto',
                        text: 'O formulario Enviado não esta condizente com a Diretriz correta Metodo POST',
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