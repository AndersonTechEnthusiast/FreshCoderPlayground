<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();

    if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
    {
        $id_postagem = $_GET['id'];
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
                $sql_previewPost = "SELECT*FROM Postagens WHERE id_postagem = :id_postagem";
                $stmt_previewPost = $conn->prepare($sql_previewPost);
                $stmt_previewPost->bindValue(':id_postagem',$id_postagem);
                if($stmt_previewPost->execute())
                {
                    if($stmt_previewPost->rowCount() > 0)
                    {
                        $row = $stmt_previewPost->fetchAll(PDO::FETCH_ASSOC);
                        foreach($row as $Dados)
                        {
                            $newNamesForDados = ['ID','Título','Imagem','Descrição','Categoria','ID_autor'];
                            $valuesforDados = array_values($Dados);
                            $count = ((count($newNamesForDados))+(count($valuesforDados)))/2;
                            $Preview = [];
                            for($i = 0; $i < $count; $i++)
                            {
                                $Preview[$newNamesForDados[$i]] = $valuesforDados[$i];
                            }
                            echo 
                            '
                                <!DOCTYPE html>
                                <html lang="en">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Document</title>
                                    <link rel="stylesheet" href="Css/PostPreview/PreviewPost.css">
                                    <style>
                                        .fundoPreview
                                        {
                                            position: fixed;
                                            top: 0;
                                            left: 0;
                                            width: 100%;
                                            height: 100%;
                                            background-image: url(Imagem_Para_Posteres/'.$Preview['Imagem'].');
                                            background-position: center;
                                            background-size: cover;
                                            background-repeat: no-repeat;
                                            background-attachment: fixed;
                                        }
                                        .fundoPreview::before
                                        {
                                            content: " ";
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            width: 100%;
                                            height: 100%;
                                            background: rgb(0,0,0,0.7);
                                        }
                                    </style>
                                </head>
                                <body>
                                    <section class="fundoPreview">
                                        <div class="PageFront">
                                            <div class="InfomacoesPreviews">
                                                <div class="title">'.$Preview['Título'].'</div>
                                                <div class="book">
                                                    <div class="Image"><img src="Imagem_Para_Posteres/'.$Preview['Imagem'].'" class="Img"></div>
                                                    <div class="descrypt">
                                                        <span class="Paragrafo">
                                                            <p>
                                                                '.$Preview['Descrição'].'
                                                            </p>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </body>
                                </html>
                            ';
                        }
                    }
                    else
                    {
                        echo "Nenhuma Linha Afetada";
                    }
                }
                else
                {
                    echo "Consulta Não executada";
                }
            }
            else
            {
                echo "Banco de Dados não encontrado";
            }
        }
        catch(PDOException $error)
        {
            echo "Error: ['".$error->getMessage()."']";
        }
    }
    else
    {
        echo "não tem acesso a essa area !!!";
    }
?>

