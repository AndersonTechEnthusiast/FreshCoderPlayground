<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
    {
       if($_SERVER['REQUEST_METHOD'] == 'POST')
       {
        $newNames = ['ID','Nivel_de_Acessos'];
        $Values = array_values($_POST);
        $count = count($_POST);
        $Dados = [];
        for($i = 0; $i < $count; $i++)
        {
            $Dados[$newNames[$i]] = $Values[$i];
        }
        echo 
        '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="../Css/Administrador/Editer/editer.css">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            
            </head>
            <body>
                <section class="Parallax">
                    <div class="FrontInfo">
                        <div class="ContainerEdit">
                            <form method="POST" action="Editar-Novas-Usuario-Coletadas.php" class="FormEditNivelAcess">
                                <div class="container mt-5" style="color: white;">
                                    <h2>Nivel de Acessos</h2>
                                    <input type="hidden" name="id" value="'.$Dados['ID'].'">
                                    <select class="form-control" id="exampleSelect" name="newNivelAcess">
                                    <option value="'.$Dados['Nivel_de_Acessos'].'">'.$Dados['Nivel_de_Acessos'].'</option>
                                    <option value="autor">Autor</option>
                                    <option value="Administrador">Administrador</option>
                                    </select>
                                </div>
                                <div class="containerBtn">
                                    <input type="submit" class="edited" value="Editar nivel de Acesso">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </body>
            
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </html>
        ';
       }
       else
       {
        echo "Error no Formulario";
       }
    }
    else
    {
        echo "Não tem Acesso a Essa Area";
    }
?>