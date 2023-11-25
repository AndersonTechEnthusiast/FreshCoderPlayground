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
        if(@$_SESSION['usuario']['Login'] == true && @$_SESSION['usuario']['nivel_acessos'] == 'usuario')
        {
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $chave = implode('',array_values($_POST));
                $Perfil_img = $_FILES[$chave];
                $NovosParametros_Perfil_img = ['Nome','Caminho','Tipo','Nome_Temporario','Error','Tamanho'];
                $values = array_values($Perfil_img);
                $Perfil = [];
                for($i = 0; $i < count($Perfil_img); $i++)
                {
                    $Perfil[$NovosParametros_Perfil_img[$i]] = $values[$i];
                }
                $size = 2097152;
                if($Perfil['Tamanho'] <= $size)
                {
                $Caminho = "Caminho_Imagens_De_Perfil/";
                $Extensão = strtolower(pathinfo($Perfil['Nome'], PATHINFO_EXTENSION));
                if($Extensão == "jpg" || $Extensão == "png" || $Extensão == 'jpeg')
                {
                    $Name = pathinfo($Perfil['Nome']);
                    $BancoImage = implode('',$Name).".".$Extensão;
                    $PhotoSaved = move_uploaded_file($Perfil['Nome_Temporario'], $Caminho . implode('',$Name ) . "." . $Extensão);
                    if($PhotoSaved)
                    {
                        try
                        {
                            $host = 'localhost';
                            $user = 'root';
                            $pass = '';
                            $dtbs = 'conquest_go';
                            $conn = new PDO("mysql:host=$host;dbname=$dtbs", $user , $pass);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            if($conn)
                            {
                                $sql_Verificacion = "SELECT*FROM ImagemPerfil WHERE id_user = :id_user";
                                $stmt_Verificacion = $conn->prepare($sql_Verificacion);
                                $stmt_Verificacion->bindValue(':id_user',$_SESSION['usuario']['id']);
                                if($stmt_Verificacion->execute())
                                {
                                    if($stmt_Verificacion->rowCount() > 0)
                                    {
                                        $EDITAR = "UPDATE ImagemPerfil SET FotoPerfil = :FotoPerfil WHERE id_user = :id_user";
                                        $STMT_EDITAR = $conn->prepare($EDITAR);
                                        $STMT_EDITAR->bindValue(':FotoPerfil',$BancoImage);
                                        $STMT_EDITAR->bindValue(':id_user',$_SESSION['usuario']['id']);
                                        if($STMT_EDITAR->execute())
                                        {
                                            $_SESSION['usuario']['Photo'] = $BancoImage;
                                            echo 
                                            "
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Atualização com sucesso !!!',
                                                        text: 'A sua foto de Perfil foi Atualizada com sucesso !!!',
                                                        didClose: () =>{
                                                            window.location.href = 'Perfil-User.php';
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
                                                        title: 'Error na Execução',
                                                        text: 'A sua foto não foi editada devido ao um erro na Execução do banco de dados',
                                                        didClose: () =>{
                                                            window.location.href = 'Perfil-User.php';
                                                        }
                                                    });
                                                </script>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $sql_Insersion = "INSERT INTO ImagemPerfil (FotoPerfil,id_user)  VALUES (:FotoPerfil,:id_user)";
                                        $stmt_Insersion = $conn->prepare($sql_Insersion);
                                        $stmt_Insersion->bindValue(':FotoPerfil',$BancoImage);
                                        $stmt_Insersion->bindValue(':id_user',$_SESSION['usuario']['id']);
                                        if($stmt_Insersion->execute())
                                        {
                                            $_SESSION['usuario']['Photo'] = $BancoImage;
                                            echo 
                                            "
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Imagem Inserida com Sucesso !!!',
                                                        text: 'A Imagem de Perfil foi Adicionado com Sucesso !!',
                                                        didClose: () => {
                                                            window.location.href = 'Perfil-User.php';
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
                                                        title: 'Imagem Não foi Inserida !!!',
                                                        text: 'A Imagem de Perfil não foi Adicionado devido a um erro de execução do Banco de Dados!!',
                                                        didClose: () => {
                                                            window.location.href = 'Perfil-User.php';
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
                                                title: 'Error na Verificação',
                                                text: 'Error da Consulta da Verificação',
                                                didClose: () => {
                                                    window.location.href = 'Perfil-User.php';
                                                }
                                            });
                                        </script>
                                    ";
                                }
                            }
                            else
                            {

                            }    
                        }catch(PDOException $error)
                        {
                            echo 
                            "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error no Banco De Dados',
                                    text: 'O Banco de Dados Esta Com Erro nesse Script:['".$error->getMessage()."']',
                                    didClose: () =>{
                                        window.location.href='';
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
                                    title: 'Error na Deslocação da Imagem',
                                    text: 'A Imagem Não foi Movida Com Sucesso !!!',
                                    didClose: () => {
                                        window.location.href = 'Perfil-User.php';
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
                                    title: 'Extensão Negada',
                                    text: 'A Extenção esta Errada',
                                    didClose: () => {
                                        window.location.href = 'Perfil-User.php';
                                    }
                                });
                            </script>
                        ";
                }
                }
                else
                if($Perfil['Tamanho'] > $size)
                {
                    echo 
                    "
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro no Tamanho',
                                text: 'Tamanho Muito Grande: Permitido até 2MB',
                                didClose: () => {
                                    window.location.href = 'Perfil-User.php';
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
                            title: 'Erro no Metodo',
                            text: 'O formulario não foi enviado com metodo correto',
                            didClose: () => {
                                window.location.href = 'Perfil-User.php';
                            }
                        });
                    </script>
                ";

            }       
        }
        else
        if(@$_SESSION['autor']['Login'] == true && @$_SESSION['autor']['nivel_acessos'] == 'autor')
        {
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $chave = implode('',array_values($_POST));
                $Perfil_img = $_FILES[$chave];
                $NovosParametros_Perfil_img = ['Nome','Caminho','Tipo','Nome_Temporario','Error','Tamanho'];
                $values = array_values($Perfil_img);
                $Perfil = [];
                for($i = 0; $i < count($Perfil_img); $i++)
                {
                    $Perfil[$NovosParametros_Perfil_img[$i]] = $values[$i];
                }
                $size = 2097152;
                if($Perfil['Tamanho'] <= $size)
                {
                $Caminho = "Caminho_Imagens_De_Perfil/";
                $Extensão = strtolower(pathinfo($Perfil['Nome'], PATHINFO_EXTENSION));
                if($Extensão == "jpg" || $Extensão == "png" || $Extensão == 'jpeg')
                {
                    $Name = pathinfo($Perfil['Nome']);
                    $BancoImage = implode('',$Name).".".$Extensão;
                    $PhotoSaved = move_uploaded_file($Perfil['Nome_Temporario'], $Caminho . implode('',$Name ) . "." . $Extensão);
                    if($PhotoSaved)
                    {
                        try
                        {
                            $host = 'localhost';
                            $user = 'root';
                            $pass = '';
                            $dtbs = 'conquest_go';
                            $conn = new PDO("mysql:host=$host;dbname=$dtbs", $user , $pass);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            if($conn)
                            {
                                $sql_Verificacion = "SELECT*FROM ImagemPerfil WHERE id_user = :id_user";
                                $stmt_Verificacion = $conn->prepare($sql_Verificacion);
                                $stmt_Verificacion->bindValue(':id_user',$_SESSION['autor']['id']);
                                if($stmt_Verificacion->execute())
                                {
                                    if($stmt_Verificacion->rowCount() > 0)
                                    {
                                        $EDITAR = "UPDATE ImagemPerfil SET FotoPerfil = :FotoPerfil WHERE id_user = :id_user";
                                        $STMT_EDITAR = $conn->prepare($EDITAR);
                                        $STMT_EDITAR->bindValue(':FotoPerfil',$BancoImage);
                                        $STMT_EDITAR->bindValue(':id_user',$_SESSION['autor']['id']);
                                        if($STMT_EDITAR->execute())
                                        {
                                            $_SESSION['autor']['Photo'] = $BancoImage;
                                            echo 
                                            "
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Atualização com sucesso !!!',
                                                        text: 'A sua foto de Perfil foi Atualizada com sucesso !!!',
                                                        didClose: () =>{
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
                                                        title: 'Error na Execução',
                                                        text: 'A sua foto não foi editada devido ao um erro na Execução do banco de dados',
                                                        didClose: () =>{
                                                            window.location.href = 'Autor.php';
                                                        }
                                                    });
                                                </script>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $sql_Insersion = "INSERT INTO ImagemPerfil (FotoPerfil,id_user)  VALUES (:FotoPerfil,:id_user)";
                                        $stmt_Insersion = $conn->prepare($sql_Insersion);
                                        $stmt_Insersion->bindValue(':FotoPerfil',$BancoImage);
                                        $stmt_Insersion->bindValue(':id_user',$_SESSION['autor']['id']);
                                        if($stmt_Insersion->execute())
                                        {
                                            $_SESSION['autor']['Photo'] = $BancoImage;
                                            echo 
                                            "
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Imagem Inserida com Sucesso !!!',
                                                        text: 'A Imagem de Perfil foi Adicionado com Sucesso !!',
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
                                                        title: 'Imagem Não foi Inserida !!!',
                                                        text: 'A Imagem de Perfil não foi Adicionado devido a um erro de execução do Banco de Dados!!',
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
                                                title: 'Error na Verificação',
                                                text: 'Error da Consulta da Verificação',
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
                        }catch(PDOException $error)
                        {
                            echo 
                            "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error no Banco De Dados',
                                    text: 'O Banco de Dados Esta Com Erro nesse Script:['".$error->getMessage()."']',
                                    didClose: () =>{
                                        window.location.href='Autor.php';
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
                                    title: 'Error na Deslocação da Imagem',
                                    text: 'A Imagem Não foi Movida Com Sucesso !!!',
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
                                    title: 'Extensão Negada',
                                    text: 'A Extenção esta Errada',
                                    didClose: () => {
                                        window.location.href = 'Autor.php';
                                    }
                                });
                            </script>
                        ";
                }
                }
                else
                if($Perfil['Tamanho'] > $size)
                {
                    echo 
                    "
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro no Tamanho',
                                text: 'Tamanho Muito Grande: Permitido até 2MB',
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
                            title: 'Erro no Metodo',
                            text: 'O formulario não foi enviado com metodo correto',
                            didClose: () => {
                                window.location.href = 'Autor.php';
                            }
                        });
                    </script>
                ";

            }          
        }
        else
        if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
        {
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $chave = implode('',array_values($_POST));
                $Perfil_img = $_FILES[$chave];
                $NovosParametros_Perfil_img = ['Nome','Caminho','Tipo','Nome_Temporario','Error','Tamanho'];
                $values = array_values($Perfil_img);
                $Perfil = [];
                for($i = 0; $i < count($Perfil_img); $i++)
                {
                    $Perfil[$NovosParametros_Perfil_img[$i]] = $values[$i];
                }
                $size = 2097152;
                if($Perfil['Tamanho'] <= $size)
                {
                $Caminho = "Caminho_Imagens_De_Perfil/";
                $Extensão = strtolower(pathinfo($Perfil['Nome'], PATHINFO_EXTENSION));
                if($Extensão == "jpg" || $Extensão == "png" || $Extensão == 'jpeg')
                {
                    $Name = pathinfo($Perfil['Nome']);
                    $BancoImage = implode('',$Name).".".$Extensão;
                    $PhotoSaved = move_uploaded_file($Perfil['Nome_Temporario'], $Caminho . implode('',$Name ) . "." . $Extensão);
                    if($PhotoSaved)
                    {
                        try
                        {
                            $host = 'localhost';
                            $user = 'root';
                            $pass = '';
                            $dtbs = 'conquest_go';
                            $conn = new PDO("mysql:host=$host;dbname=$dtbs", $user , $pass);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            if($conn)
                            {
                                $sql_Verificacion = "SELECT*FROM ImagemPerfil WHERE id_user = :id_user";
                                $stmt_Verificacion = $conn->prepare($sql_Verificacion);
                                $stmt_Verificacion->bindValue(':id_user',$_SESSION['Administrador']['id']);
                                if($stmt_Verificacion->execute())
                                {
                                    if($stmt_Verificacion->rowCount() > 0)
                                    {
                                        $EDITAR = "UPDATE ImagemPerfil SET FotoPerfil = :FotoPerfil WHERE id_user = :id_user";
                                        $STMT_EDITAR = $conn->prepare($EDITAR);
                                        $STMT_EDITAR->bindValue(':FotoPerfil',$BancoImage);
                                        $STMT_EDITAR->bindValue(':id_user',$_SESSION['Administrador']['id']);
                                        if($STMT_EDITAR->execute())
                                        {
                                            $_SESSION['Administrador']['Photo'] = $BancoImage;
                                            echo 
                                            "
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Atualização com sucesso !!!',
                                                        text: 'A sua foto de Perfil foi Atualizada com sucesso !!!',
                                                        didClose: () =>{
                                                            window.location.href = 'Administrador.php';
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
                                                        title: 'Error na Execução',
                                                        text: 'A sua foto não foi editada devido ao um erro na Execução do banco de dados',
                                                        didClose: () =>{
                                                            window.location.href = 'Administrador.php';
                                                        }
                                                    });
                                                </script>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $sql_Insersion = "INSERT INTO ImagemPerfil (FotoPerfil,id_user)  VALUES (:FotoPerfil,:id_user)";
                                        $stmt_Insersion = $conn->prepare($sql_Insersion);
                                        $stmt_Insersion->bindValue(':FotoPerfil',$BancoImage);
                                        $stmt_Insersion->bindValue(':id_user',$_SESSION['Administrador']['id']);
                                        if($stmt_Insersion->execute())
                                        {
                                            $_SESSION['Administrador']['Photo'] = $BancoImage;
                                            echo 
                                            "
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Imagem Inserida com Sucesso !!!',
                                                        text: 'A Imagem de Perfil foi Adicionado com Sucesso !!',
                                                        didClose: () => {
                                                            window.location.href = 'Administrador.php';
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
                                                        title: 'Imagem Não foi Inserida !!!',
                                                        text: 'A Imagem de Perfil não foi Adicionado devido a um erro de execução do Banco de Dados!!',
                                                        didClose: () => {
                                                            window.location.href = 'Administrador.php';
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
                                                title: 'Error na Verificação',
                                                text: 'Error da Consulta da Verificação',
                                                didClose: () => {
                                                    window.location.href = 'Administrador.php';
                                                }
                                            });
                                        </script>
                                    ";
                                }
                            }
                            else
                            {

                            }    
                        }catch(PDOException $error)
                        {
                            echo 
                            "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error no Banco De Dados',
                                    text: 'O Banco de Dados Esta Com Erro nesse Script:['".$error->getMessage()."']',
                                    didClose: () =>{
                                        window.location.href='Administrador.php';
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
                                    title: 'Error na Deslocação da Imagem',
                                    text: 'A Imagem Não foi Movida Com Sucesso !!!',
                                    didClose: () => {
                                        window.location.href = 'Administrador.php';
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
                                    title: 'Extensão Negada',
                                    text: 'A Extenção esta Errada',
                                    didClose: () => {
                                        window.location.href = 'Administrador.php';
                                    }
                                });
                            </script>
                        ";
                }
                }
                else
                if($Perfil['Tamanho'] > $size)
                {
                    echo 
                    "
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro no Tamanho',
                                text: 'Tamanho Muito Grande: Permitido até 2MB',
                                didClose: () => {
                                    window.location.href = 'Administrador.php';
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
                            title: 'Erro no Metodo',
                            text: 'O formulario não foi enviado com metodo correto',
                            didClose: () => {
                                window.location.href = 'Administrador.php';
                            }
                        });
                    </script>
                ";

            }     
        }
        else
        {
            // echo 
            //     "
            //         <script>
            //             Swal.fire({
            //                 icon: 'error',
            //                 title: 'Erro no Metodo',
            //                 text: 'O formulario não foi enviado com metodo correto',
            //                 didClose: () => {
            //                     window.location.href = 'Perfil-User.php';
            //                 }
            //             });
            //         </script>
            //     ";
            echo "Error";
        }
    ?>
</body>
</html>
