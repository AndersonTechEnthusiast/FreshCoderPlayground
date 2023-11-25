<body>
    <div class="overlayPopUpPerfil" id="PerfilViewAutorOverlay"></div>
    <div class="modalPopUpPerfil" id="PerfilViewAutorModal">
        <div class="containerView">
          <div class="InfoPageFront">
                <div class="container-Title">
                    <b>
                        Perfil 
                    </b>
                </div>
                <div class="containerDadosView">
                    <div class="PhotoPerfil">
                        <?php
                            if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
                            {
                                if(@$_SESSION['autor']['Photo'] != null)
                                {
                                    $caminho = 'Caminho_Imagens_De_Perfil/';
                                    echo 
                                    '
                                    <form class="FormPhoto" id="Photo" method="POST" action="Insertion_Photo.php" enctype="multipart/form-data">
                                        <label for="inImg">
                                            <img src="'.$caminho.$_SESSION['autor']['Photo'].'" name="Padrao" class="PhotoPreview" id="image">
                                        </label>
                                        <input type="hidden" name="Name" value="Photo">
                                        <input type="file" name="Photo" class="PhotoFile" id="inImg">
                                        <input type="submit" value="Enviar FOTO" class="buttonEnviarPhoto">
                                    </form>
                                    ';
                                }
                                else
                                if(@$_SESSION['autor']['Photo'] == null)
                                {
                                    echo 
                                    '
                                    <form class="FormPhoto" id="Photo" method="POST" action="Insertion_Photo.php" enctype="multipart/form-data">
                                        <label for="inImg">
                                            <img src="Img/PadrãoFotoPerfil.png" name="Padrao" class="PhotoPreview" id="image">
                                        </label>
                                        <input type="hidden" name="Name" value="Photo">
                                        <input type="file" name="Photo" class="PhotoFile" id="inImg">
                                        <input type="submit" value="Enviar FOTO">
                                    </form>
                                    ';
                                }
                            }
                        ?>
                    </div>
                    <div class="DadosPerfil">
                        <div class="container-Dados-View" id="container-Dados-View-nome">
                            <fieldset class="container-Dados" id="container-Dados-nome">
                               <form class="ViewDadosForUser" method="POST" action="PHP/Coletar_Novos_Dados.php">
                                 <?php echo $_SESSION['autor']['nome'];?>
                                 <input type="hidden" name="valueNome" value="<?php echo $_SESSION['autor']['nome'];?>">
                                 <label class="labelSubmit" for="nomesubmit">
                                    <i class="fi fi-sr-pencil"></i>
                                 </label>
                                 <input type="submit" class="InputsSubmitsPopUpPreviewLogin" id="nomesubmit">
                                </form>
                            </fieldset>
                        </div>
                        <div class="container-Dados-View" id="container-Dados-View-email">
                            <fieldset class="container-Dados" id="container-Dados-email">
                            <form class="ViewDadosForUser" method="POST" action="PHP/Coletar_Novos_Dados.php">
                                 <?php echo $_SESSION['autor']['email'];?>
                                 <input type="hidden" name="valueEmail" value="<?php echo $_SESSION['autor']['email'];?>">
                                 <label class="labelSubmit" for="emailsubmit">
                                    <i class="fi fi-sr-pencil"></i>
                                 </label>
                                 <input type="submit" class="InputsSubmitsPopUpPreviewLogin" id="emailsubmit">
                                </form>
                            </fieldset>
                        </div>
                        <div class="container-Dados-View" id="container-Dados-View-telefone">
                            <fieldset class="container-Dados" id="container-Dados-telefone">
                            <form class="ViewDadosForUser" method="POST" action="PHP/Coletar_Novos_Dados.php">
                                 <?php echo $_SESSION['autor']['telefone'];?>
                                 <input type="hidden" name="valueTelefone" value="<?php echo $_SESSION['autor']['telefone'];?>">
                                 <label class="labelSubmit" for="telefonesubmit">
                                    <i class="fi fi-sr-pencil"></i>
                                 </label>
                                 <input type="submit" class="InputsSubmitsPopUpPreviewLogin" id="telefonesubmit">
                                </form>
                            </fieldset>
                        </div>
                        <div class="container-Dados-View" id="container-Dados-View-senha">
                            <fieldset class="container-Dados" id="container-Dados-senha">
                            <form class="ViewDadosForUser" method="POST" action="PHP/Coletar_Novos_Dados.php">
                                 <?php echo base64_encode($_SESSION['autor']['senha']);?>
                                 <input type="hidden" name="valueSenha" value="<?php echo $_SESSION['autor']['senha'];?>">
                                 <label class="labelSubmit" for="senhasubmit">
                                    <i class="fi fi-sr-pencil"></i>
                                 </label>
                                 <input type="submit" class="InputsSubmitsPopUpPreviewLogin" id="senhasubmit">
                                </form>
                            </fieldset>
                        </div>
                        <div class="container-Dados-View" id="container-Dados-View-nivel_de_acesso">
                            <fieldset class="container-Dados" id="container-Dados-nivel_de_acesso">
                                <?php echo $_SESSION['autor']['nivel_acessos'];?>    
                            </fieldset>
                        </div>
                        <div class="Logout">
                            <form class="Sair" id="Logout" method="POST" action="PHP/Logout.php">
                                <input type="Submit" name="Sair" class="SairSubmit" value="Sair">
                            </form>
                        </div>
                    </div>
                </div>
          </div>
        </div>
    </div>

    <section class="Parallax">
        <div class="FronInfo">
            <div class="Welcome">
                <div class="containerImgView"><img src="Img/Logo.png" alt="Conquets Go Autor"></div>
                <div class="containerTxtView">Bem - Vindo, <?php echo $_SESSION['autor']['nome'];?></div>
            </div>
        </div>
    </section>

    <section class="Navegacion_Scroll-Sueve">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"> Conquest GO </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#section1">Painel de Controle</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#section2">Minhas Informações</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#section3">Minhas Postagens</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#section4">Editar Minhas Postagens</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#section5">Excluir Minhas Postagens</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#section6">Postar Nova Postagem</a>
                </li>

              </ul>
            </div>
          </nav>
    </section>
    
    <?php
        if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
        {
            if(@$_SESSION['autor']['Photo'] != null)
            {
                $caminho = 'Caminho_Imagens_De_Perfil/';
                echo 
                '
                <div class="containerPerfilAutor">
                    <div class="containerPhotoActived">
                        <a href="#" class="modal-View-Perfil-PopUp-Autor"><img src="'.$caminho.$_SESSION['autor']['Photo'].'" class="ImgPhotoAutor"></a>
                    </div>
                </div>
                ';
            }
            else
            if 
            (@$_SESSION['autor']['Photo'] == null)
            {
                echo 
                '
                <div class="containerPerfilAutor">
                    <div class="containerPhotoActived">
                        <a href="#" class="modal-View-Perfil-PopUp-Autor"><img src="Img/PadrãoFotoPerfil.png" class="ImgPhotoAutor"></a>
                    </div>
                </div>
                ';
            }
        }
    ?>

    <section class="WelcomeMensageForAutor">
        <p>Olá <?php echo $_SESSION['autor']['nome']; ?>,</p>
        <p>Bem-vindo(a) à comunidade de autores do Conquest Go!</p>
        <p>Estamos animados em tê-lo(a) como parte da nossa plataforma, onde você terá a oportunidade de compartilhar suas ideias, experiências e paixão pelo mundo dos jogos.</p>
        <p>Como novo autor, aqui estão algumas ações que você pode realizar:</p>
        <ul>
          <li>Crie artigos incríveis para compartilhar com a comunidade.</li>
          <li>Personalize seu perfil para que os leitores possam conhecê-lo(a) melhor.</li>
          <li>Participe ativamente da comunidade interagindo com outros autores e leitores.</li>
          <li>Use o painel de controle para gerenciar seus artigos, estatísticas e configurações de perfil.</li>
        </ul>
        <p>Se você tiver alguma dúvida ou precisar de assistência, não hesite em entrar em contato com nossa equipe de suporte.</p>
        <p>Estamos ansiosos para ver suas contribuições e o crescimento da nossa comunidade graças à sua participação!</p>
        <p>Divirta-se compartilhando suas histórias e conhecimentos!</p>
    </section>

    <div class="containerTitlePainelDeControle" id="section1">
        <div class="TitlePaineldeControel">
            Painel de Controle
        </div>
    </div>

    <div class="containerNomeDoAutor">
        <div class="NomeDoAutor">
            <?php echo $_SESSION['autor']['nome'];?>
        </div>
    </div>

    <section class="container">
        <div class="PainelDeControle">
            <div class="PainelOptions">
                <?php
                    if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
                    {
                        if($_SESSION['autor']['Photo'] != null)
                        {
                            $caminho = 'Caminho_Imagens_De_Perfil/';
                            echo '<div class="PerfilPhoto"><img src="'.$caminho.$_SESSION['autor']['Photo'].'" class="ImgBigViewAutor"></div>';
                        }
                        else
                        if($_SESSION['autor']['Photo'] == null)
                        {
                            echo '<div class="PerfilPhoto"><img src="Img/PadrãoFotoPerfil.png" class="ImgBigViewAutor"></div>';
                        }
                    }
                ?>
                <div class="Visor">
                    <div class="containerVisorOptions">
                        <ul class="ListasVisor">
                            <?php
                                if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
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
                                            $sql_Total_de_Postagens = "SELECT COUNT(*) AS total_postagens FROM Postagens WHERE id_autor = :id_autor";
                                            $stmt_Total_de_Postagens = $conn->prepare($sql_Total_de_Postagens);
                                            $stmt_Total_de_Postagens->bindValue(':id_autor',$_SESSION['autor']['id']);
                                            if($stmt_Total_de_Postagens->execute())
                                            {
                                                if($stmt_Total_de_Postagens->rowCount() > 0)
                                                {
                                                    $row = $stmt_Total_de_Postagens->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($row as $dados)
                                                    {
                                                        $total_de_Postagem_Postadas = $dados['total_postagens'];
                                                    }
                                                    echo '<li class="ListaPostQuant">Quantidade de Postagens Postadas: '.$total_de_Postagem_Postadas.' Postagens</li>';
                                                }
                                                else
                                                {
                                                    echo '<li class="ListaPostQuant">Quantidade de Postagens Postadas: 0 Postagens</li>';
                                                }
                                            }
                                            else
                                            {
                                                echo 'Consulta não executou';
                                            }
                                        }
                                        else
                                        {
                                            echo "O Banco Não foi Encontrado";
                                        }
                                    }catch(PDOException $error)
                                    {
                                        echo "error [".$error->getMessage()."]";
                                    }
                                }
                            ?>
                            <li class="ListaAndLista">
                                <div class="containerLista">
                                    <ul class="ContainerListas">
                                        <?php
                                            if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
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
                                                        $sql_MinhasPostagens = "SELECT COUNT(*) AS total_postagens, categoria FROM  Postagens WHERE id_autor = :id_autor GROUP BY categoria";
                                                        $stmt_MinhasPostagens = $conn->prepare($sql_MinhasPostagens);
                                                        $stmt_MinhasPostagens->bindValue(':id_autor',$_SESSION['autor']['id']);
                                                        if($stmt_MinhasPostagens->execute())
                                                        {
                                                            if($stmt_MinhasPostagens->rowCount() > 0)
                                                            {
                                                                $row = $stmt_MinhasPostagens->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach($row as $dados)
                                                                {
                                                                    $total_postagens = $dados['total_postagens'];
                                                                    $categoria = $dados['categoria'];
                                                                    if(
                                                                        $categoria == 'acao'        ||
                                                                        $categoria == 'aventura'    ||
                                                                        $categoria == 'rpg'         ||
                                                                        $categoria == 'estrategia'  ||
                                                                        $categoria == 'simulacao'   ||
                                                                        $categoria == 'esportes'    ||
                                                                        $categoria == 'corrida'     ||
                                                                        $categoria == 'horror'
                                                                        )
                                                                    {
                                                                        echo '<li class="PostagensCategorias">Postagens de Jogos de '.$categoria.':         '.$total_postagens.' Postagens de Games de '.$categoria.'</li>';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo "Erro na execução do banco de dados";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "banco não funcionou";
                                                    }
                                                }catch(PDOException $error)
                                                {
                                                    echo "Error SQL: ['".$error->getMessage()."']";
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="containerTitlePainelDeControle" id="section2">
        <div class="TitlePaineldeControel">
            Minhas Informações
        </div>
    </div>

    <div class="containerNomeDoAutor">
        <div class="NomeDoAutor">
            <?php echo $_SESSION['autor']['nome']; ?>
        </div>
    </div>

    <section class="container">
        <div class="card" style="width: 18rem;">
            <?php
                if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
                {
                    if($_SESSION['autor']['Photo'] != null)
                    {
                        $caminho = 'Caminho_Imagens_De_Perfil/';
                        echo '<img src="'.$caminho.$_SESSION['autor']['Photo'].'" class="card-img-top" alt="Imagem do Autor">';
                    }
                    else
                    if($_SESSION['autor']['Photo'] == null)
                    {
                        echo '<img src="Img/PadrãoFotoPerfil.png" class="card-img-top" alt="Imagem do Autor">';
                    }
                }
            ?>
            <div class="card-body">
                <h5 class="card-title">Nome do Autor</h5>
                <p class="card-text">Nivel de Acesso</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">E-mail: autor@email.com</li>
                <li class="list-group-item">Telefone: (123) 456-7890</li>
            </ul>
        </div>
    </section>

    <div class="containerTitlePainelDeControle" id="section3">
        <div class="TitlePaineldeControel">
            Minhas Postagens
        </div>
    </div>

    <div class="containerNomeDoAutor">
        <div class="NomeDoAutor">
            <?php echo $_SESSION['autor']['nome'];?>
        </div>
    </div>

    <section class="container">
        <div class="container mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Categoria</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
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
                                    $sql_MinhasPostagens = "SELECT*FROM Postagens WHERE id_autor = :id_autor";
                                    $stmt_MinhasPostagens = $conn->prepare($sql_MinhasPostagens);
                                    $stmt_MinhasPostagens->bindValue(':id_autor',$_SESSION['autor']['id']);
                                    if($stmt_MinhasPostagens->execute())
                                    {
                                        if($stmt_MinhasPostagens->rowCount() > 0)
                                        {
                                            $row = $stmt_MinhasPostagens->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                $NewNamesForDados = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                $Values = array_values($Dados);
                                                $Minhas_Postagens = [];
                                                $count_MinhasPostagens = ((count($NewNamesForDados))+(count($Values)))/2;
                                                for($i = 0; $i < $count_MinhasPostagens; $i++)
                                                {
                                                    $Minhas_Postagens[$NewNamesForDados[$i]] = $Values[$i];
                                                }
                                                echo "<tr>";
                                                    echo "<th scope='row'>".$Minhas_Postagens['ID']."</th>";
                                                    echo "<td>".$Minhas_Postagens['Título']."</td>";
                                                    echo "<td>".$Minhas_Postagens['Imagem']."</td>";
                                                    echo "<td>".$Minhas_Postagens['Categoria']."</td>";
                                                echo "</tr>";
                                            }             
                                        }
                                        else
                                        {
                                            echo "Nenhuma linha Afetada";
                                        }
                                    }
                                    else
                                    {
                                        echo "Consulta não executou";
                                    }
                                }
                                else
                                {
                                    echo "Error no Banco de Dados";
                                }
                            }catch(PDOException $error)
                            {
                                echo "Error SQL: ['".$error->getMessage()."']";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="containerTitlePainelDeControle" id="section2">
            <div class="TitlePaineldeControel">
                Fim das Postagens
            </div>
        </div>
    </section>

    <div class="containerTitlePainelDeControle" id="section4">
        <div class="TitlePaineldeControel">
            Editar Minhas Postagens
        </div>
    </div>

    <div class="containerNomeDoAutor">
        <div class="NomeDoAutor">
            <?php echo $_SESSION['autor']['nome'];?>
        </div>
    </div>

    <section class="container">
        <div class="container mt-4">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Categoria</th>    
                </tr>
                </thead>
                <tbody>
                    <?php
                        if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
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
                                    $sql_MinhasPostagens = "SELECT*FROM Postagens WHERE id_autor = :id_autor";
                                    $stmt_MinhasPostagens = $conn->prepare($sql_MinhasPostagens);
                                    $stmt_MinhasPostagens->bindValue(':id_autor',$_SESSION['autor']['id']);
                                    if($stmt_MinhasPostagens->execute())
                                    {
                                        if($stmt_MinhasPostagens->rowCount() > 0)
                                        {
                                            $row = $stmt_MinhasPostagens->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                $NewNamesForDados = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                $Values = array_values($Dados);
                                                $Minhas_Postagens = [];
                                                $count_MinhasPostagens = ((count($NewNamesForDados))+(count($Values)))/2;
                                                for($i = 0; $i < $count_MinhasPostagens; $i++)
                                                {
                                                    $Minhas_Postagens[$NewNamesForDados[$i]] = $Values[$i];
                                                }
                                                echo "<tr>";
                                                    echo "<th scope='row'>".$Minhas_Postagens['ID']."</th>";
                                                    echo "<td>".$Minhas_Postagens['Título']."</td>";
                                                    echo "<td>".$Minhas_Postagens['Imagem']."</td>";
                                                    echo "<td>".$Minhas_Postagens['Categoria']."</td>";
                                                    echo "<td>";
                                                        echo 
                                                        "
                                                            <form method='POST' action='Coleta_Dados_Editar_Noticia.php'>
                                                                <input type='hidden' name='id_da_noticia' value='".$Minhas_Postagens['ID']."'>
                                                                <button type='submit' class='btn btn-warning'>Editar</button>
                                                            </form>
                                                        ";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }             
                                        }
                                        else
                                        {
                                            echo "Nenhuma linha Afetada";
                                        }
                                    }
                                    else
                                    {
                                        echo "Consulta não executou";
                                    }
                                }
                                else
                                {
                                    echo "Error no Banco de Dados";
                                }
                            }catch(PDOException $error)
                            {
                                echo "Error SQL: ['".$error->getMessage()."']";
                            }
                        }
                    ?>
                    <!-- ... Mais linhas da tabela ... -->
                </tbody>
            </table>
        </div>
    </section>

    <div class="containerTitlePainelDeControle" id="section5">
        <div class="TitlePaineldeControel">
            Excluir Minhas Postagens
        </div>
    </div>

    <div class="containerNomeDoAutor">
        <div class="NomeDoAutor">
            <?php echo $_SESSION['autor']['nome'];?>
        </div>
    </div>

    <section class="container">
        <div class="container mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Categoria</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($_SESSION['autor']['Login'] == true && $_SESSION['autor']['nivel_acessos'] == 'autor')
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
                                    $sql_MinhasPostagens = "SELECT*FROM Postagens WHERE id_autor = :id_autor";
                                    $stmt_MinhasPostagens = $conn->prepare($sql_MinhasPostagens);
                                    $stmt_MinhasPostagens->bindValue(':id_autor',$_SESSION['autor']['id']);
                                    if($stmt_MinhasPostagens->execute())
                                    {
                                        if($stmt_MinhasPostagens->rowCount() > 0)
                                        {
                                            $row = $stmt_MinhasPostagens->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                $NewNamesForDados = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                $Values = array_values($Dados);
                                                $Minhas_Postagens = [];
                                                $count_MinhasPostagens = ((count($NewNamesForDados))+(count($Values)))/2;
                                                for($i = 0; $i < $count_MinhasPostagens; $i++)
                                                {
                                                    $Minhas_Postagens[$NewNamesForDados[$i]] = $Values[$i];
                                                }
                                                echo "<tr>";
                                                    echo "<th scope='row'>".$Minhas_Postagens['ID']."</th>";
                                                    echo "<td>".$Minhas_Postagens['Título']."</td>";
                                                    echo "<td>".$Minhas_Postagens['Imagem']."</td>";
                                                    echo "<td>".$Minhas_Postagens['Categoria']."</td>";
                                                    echo "<td>";
                                                        echo 
                                                        "
                                                            <form method='POST' action='Excluir_Noticia.php'>
                                                                <input type='hidden' name='id_da_noticia' value='".$Minhas_Postagens['ID']."'>
                                                                <button type='submit' class='btn btn-danger'>Excluir</button>
                                                            </form>
                                                        ";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }             
                                        }
                                        else
                                        {
                                            echo "Nenhuma linha Afetada";
                                        }
                                    }
                                    else
                                    {
                                        echo "Consulta não executou";
                                    }
                                }
                                else
                                {
                                    echo "Error no Banco de Dados";
                                }
                            }catch(PDOException $error)
                            {
                                echo "Error SQL: ['".$error->getMessage()."']";
                            }
                        }
                    ?>
                    <!-- ... Mais linhas da tabela ... -->
                </tbody>
            </table>
        </div>
    </section>

    <div class="containerTitlePainelDeControle" id="section6">
        <div class="TitlePaineldeControel">
            Postar Nova Postagem
        </div>
    </div>

    <div class="containerNomeDoAutor">
        <div class="NomeDoAutor">
            <?php echo $_SESSION['autor']['nome'];?>
        </div>
    </div>

    <section class="container">
        <div class="container mt-4">
            <h2>Nova Postagem</h2>
            <form method="POST" action="PostarNovaPostagem.php" enctype="multipart/form-data">
                <input type="hidden" name="NomeDaFoto" value="imagem">
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" class="form-control" id="imagem" accept="image/*" onchange="previewImage()" name="imagem">
                    <img id="image-preview" src="Img/PadrãoFotoPerfil.png" class="mt-2" style="width: 100%; height:calc(200px + 200px);" alt="Image Preview">
                </div>
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título da Postagem</label>
                    <input type="text" class="form-control" id="titulo" placeholder="Insira o título" name="titulo">
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" id="categoria" name="categoria">
                        <option value="acao">Ação</option>
                        <option value="aventura">Aventura</option>
                        <option value="rpg">RPG</option>
                        <option value="estrategia">Estratégia</option>
                        <option value="simulacao">Simulação</option>
                        <option value="esportes">Esportes</option>
                        <option value="corrida">Corrida</option>
                        <option value="horror">Horror</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição da Postagem</label>
                    <textarea class="form-control" id="descricao" rows="3" placeholder="Insira a descrição" name="descricao"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </div>
    </section>

    <footer>
      <p>© 2023 Conquest Go. Todos os direitos reservados.</p>
    </footer>
</body>