<body>
    <section class="Parallax">
        <div class="container-Welcome-All">
            <div class="container-Welcome">
                <div class="imgLogo"></div>
                <div class="text">
                    <p>
                        Seja - Vindo, <?php echo $_SESSION['usuario']['nome'];?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="BarraDePesquisaContainer">
        <form class="FormBarradePesquisa" method="POST" action="Searc-Pages/Result-Search.php">
            <div class="containerPesquisa">
                <label class="Icon" for="Pesquisa" id="Lupa">
                    <i class="fa-solid fa-magnifying-glass" id="IconLupa"></i>
                </label>
                <input type="search" name="Pesquisar" class="BarraDePesquisa" id="Pesquisa" placeholder="Insira uma Categoria de Jogo Ação,MMO,RPG...">
                <label class="Icon" for="ButtonSearch" id="Send">
                    <i class="fa-solid fa-paper-plane" id="IconSend"></i>
                </label>
            </div>
            <div id="Mensage-Error"></div>
            <input type="submit" id="ButtonSearch" class="ButtonSubmitSearch">
        </form>
    </section>
    <?php
        if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
        {
            if($_SESSION['usuario']['Photo'] != null)
            {
                $caminho = "Caminho_Imagens_De_Perfil/";
                echo 
                '
                <section class="ContainerLoginViewInformation">
                    <a href="#" class="perfillink" id="Modal-Link-Perfil-PopUp">
                        <div class="containerLogin">
                            <img src="'.$caminho.$_SESSION['usuario']['Photo'].'" alt="Clique para Vizualizar suas Informações" class="ContaLogin">
                        </div>
                    </a>
                </section>
                ';
            }
            else
            if($_SESSION['usuario']['Photo'] == null)
            {
                echo 
                '
                <section class="ContainerLoginViewInformation">
                    <a href="#" class="perfillink" id="Modal-Link-Perfil-PopUp">
                        <div class="containerLogin">
                            <img src="Img/PadrãoFotoPerfil.png" alt="Clique para Vizualizar suas Informações" class="ContaLogin">
                        </div>
                    </a>
                </section>
                ';
            }
        }
    ?>
    <section class="Vetor-Ponto">
        <div class="Reference1">
            <i class="fi fi-rr-angle-right"></i>
            <div class="Ponto">
                <p>
                    <b> Confira as Principais Atualizações dos Games </b>
                </p>
            </div>
        </div>
    </section>
    <section class="ContainerListraParalelograma">
        <div class="ListraParalelograma">
        </div>
    </section>
    <section class="Carrossel">
        <div class="containerCarrossel">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="Img/Carrossel/Dead-Space.jpeg" class="d-block" alt="...">
                    </div>
                    <?php
                        require_once("PHP/Dados_Rapidos/Path-Carrossel.php");
                        $count = count($PathImageCarrossel);
                        for($i = 0; $i < $count; $i++)
                        {
                            echo 
                            '
                            <div class="carousel-item">
                                <img src="'.$PathImageCarrossel[$i].'" class="d-block" alt="...">
                            </div>
                            ';
                        }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section class="ContainerListraParalelograma">
        <div class="EsquerdaListraParalelograma">

        </div>
    </section>
    <section class="Sumario">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Acesso Rapido</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#AÇÃO">AÇÃO      </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#AVENTURA">AVENTURA  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#RPG">RPG       </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ESTRATÉGIA">ESTRATÉGIA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#SIMULAÇÃO">SIMULAÇÃO </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ESPORTES">ESPORTES  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#CORRIDA">CORRIDA   </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#HORROR">HORROR    </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section class="Vetor-Ponto">
        <div class="Reference1">
            <i class="fi fi-rr-angle-right"></i>
            <div class="Ponto">
                <p>
                    <b> Confira os Principais Games que serão lançados ano que vem  </b>
                </p>
            </div>
        </div>
    </section>
    <section class="Previstos">
        <div class="w-100">
            <div class="horizontal-scroll">
                <?php
                    require_once("PHP/Dados_Rapidos/Pah-Scrowlling.php");
                    $count = ((count($TitleScrowlling))+(count($PathScrowlling)))/2;
                    $i = 0;
                    while($i < $count)
                    {
                        echo 
                        '
                        <div class="mr-3 style">
                            <div class="titleScrollHorizon">'.$TitleScrowlling[$i].'</div>
                            <div class="ContainerImgScrollHorizon"><img src="'.$PathScrowlling[$i].'" alt="Imagem 1" class="size"></div>
                            <div class="ContainerBtnScrollHorizon"><a href="#" class="Link_Redirecte"><button type="button" class="BtnRedirect"> Ver </button></a></div>
                        </div>
                        ';
                        $i++;
                    }
                ?>
                <!-- Adicione mais imagens conforme necessário -->
            </div>
        </div>
    </section>
    <section class="ContainerCategory" id="AÇÃO">
        <div class="Category">
            AÇÃO
        </div>
    </section>
    <section class="PostsAll">
        <div class="containerPosts">
            <?php
                if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
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
                            $sql_Acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                            $stmt_Acao = $conn->prepare($sql_Acao);
                            $stmt_Acao->bindValue(':categoria','acao');
                            if($stmt_Acao->execute())
                            {
                                if($stmt_Acao->rowCount() > 0)
                                {
                                    $row = $stmt_Acao->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $Dados)
                                    {
                                        $newNamesPostagens = ['ID','Título','Imagem','Descricao','Categoria','ID_Autor'];
                                        $ValuesPostagens = array_values($Dados);
                                        $Postagens = [];
                                        $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $Postagens[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                        }
                                        $id_Postagem = $Postagens['ID'];
                                        $caminho = 'Imagem_Para_Posteres/';
                                        echo 
                                        '
                                            <div class="testecontainer">
                                                <div class="titlePostViewNoticeCategory">'.$Postagens['Título'].'</div>
                                                <div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagens['Imagem'].'" class="ImgSrcViewPost"></div>
                                                <div class="BtnPostViewNoticeCategory"><a href="PreviewPost.php?id='.$id_Postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div>
                                            </div>
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
                                echo "consulta não executada";
                            }
                        }
                        else
                        {
                            echo "Banco não encontrada";
                        }
                    }
                    catch(PDOException $error)
                    {
                        echo "Error MySQL ['".$error->getMessage()."']";   
                    }
                }
            ?>
        </div>
    </section>
    <section class="ContainerCategory" id="AVENTURA">
        <div class="Category">
           AVENTURA
        </div>
    </section>
    <section class="PostsAll">
    <div class="containerPosts">
            <?php
                if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
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
                            $sql_Acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                            $stmt_Acao = $conn->prepare($sql_Acao);
                            $stmt_Acao->bindValue(':categoria','aventura');
                            if($stmt_Acao->execute())
                            {
                                if($stmt_Acao->rowCount() > 0)
                                {
                                    $row = $stmt_Acao->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $Dados)
                                    {
                                        $newNamesPostagens = ['ID','Título','Imagem','Descricao','Categoria','ID_Autor'];
                                        $ValuesPostagens = array_values($Dados);
                                        $Postagens = [];
                                        $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $Postagens[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                        }
                                        $id_Postagem = $Postagens['ID'];
                                        $caminho = 'Imagem_Para_Posteres/';
                                        echo 
                                        '
                                            <div class="testecontainer">
                                                <div class="titlePostViewNoticeCategory">'.$Postagens['Título'].'</div>
                                                <div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagens['Imagem'].'" class="ImgSrcViewPost"></div>
                                                <div class="BtnPostViewNoticeCategory"><a href="PreviewPost.php?id='.$id_Postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div>
                                            </div>
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
                                echo "consulta não executada";
                            }
                        }
                        else
                        {
                            echo "Banco não encontrada";
                        }
                    }
                    catch(PDOException $error)
                    {
                        echo "Error MySQL ['".$error->getMessage()."']";   
                    }
                }
            ?>
        </div>
    </section>
    <section class="ContainerCategory" id="RPG">
        <div class="Category">
           RPG
        </div>
    </section>
    <section class="PostsAll">
    <div class="containerPosts">
            <?php
                if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
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
                            $sql_Acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                            $stmt_Acao = $conn->prepare($sql_Acao);
                            $stmt_Acao->bindValue(':categoria','rpg');
                            if($stmt_Acao->execute())
                            {
                                if($stmt_Acao->rowCount() > 0)
                                {
                                    $row = $stmt_Acao->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $Dados)
                                    {
                                        $newNamesPostagens = ['ID','Título','Imagem','Descricao','Categoria','ID_Autor'];
                                        $ValuesPostagens = array_values($Dados);
                                        $Postagens = [];
                                        $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $Postagens[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                        }
                                        $id_Postagem = $Postagens['ID'];
                                        $caminho = 'Imagem_Para_Posteres/';
                                        echo 
                                        '
                                            <div class="testecontainer">
                                                <div class="titlePostViewNoticeCategory">'.$Postagens['Título'].'</div>
                                                <div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagens['Imagem'].'" class="ImgSrcViewPost"></div>
                                                <div class="BtnPostViewNoticeCategory"><a href="PreviewPost.php?id='.$id_Postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div>
                                            </div>
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
                                echo "consulta não executada";
                            }
                        }
                        else
                        {
                            echo "Banco não encontrada";
                        }
                    }
                    catch(PDOException $error)
                    {
                        echo "Error MySQL ['".$error->getMessage()."']";   
                    }
                }
            ?>
        </div>
    </section>
    <section class="ContainerCategory"  id="ESTRATÉGIA">
        <div class="Category">
           ESTRATEGIA
        </div>
    </section>
    <section class="PostsAll">
    <div class="containerPosts">
            <?php
                if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
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
                            $sql_Acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                            $stmt_Acao = $conn->prepare($sql_Acao);
                            $stmt_Acao->bindValue(':categoria','estrategia');
                            if($stmt_Acao->execute())
                            {
                                if($stmt_Acao->rowCount() > 0)
                                {
                                    $row = $stmt_Acao->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $Dados)
                                    {
                                        $newNamesPostagens = ['ID','Título','Imagem','Descricao','Categoria','ID_Autor'];
                                        $ValuesPostagens = array_values($Dados);
                                        $Postagens = [];
                                        $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $Postagens[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                        }
                                        $id_Postagem = $Postagens['ID'];
                                        $caminho = 'Imagem_Para_Posteres/';
                                        echo 
                                        '
                                            <div class="testecontainer">
                                                <div class="titlePostViewNoticeCategory">'.$Postagens['Título'].'</div>
                                                <div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagens['Imagem'].'" class="ImgSrcViewPost"></div>
                                                <div class="BtnPostViewNoticeCategory"><a href="PreviewPost.php?id='.$id_Postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div>
                                            </div>
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
                                echo "consulta não executada";
                            }
                        }
                        else
                        {
                            echo "Banco não encontrada";
                        }
                    }
                    catch(PDOException $error)
                    {
                        echo "Error MySQL ['".$error->getMessage()."']";   
                    }
                }
            ?>
        </div>
    </section>
    <section class="ContainerCategory" id="SIMULAÇÃO">
        <div class="Category">
          SIMULAÇÃO
        </div>
    </section>
    <section class="PostsAll">
        <div class="containerPosts">
            <?php
                if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
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
                            $sql_Acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                            $stmt_Acao = $conn->prepare($sql_Acao);
                            $stmt_Acao->bindValue(':categoria','simulacao');
                            if($stmt_Acao->execute())
                            {
                                if($stmt_Acao->rowCount() > 0)
                                {
                                    $row = $stmt_Acao->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $Dados)
                                    {
                                        $newNamesPostagens = ['ID','Título','Imagem','Descricao','Categoria','ID_Autor'];
                                        $ValuesPostagens = array_values($Dados);
                                        $Postagens = [];
                                        $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $Postagens[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                        }
                                        $id_Postagem = $Postagens['ID'];
                                        $caminho = 'Imagem_Para_Posteres/';
                                        echo 
                                        '
                                            <div class="testecontainer">
                                                <div class="titlePostViewNoticeCategory">'.$Postagens['Título'].'</div>
                                                <div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagens['Imagem'].'" class="ImgSrcViewPost"></div>
                                                <div class="BtnPostViewNoticeCategory"><a href="PreviewPost.php?id='.$id_Postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div>
                                            </div>
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
                                echo "consulta não executada";
                            }
                        }
                        else
                        {
                            echo "Banco não encontrada";
                        }
                    }
                    catch(PDOException $error)
                    {
                        echo "Error MySQL ['".$error->getMessage()."']";   
                    }
                }
            ?>
        </div>
    </section>
    <section class="ContainerCategory" id="ESPORTES">
        <div class="Category">
         ESPORTES
        </div>
    </section>
    <section class="PostsAll">
    <div class="containerPosts">
            <?php
                if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
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
                            $sql_Acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                            $stmt_Acao = $conn->prepare($sql_Acao);
                            $stmt_Acao->bindValue(':categoria','esporte');
                            if($stmt_Acao->execute())
                            {
                                if($stmt_Acao->rowCount() > 0)
                                {
                                    $row = $stmt_Acao->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $Dados)
                                    {
                                        $newNamesPostagens = ['ID','Título','Imagem','Descricao','Categoria','ID_Autor'];
                                        $ValuesPostagens = array_values($Dados);
                                        $Postagens = [];
                                        $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $Postagens[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                        }
                                        $id_Postagem = $Postagens['ID'];
                                        $caminho = 'Imagem_Para_Posteres/';
                                        echo 
                                        '
                                            <div class="testecontainer">
                                                <div class="titlePostViewNoticeCategory">'.$Postagens['Título'].'</div>
                                                <div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagens['Imagem'].'" class="ImgSrcViewPost"></div>
                                                <div class="BtnPostViewNoticeCategory"><a href="PreviewPost.php?id='.$id_Postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div>
                                            </div>
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
                                echo "consulta não executada";
                            }
                        }
                        else
                        {
                            echo "Banco não encontrada";
                        }
                    }
                    catch(PDOException $error)
                    {
                        echo "Error MySQL ['".$error->getMessage()."']";   
                    }
                }
            ?>
        </div>
    </section>
    <section class="ContainerCategory" id="CORRIDA">
        <div class="Category">
        CORRIDA
        </div>
    </section>
    <section class="PostsAll">
    <div class="containerPosts">
            <?php
                if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
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
                            $sql_Acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                            $stmt_Acao = $conn->prepare($sql_Acao);
                            $stmt_Acao->bindValue(':categoria','corrida');
                            if($stmt_Acao->execute())
                            {
                                if($stmt_Acao->rowCount() > 0)
                                {
                                    $row = $stmt_Acao->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $Dados)
                                    {
                                        $newNamesPostagens = ['ID','Título','Imagem','Descricao','Categoria','ID_Autor'];
                                        $ValuesPostagens = array_values($Dados);
                                        $Postagens = [];
                                        $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $Postagens[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                        }
                                        $id_Postagem = $Postagens['ID'];
                                        $caminho = 'Imagem_Para_Posteres/';
                                        echo 
                                        '
                                            <div class="testecontainer">
                                                <div class="titlePostViewNoticeCategory">'.$Postagens['Título'].'</div>
                                                <div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagens['Imagem'].'" class="ImgSrcViewPost"></div>
                                                <div class="BtnPostViewNoticeCategory"><a href="PreviewPost.php?id='.$id_Postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div>
                                            </div>
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
                                echo "consulta não executada";
                            }
                        }
                        else
                        {
                            echo "Banco não encontrada";
                        }
                    }
                    catch(PDOException $error)
                    {
                        echo "Error MySQL ['".$error->getMessage()."']";   
                    }
                }
            ?>
        </div>
    </section>
    <section class="ContainerCategory" id="HORROR">
        <div class="Category">
        HORROR
        </div>
    </section>
    <section class="PostsAll">
    <div class="containerPosts">
            <?php
                if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
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
                            $sql_Acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                            $stmt_Acao = $conn->prepare($sql_Acao);
                            $stmt_Acao->bindValue(':categoria','horror');
                            if($stmt_Acao->execute())
                            {
                                if($stmt_Acao->rowCount() > 0)
                                {
                                    $row = $stmt_Acao->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $Dados)
                                    {
                                        $newNamesPostagens = ['ID','Título','Imagem','Descricao','Categoria','ID_Autor'];
                                        $ValuesPostagens = array_values($Dados);
                                        $Postagens = [];
                                        $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $Postagens[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                        }
                                        $id_Postagem = $Postagens['ID'];
                                        $caminho = 'Imagem_Para_Posteres/';
                                        echo 
                                        '
                                            <div class="testecontainer">
                                                <div class="titlePostViewNoticeCategory">'.$Postagens['Título'].'</div>
                                                <div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagens['Imagem'].'" class="ImgSrcViewPost"></div>
                                                <div class="BtnPostViewNoticeCategory"><a href="PreviewPost.php?id='.$id_Postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div>
                                            </div>
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
                                echo "consulta não executada";
                            }
                        }
                        else
                        {
                            echo "Banco não encontrada";
                        }
                    }
                    catch(PDOException $error)
                    {
                        echo "Error MySQL ['".$error->getMessage()."']";   
                    }
                }
            ?>
        </div>
    </section>
    <section class="ContainerCategory">
        <div class="Category">
            FIM 
        </div>
    </section>
     <?php
        require_once("PopUp.php");
    ?>
    <footer>
        <div class="ContainerFooter">
            <div class="LogoSiteFooter">
                <img src="Img/Logo.png" class="ImgFooter">
            </div>
            <div class="containerLinksAndTitlesFooter">
                Contato
                <div class="containerTopicosFooter">
                    <ul class="TopicosFooters">
                        <li class="TopicoFooter"><i class="fi fi-sr-envelope" id="Email"></i><a href="mailto:conquestGo@gmail.com" class="LinkRodape" id="Email-contato">E-mail Coorpativo</li>
                        <li class="TopicoFooter"><i class="fi fi-sr-circle" id="Form"></i><a href="Form.html" class="LinkRodape" id="Formulario-contato">Formulário de Contato</a></li>
                        <li class="TopicoFooter">
                            <ul class="TopicosFooters">
                                <li class="TopicoFooter"><i class="fi fi-brands-instagram" id="Instagram"></i><a href="https://www.instagram.com/ConquestGO.com/" class="LinkRodape" id="Instagram">Instagram</a></li>
                                <li class="TopicoFooter"><i class="fi fi-brands-twitter-alt" id="Twitter"></i><a href="https://twitter.com/intent/tweet?text=Olá,%20estou%20enviando%20um%20tweet%20através%20de%20um%20link" class="LinkRodape" id="Twitter">Twitter</a></li>
                                <li class="TopicoFooter"><i class="fi fi-brands-facebook-messenger" id="Facebook"></i><a href="https://www.facebook.com/ConquestGO" class="LinkRodape" id="Facebook">Facebook</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="containerLinksAndTitlesFooter">
                Navegação Rápida
                <div class="containerTopicosFooter">
                    <ul class="TopicosFooters">
                        <li class="TopicoFooter"><i class="fas fa-gamepad" id="Game"></i><a href="#" class="LinkRodape" id="Categorias_de_Jogos-NavegacaoRapida(Explicacao)">Categorias de Jogos</a></li>
                        <li class="TopicoFooter"><i class="fi fi-rr-stats" id="analysis"></i><a href="#" class="LinkRodape" id="Análises-NavegacaoRapida(Explicacao)">Análises</a></li>
                        <li class="TopicoFooter"><i class="fi fi-ss-notes" id="Notices"></i><a href="#" class="LinkRodape" id="Notícias-NavegacaoRapida(Explicacao)">Notícias</a></li>
                        <li class="TopicoFooter"><i class="fi fi-sr-user" id="Usuario"></i><a href="#" class="LinkRodape" id="Guia_do_Usuário-NavegacaoRapida(Explicacao)">Guia do Usuário</a></li>
                    </ul>
                </div>
            </div>
            <div class="containerLinksAndTitlesFooter">
                Políticas do Site
                <div class="containerTopicosFooter">
                    <ul class="TopicosFooters">
                        <li class="TopicoFooter"><i class="fi fi-rr-info" id="PPP"></i><a href="#" class="LinkRodape" id="Política_de_Privacidade-PoliticasDoSite">Política de Privacidade</a></li>
                        <li class="TopicoFooter"><i class="fi fi-sr-room-service" id="TS"></i><a href="#" class="LinkRodape" id="Termos_de_Serviço-PoliticasDoSite">Termos de Serviço</a></li>
                        <li class="TopicoFooter"><i class="fi fi-rr-cookie-alt" id="PC"></i><a href="#" class="LinkRodape" id="Política_de_Cookies-PoliticasDoSite">Política de Cookies</a></li>
                    </ul>
                </div>
            </div>
            <div class="containerLinksAndTitlesFooter">
                Créditos
                <div class="containerTopicosFooter">
                    <ul class="TopicosFooters">
                        <li class="TopicoFooter"><i class="fi fi-rr-users-alt" id="EE"></i><a href="#" class="LinkRodape" id="Equipe_Editorial-Creditos">Equipe Editorial</a></li>
                        <li class="TopicoFooter"><i class="fi fi-rr-users" id="Autores"></i><a href="#" class="LinkRodape" id="Autores-Creditos">Autores</a></li>
                        <li class="TopicoFooter"><i class="fi fi-rs-devices" id="developer"></i><a href="#" class="LinkRodape" id="Desenvolvedores-Creditos">Desenvolvedores</a></li>
                        <li class="TopicoFooter"><i class="fi fi-sr-picture" id="desings"></i><a href="#" class="LinkRodape" id="Designers-Creditos">Designers</a></li>
                    </ul>
                </div>
            </div>
            <div class="containerLinksAndTitlesFooter">
                Copyright e Direitos Autorais
                <div class="containerTopicosFooter">
                    <ul class="TopicosFooters">
                        <li class="TopicoFooter"><i class="fi fi-rr-hexagon-exclamation" id="Alert"></i><a href="#" class="LinkRodape" id="Informações_sobre_Direitos_Autorais-CopyRight">Informações sobre Direitos Autorais</a></li>
                        <li class="TopicoFooter"><i class="fi fi-sr-exclamation" id="Warning"></i><a href="#" class="LinkRodape" id="Uso_de_Conteúdo-CopyRight">Uso de Conteúdo</a></li>
                    </ul>
                </div>
            </div>
            <div class="containerLinksAndTitlesFooter">
                Links Úteis
                <div class="containerTopicosFooter">
                    <ul class="TopicosFooters">
                        <li class="TopicoFooter"><i class="fi fi-sr-handshake" id="Parceria"></i><a href="#" class="LinkRodape" id="Parceiros-LinksUteis">Parceiros</a></li>
                        <li class="TopicoFooter"><i class="fi fi-br-link" id="link"></i><a href="#" class="LinkRodape" id="Sites_Afiliados-LinksUteis">Sites Afiliados</a></li>
                        <li class="TopicoFooter"><i class="fi fi-rr-resources" id="recurso"></i><a href="#" class="LinkRodape" id="Recursos_Relacionados-LinksUteis">Recursos Relacionados</a></li>
                    </ul>
                </div>
            </div>
            <div class="containerLinksAndTitlesFooter">
                FAQ (Perguntas Frequentes)
                <div class="containerTopicosFooter">
                    <ul class="TopicosFooters">
                        <li class="TopicoFooter"><i class="fi fi-rr-comment-question" id="FAQ"></i><a href="#" class="LinkRodape" id="Perguntas_Frequentes-FAQ">Perguntas Frequentes</a></li>
                    </ul>
                </div>
            </div>
            <div class="containerLinksAndTitlesFooter">
                Política de Cookies
                <div class="containerTopicosFooter">
                    <ul class="TopicosFooters">
                        <li class="TopicoFooter"><i class="fi fi-ss-cookie-alt" id="PC"></i><a href="#" class="LinkRodape" id="Informações_sobre_o_Uso_de_Cookies-Cookies">Informações sobre o Uso de Cookies</a></li>
                        <li class="TopicoFooter"><i class="fi fi-ss-cookie-alt" id="PC"></i><a href="#" class="LinkRodape" id="Opções_de_Configuração_de_Cookies-Cookies">Opções de Configuração de Cookies</a></li>
                    </ul>
                </div>
            </div>
            <div class="containerLinksAndTitlesFooter">
                Como Postar ? 
                <div class="containerTopicosFooter">
                    <ul class="TopicosFooters">
                        <li class="TopicoFooter"><i class="fi fi-ss-copyright" id="AutorIcon"></i><a href="#" class="LinkRodape" id="TornarSeAutor">Como me Tornar um Autor ?</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>