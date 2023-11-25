<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();

    if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST) && !empty($_POST))
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
                        $sql_TermosServicos = "DROP TABLE TermosDeServico";
                        $stmt_TermosServicos = $conn->prepare($sql_TermosServicos);
                        if($stmt_TermosServicos->execute())
                        {
                            $sql_Postagens = "DROP TABLE  Postagens";
                            $stmt_Postagens = $conn->prepare($sql_Postagens);
                            if($stmt_Postagens->execute())
                            {
                                $sql_Imagem = "DROP TABLE ImagemPerfil";
                                $stmt_Imagem = $conn->prepare($sql_Imagem);
                                if($stmt_Imagem->execute())
                                {
                                    $sql_usuarios = "DROP TABLE usuarios";
                                    $stmt_usuarios = $conn->prepare($sql_usuarios);
                                    if($stmt_usuarios->execute())
                                    {
                                        $sql_create_usuarios = "CREATE TABLE IF NOT EXISTS usuarios
                                        (
                                            id int auto_increment primary key,
                                            nome varchar(200) not null,
                                            email varchar(200) not null,
                                            telefone varchar(200) not null,
                                            senha varchar(200) not null,
                                            nivel_acessos enum('usuario','autor','Administrador')
                                        );";
                                        $stmt_create_usuarios = $conn->prepare($sql_create_usuarios);
                                        if($stmt_create_usuarios->execute())
                                        {
                                            $sql_create_ImagemPerfil = "CREATE TABLE IF NOT EXISTS ImagemPerfil
                                            (
                                                id_PhotoPerfil int auto_increment primary key,
                                                FotoPerfil longblob not null,
                                                id_user int,
                                                foreign key (id_user) references usuarios(id)
                                            );";
                                            $stmt_create_ImagePerfil = $conn->prepare($sql_create_ImagemPerfil);
                                            if($stmt_create_ImagePerfil->execute())
                                            {
                                                $sql_create_Postagens = "CREATE TABLE IF NOT EXISTS 
                                                Postagens(
                                                    id_postagem int auto_increment primary key,
                                                    titulo varchar(200) not null,
                                                    imagem longblob not null,
                                                    descricao varchar(200) not null,
                                                    categoria varchar(200) not null,
                                                    id_autor int,
                                                    foreign key (id_autor) references usuarios(id)
                                                );";
                                                $stmt_create_Postagens = $conn->prepare($sql_create_Postagens);
                                                if($stmt_create_Postagens->execute())
                                                {
                                                    $sql_create_TermosServicos = "CREATE TABLE IF NOT EXISTS TermosDeServico
                                                    (
                                                    id_TermosDeServico int auto_increment primary key,
                                                    aceitacao_de_Termos boolean,
                                                    id_usuario int,
                                                    foreign key (id_usuario) references usuarios(id)
                                                    );";
                                                    $stmt_create_TermosServicos = $conn->prepare($sql_create_TermosServicos);
                                                    if($stmt_create_TermosServicos->execute())
                                                    {
                                                        echo "Banco de Dados Resetado com Sucesso";
                                                    }
                                                    else
                                                    {
                                                        echo "error ao tentar criar a tabela TermosDeServicos";
                                                    }
                                                }
                                                else
                                                {
                                                    echo "Error ao tentar criar tabela Postagens";
                                                }
                                            }
                                            else
                                            {
                                                echo "Error ao Tentar Criar Tabela ImagemPerfil";
                                            }
                                        }
                                        else
                                        {
                                            echo "Error ao Tentar Criar tabela usuarios";
                                        }
                                    }
                                    else
                                    {
                                        echo "Error ao Tentar Deletar usuarios";
                                    }
                                }
                                else
                                {
                                    echo "Error ao Tentar Deletar ImagemPerfil";
                                }
                            }
                            else
                            {
                                echo "Error ao Tentar Deletar  Postagens";
                            }
                        }
                        else
                        {
                            echo "Error ao Tentar Deletar TermosDeServico";
                        }
                    }
                    else
                    {
                        echo "Banco de Dados Não Encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            }
            else
            {
                echo "Esta VAzio";
            }
        }
        else
        {
            echo "Error no Metodo";
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