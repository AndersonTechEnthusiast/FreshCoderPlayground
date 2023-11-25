<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Montserrat:wght@500;600&family=Rajdhani:wght@500&display=swap');
        body
        {
            background-color: #202020;
            color: white;
            font-family: 'Rajdhani',sans-serif;
            font-size: 20px;
        }
    </style>
</head>
<body>
<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();

    if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $NewNamesForDados = ['null','Titulo','Categoria','Descrição'];
            $ValuesForDados = array_values($_POST);
            $DadosForForm = [];
            $count_for_Form = ((count($NewNamesForDados))+(count($ValuesForDados)))/2;
            for($i = 0; $i < $count_for_Form; $i++)
            {
                $DadosForForm[$NewNamesForDados[$i]] = $ValuesForDados[$i];
            }
            $NewNames = ['NomeDaFoto','Titulo','Categoria','Descrição'];
            $values = array_values($_POST);
            $count = ((count($NewNames))+(count($values)))/2;
            $Postagem = [];
            for($i = 0; $i < $count; $i++)
            {
                $Postagem[$NewNames[$i]] = $values[$i];
            }
            $Imagem = [];
            $NewNamesImagem = ['Nome','Caminho_Completo','Tipo','Nome_Temporario','Error','Size'];
            $Dados = array_values($_FILES[$Postagem['NomeDaFoto']]);
            $count_Imagem = ((count($NewNamesImagem))+(count($Dados)))/2;
            for($i = 0; $i < $count_Imagem; $i++)
            {
                $Imagem[$NewNamesImagem[$i]] = $Dados[$i];
            }
            $size = 204800;
            if($Imagem['Size'] <= $size)
            {
                $Caminho = "Imagem_Para_Posteres/";
                $PathInfoName = ['Ponto','Nome_Completo','Extensão','Nome_sem_Extensão'];
                $PathInfoValue = array_values(pathinfo($Imagem['Nome']));
                $count_Path = ((count($PathInfoName))+(count($PathInfoValue)))/2;
                $PathInfo = [];
                for($i = 0; $i < $count_Path; $i++)
                {
                    $PathInfo[$PathInfoName[$i]] = $PathInfoValue[$i];
                }
                if(strtolower($PathInfo['Extensão']) == 'jpg' || strtolower($PathInfo['Extensão']) == 'png' || strtolower($PathInfo['Extensão']) == 'jpeg')
                {
                    $ImageSaved = move_uploaded_file($Imagem['Nome_Temporario'], $Caminho . $PathInfo['Nome_sem_Extensão'] . $PathInfo['Ponto'] . $PathInfo['Extensão']);
                    if($ImageSaved)
                    {
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
                                $sql_Verificacion = "SELECT*FROM Postagens WHERE id_autor = :id_autor";
                                $stmt_Verificacion = $conn->prepare($sql_Verificacion);
                                $stmt_Verificacion->bindValue(':id_autor',$_SESSION['autor']['id']);
                                if($stmt_Verificacion->execute())
                                {
                                    if($stmt_Verificacion->rowCount() > 0)
                                    {
                                        $sql_VerificarSeAPostagemEaMesma = "SELECT*FROM Postagens WHERE titulo = :titulo AND imagem = :imagem AND descricao = :descricao AND categoria = :categoria";
                                        $stmt_VerificarSeAPostagemEaMesma = $conn->prepare($sql_VerificarSeAPostagemEaMesma);
                                        $stmt_VerificarSeAPostagemEaMesma->bindValue(':titulo',$DadosForForm['Titulo']);
                                        $stmt_VerificarSeAPostagemEaMesma->bindValue(':imagem',$Imagem['Nome']);
                                        $stmt_VerificarSeAPostagemEaMesma->bindValue(':descricao',$DadosForForm['Descrição']);
                                        $stmt_VerificarSeAPostagemEaMesma->bindValue(':categoria',$DadosForForm['Categoria']);
                                        if($stmt_VerificarSeAPostagemEaMesma->execute())
                                        {
                                            if($stmt_VerificarSeAPostagemEaMesma->rowCount() > 0)
                                            {
                                                echo 
                                                "
                                                    <script>
                                                        Swal.fire({
                                                            icon: 'warning',
                                                            title: 'Noticia Repetida !!!',
                                                            text: 'A Noticia Cuja esta tentando Postar já foi Postada',
                                                            didClose: () => {
                                                                window.location.href = 'Autor.php';
                                                            }
                                                        });
                                                    </script>
                                                ";
                                            }
                                            else
                                            {
                                                $sql_InserirPostDoAutorjaCadastrado = "INSERT INTO Postagens (titulo,imagem,descricao,categoria,id_autor) VALUES (:titulo,:imagem,:descricao,:categoria,:id_autor)";
                                                $stmt_InserirPostDoAutorjaCadastrado = $conn->prepare($sql_InserirPostDoAutorjaCadastrado);
                                                $stmt_InserirPostDoAutorjaCadastrado->bindValue(':titulo',$DadosForForm['Titulo']);
                                                $stmt_InserirPostDoAutorjaCadastrado->bindValue(':imagem',$Imagem['Nome']);
                                                $stmt_InserirPostDoAutorjaCadastrado->bindValue(':descricao',$DadosForForm['Descrição']);
                                                $stmt_InserirPostDoAutorjaCadastrado->bindValue(':categoria',$DadosForForm['Categoria']);
                                                $stmt_InserirPostDoAutorjaCadastrado->bindValue(':id_autor',$_SESSION['autor']['id']);
                                                if($stmt_InserirPostDoAutorjaCadastrado->execute())
                                                {
                                                    echo 
                                                    "
                                                        <script>
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'A Noticia foi Pastada',
                                                                text: 'Sua Publicação foi Postada com Sucesso !!!',
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
                                                                title: 'Erro na Postagem',
                                                                text: 'Erro na Hora de Postar sua Noticia Por favor Volte mais Tarde',
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
                                        {
                                            echo 
                                            "
                                                <script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Erro na Consulta',
                                                        text: 'Erro na Execução da Consulta do Autor ja Cadastrado',
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
                                        $sql_InserirNoticiaDoAutorRecentementeCadastrado = "INSERT INTO Postagens (titulo,imagem,descricao,categoria,id_autor) VALUES (:titulo,:imagem,:descricao,:categoria,:id_autor)";
                                        $stmt_InserirNoticiaDoAutorRecentementeCadastrado = $conn->prepare($sql_InserirNoticiaDoAutorRecentementeCadastrado);
                                        $stmt_InserirNoticiaDoAutorRecentementeCadastrado->bindValue(':titulo',$DadosForForm['Titulo']);
                                        $stmt_InserirNoticiaDoAutorRecentementeCadastrado->bindValue(':imagem',$Imagem['Nome']);
                                        $stmt_InserirNoticiaDoAutorRecentementeCadastrado->bindValue(':descricao',$DadosForForm['Descrição']);
                                        $stmt_InserirNoticiaDoAutorRecentementeCadastrado->bindValue(':categoria',$DadosForForm['Categoria']);
                                        $stmt_InserirNoticiaDoAutorRecentementeCadastrado->bindValue(':id_autor',$_SESSION['autor']['id']);
                                        if($stmt_InserirNoticiaDoAutorRecentementeCadastrado->execute())
                                        {
                                            echo 
                                            "
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Primeira Noticia',
                                                        text: 'A sua primeira Noticia foi postada com Sucesso',
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
                                                        title: 'Erro na sua Primeira Noticia',
                                                        text: 'A sua primeira Noticia Não foi Inserida',
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
                                {
                                    echo 
                                    "
                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error no Banco de Dados',
                                                text: 'Houve um Erro na Execução da Consulta do Banco de Dados na Verificação do ID do Autor',
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
                                            title: 'Erro no Banco de Dados',
                                            text: 'Houve um problema no Banco',
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
                                        title: 'Error no SQL',
                                        text: 'Erro no SQL por favor revise: ['".$error->getMessage()."']',
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
                                    title: 'Erro no Salvamento da Imagem',
                                    text: 'A Imagem Não foi Salva no Sistema',
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
                                title: 'Extensão Recusada',
                                text: 'A Extensão da Imagem esta incorreta, revise, o Conquet GO tem como imagens (PNG,JPG e JPEG)',
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
        {
            echo 
            "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro no Metodo do Formulario',
                        text: 'O formulario não esta no metodo requisitado',
                        didClose: () => {
                            window.location.href = 'Autor.php';
                        }
                    });
                </script>
            ";
        }
    }
    else
    if($_SESSION['autor']['Login'] != true && $_SESSION['autor']['nivel_acessos'] != 'autor')
    {
        if(session_status() == PHP_SESSION_ACTIVE)
        {
            session_destroy();
            echo 
            "
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Acesso Negado',
                        text: 'Voce não tem acesso a Essa Area',
                        didClose: () => {
                            window.location.href = 'Autor.php';
                        }
                    });
                </script>
            ";
        }
        else
        {
            session_destroy();
            echo 
            "
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Acesso Negado',
                        text: 'Voce não tem acesso a Essa Area',
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
