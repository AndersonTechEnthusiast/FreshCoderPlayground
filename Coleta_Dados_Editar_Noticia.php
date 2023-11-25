<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();

    if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id = implode('',array_values($_POST));
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
                    $sql_DadosAntigos = "SELECT*FROM Postagens WHERE id_postagem = :id_postagem AND id_autor = :id_autor";
                    $stmt_DadosAntigos = $conn->prepare($sql_DadosAntigos);
                    $stmt_DadosAntigos->bindValue(':id_postagem',$id);
                    $stmt_DadosAntigos->bindValue(':id_autor',$_SESSION['autor']['id']);
                    if($stmt_DadosAntigos->execute())
                    {
                        if($stmt_DadosAntigos->rowCount() > 0)
                        {
                            $row = $stmt_DadosAntigos->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $dados)
                            {
                                echo 
                                '
                                    <!DOCTYPE html>
                                    <html lang="en">
                                    <head>
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <title>Document</title>
                                        <link rel="stylesheet" href="Css/Autor/Editar/ColetarEditar.css">
                                        <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.0.0/uicons-thin-straight/css/uicons-thin-straight.css">
                                        <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
                                    </head>
                                    <body>
                                        <section class="formColetadados">
                                            <div class="containerColetaDados">
                                                <form class="ColetadeDados" method="POST" action="Editar_Postagens.php" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="'.$id.'">
                                                    <div class="FormEdited">
                                                        <div class="img">
                                                            <input type="hidden" name="nomeDaPhoto" value="imagem">
                                                            <input type="file" class="form-control" id="imagem" accept="image/*" onchange="previewImage()" name="imagem"  style="display: none;">
                                                            <label for="imagem" style="cursor: pointer;"><img id="image-preview" src="Img/'.$dados['imagem'].'" class="mt-2" style="width: calc(200px + 200px); height: calc(200px + 200px);" alt="Image Preview"></label>
                                                        </div>
                                                        <div class="info">
                                                            <div class="title">
                                                                <b> Editar Noticia</b>
                                                            </div>
                                                            <div class="InputsBorder" id="BorderNome">
                                                                <i class="fi fi-ts-heading"></i>
                                                                <input type="text" name="newtitle" class="Input" value="'.$dados['titulo'].'" id="NomeVerificacion">
                                                            </div>
                                                            <div class="InputsBorder" id="BorderNome">
                                                                <i class="fi fi-sr-grid"></i>
                                                                <select class="selectnewCategory" id="selectNew" name="newcategory">
                                                                    <option class="optionsforEdicion" value="'.$dados['categoria'].'">'.$dados['categoria'].'</option>
                                                                    <option class="optionsforEdicion" value="acao">Ação</option>
                                                                    <option class="optionsforEdicion" value="aventura">Aventura</option>
                                                                    <option class="optionsforEdicion" value="rpg">RPG</option>
                                                                    <option class="optionsforEdicion" value="estrategia">Estratégia</option>
                                                                    <option class="optionsforEdicion" value="simulacao">Simulação</option>
                                                                    <option class="optionsforEdicion" value="esportes">Esportes</option>
                                                                    <option class="optionsforEdicion" value="corrida">Corrida</option>
                                                                    <option class="optionsforEdicion" value="horror">Horror</option>
                                                                </select>
                                                            </div>
                                                            <div class="InputsBorder" id="BorderNome">
                                                                <i class="fi fi-sr-text"></i>
                                                                <textarea value="descrição antiga" name="newDescricao">
                                                                    '.$dados['descricao'].'
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ButtonSubmit">
                                                        <input type="submit" class="InputSubmit" value="Atualizar Noticia" id="SubmitAtualizar">
                                                    </div>
                                                </form>
                                            </div>
                                        </section>
                                    </body>
                                    <script>
                                        function previewImage() {
                                            var input = document.getElementById("imagem");
                                            var preview = document.getElementById("image-preview");
                                            var file = input.files[0];
                                            var reader = new FileReader();
                                    
                                            reader.onloadend = function () {
                                                preview.src = reader.result;
                                            };
                                    
                                            if (file) {
                                                reader.readAsDataURL(file);
                                            } else {
                                                preview.src = "";
                                            }
                                        }
                                    </script>
                                    </html>
                                ';
                            }
                        }
                        else
                        {
                            echo "Nenhuma linha afetada";
                        }
                    }
                    else
                    {
                        echo "Consulta Não executada";
                    }
                }
                else
                {
                    echo "Banco de Dados não Encontrado !!!";
                }
            }
            catch(PDOException $error)
            {
                echo "Error SQL: ['".$error->getMessage()."']";
            }
        }
        else
        {
            echo "metodo Errado";
        }
    }
    else
    if($_SESSION['autor']['Login'] == false && $_SESSION['autor']['nivel_acessos'] != 'autor')
    {
        echo "Não tem Acesso a Essa Area";
    }
?>