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
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $newNamesForEdicion = ['ID_Postagem','Nome_Da_Foto','NovoTitulo','NovaCategoria','NovaDescrição'];
            $values = array_values($_POST);
            $count_POST = ((count($newNamesForEdicion))+(count($values)))/2;
            $POST = [];
            for($i = 0; $i < $count_POST; $i++)
            {
                $POST[$newNamesForEdicion[$i]] = $values[$i];
            }
            $Imagem = $_FILES[$POST['Nome_Da_Foto']];
            $NewNamesImagem = ['Nome','Caminho_Completo','Tipo','Nome_Temporario','Error','Tamanho'];
            $ValuesImagem = array_values($Imagem);
            $count_Imagem = ((count($NewNamesImagem))+(count($ValuesImagem)))/2;
            $DadosImagem = [];
            for($i = 0; $i < $count_Imagem; $i++)
            {
                $DadosImagem[$NewNamesImagem[$i]] = $ValuesImagem[$i];
            }
            $size = 204800;
            if($DadosImagem['Tamanho'] <= $size)
            {
                $path = pathinfo($DadosImagem['Nome']);
                echo "<pre>";
                $newNamesForpath = ['Ponto','Nome_Completo','Extensão','Nome_Sem_Extensão'];
                $Valuespath = array_values($path);
                $count_path = ((count($newNamesForpath))+(count($Valuespath)))/2;
                $PATH = [];
                for($i = 0; $i < $count_path; $i++)
                {
                    $PATH[$newNamesForpath[$i]] = $Valuespath[$i];
                }
                if(strtolower($PATH['Extensão']) == 'png' || strtolower($PATH['Extensão']) == 'jpg' || strtolower($PATH['Extensão']) == 'jpeg')
                {
                    $Caminho = 'Imagem_Para_Posteres/';
                    $edited_success = move_uploaded_file($DadosImagem['Nome_Temporario'], $Caminho . $PATH['Nome_Sem_Extensão'] . $PATH['Ponto'] . $PATH['Extensão']);
                    if($edited_success)
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
                                $sql_edited_Post = "UPDATE Postagens SET titulo = :titulo, imagem = :imagem,descricao = :descricao,categoria = :categoria WHERE id_postagem = :id_postagem AND id_autor = :id_autor";
                                $stmt_edited_Post = $conn->prepare($sql_edited_Post);
                                $stmt_edited_Post->bindValue(':titulo',$POST['NovoTitulo']);
                                $stmt_edited_Post->bindValue(':imagem',$PATH['Nome_Completo']);
                                $stmt_edited_Post->bindValue(':descricao',$POST['NovaDescrição']);
                                $stmt_edited_Post->bindValue(':categoria',$POST['NovaCategoria']);
                                $stmt_edited_Post->bindValue(':id_postagem',$POST['ID_Postagem']);
                                $stmt_edited_Post->bindValue(':id_autor',$_SESSION['autor']['id']);
                                if($stmt_edited_Post->execute())
                                {
                                    echo 
                                    "
                                        <script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Postagem Editada com Sucesso !!!',
                                                text: 'A sua Postagem foi Editada com Sucesso !!!',
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
                                                title: 'Postagem não foi editada',
                                                text: 'A sua Postagem não foi editada, devido a um erro na execução da consulta de edição',
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
                                            title: 'Banco de Dados não encontrado',
                                            text: 'Banco de Dados não foi encontrado, verifique os parametros',
                                            didClose: () => {
                                                window.location.href = 'Autor.php';
                                            }
                                        });
                                    </script>
                                ";
                            }
                        }
                        catch(PDOException $error)
                        {
                            echo 
                            "
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error MySQL',
                                        text: 'Erro devido a ['".$error->getMessage()."']',
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
                                    title: 'Erro ao Salvar',
                                    text: 'Error ao Salvar a imagem no caminho',
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
                                title: 'Extensão não aceita',
                                text: 'Verifique que sua Extensão da sua foto esta em (PNG,JPG ou JPEG)',
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
                            title: 'Tamanho da Imagem errado',
                            text: 'Tamanho da Imagem não corresponde com 2MB',
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
                        title: 'Metodo Errado',
                        text: 'O Metodo Enviado esta errado',
                        didClose: () => {
                            window.location.href = 'Autor.php';
                        }
                    });
                </script>
            ";
        }
    }
?>
</body>
</html>
