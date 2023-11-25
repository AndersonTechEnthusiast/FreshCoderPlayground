<body>
    <!-- Parallax Welcome -->
    <section class="Parallax">
        <div class="Front-Info">
            <div class="Img-logo"><img src="Img/Logo.png" alt=""></div>
            <div class="Text-Welcome">Bem Vindo, Administrador <?php echo $_SESSION['Administrador']['nome']; ?></div>
        </div>
    </section>
    <!-- Fim do Parallax Welcome-->
    <!-- Sumario Eletronico -->
    <section class="SumarioSuave">
        <div class="container-SumarioSuave">
            <div class="Sumario">
                <div class="LogoSite"> Conquest GO </div>
                <div class="ContainerOptions">
                    <div class="containerLinks"><a href="#section1" class="sumariosLinks">Painel de controle</a></div>
                    <div class="containerLinks"><a href="#section2" class="sumariosLinks">Postagens</a></div>
                    <div class="containerLinks"><a href="#section3" class="sumariosLinks">Editar Postagens</a></div>
                    <div class="containerLinks"><a href="#section4" class="sumariosLinks">Excluir Postagens</a></div>
                    <div class="containerLinks"><a href="#section5" class="sumariosLinks">Usuarios </a></div>
                    <div class="containerLinks"><a href="#section6" class="sumariosLinks">Autor</a></div>
                    <div class="containerLinks"><a href="#section7" class="sumariosLinks">Ver Postagens Completas</a></div>
                    <div class="containerLinks"><a href="#section8" class="sumariosLinks">Gerencimento de Riscos</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim do Sumario Eletronico-->
    <!-- Imagem de Perfil do Administrador -->
    <section class="ContainerPhotoPerfil">
        <div class="containerPhoto">
            <a href="#" id="Modal-Link-Perfil-PopUp">
                <?php
                    if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
                    {
                        if($_SESSION['Administrador']['Photo'] != null)
                        {
                            $Caminho = 'Caminho_Imagens_De_Perfil/';
                            echo '<img src="'.$Caminho.$_SESSION['Administrador']['Photo'].'"  class="imgcampactPhoto">';
                        }
                        else
                        if($_SESSION['Administrador']['Photo'] == null)
                        {
                            echo '<img src="Img/PadrãoFotoPerfil.png"  class="imgcampactPhoto">';
                        }
                    }
                ?>
            </a>
        </div>
    </section>
<!-- Fim da Imagem de Perfil do Administrador -->
    <!-- PopUp Perfil -->
    <div class="overlayPopUpPerfil" id="PerfilViewOverlay"></div>
    <div class="modalPopUpPerfil" id="PerfilViewModal">
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
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
                            {
                                if($_SESSION['Administrador']['Photo'] != null)
                                {
                                    $caminho = 'Caminho_Imagens_De_Perfil/';
                                    echo 
                                    '
                                    <form class="FormPhoto" id="Photo" method="POST" action="Insertion_Photo.php" enctype="multipart/form-data">
                                        <label for="inImg">
                                            <img src="'.$caminho.$_SESSION['Administrador']['Photo'].'" name="Padrao" class="PhotoPreview" id="image">
                                        </label>
                                        <input type="hidden" name="Name" value="Photo">
                                        <input type="file" name="Photo" class="PhotoFile" id="inImg">
                                        <input type="submit" value="Enviar FOTO">
                                    </form>
                                    ';
                                }
                                else
                                if($_SESSION['Administrador']['Photo'] == null)
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
                                 <?php echo $_SESSION['Administrador']['nome'];?>
                                 <input type="hidden" name="valueNome" value="<?php echo $_SESSION['Administrador']['nome'];?>">
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
                                 <?php echo $_SESSION['Administrador']['email'];?>
                                 <input type="hidden" name="valueEmail" value="<?php echo $_SESSION['Administrador']['email'];?>">
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
                                 <?php echo $_SESSION['Administrador']['telefone'];?>
                                 <input type="hidden" name="valueTelefone" value="<?php echo $_SESSION['Administrador']['telefone'];?>">
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
                                 <?php echo base64_encode($_SESSION['Administrador']['senha']);?>
                                 <input type="hidden" name="valueSenha" value="<?php echo $_SESSION['Administrador']['senha'];?>">
                                 <label class="labelSubmit" for="senhasubmit">
                                    <i class="fi fi-sr-pencil"></i>
                                 </label>
                                 <input type="submit" class="InputsSubmitsPopUpPreviewLogin" id="senhasubmit">
                                </form>
                            </fieldset>
                        </div>
                        <div class="container-Dados-View" id="container-Dados-View-nivel_de_acesso">
                            <fieldset class="container-Dados" id="container-Dados-nivel_de_acesso">
                                <?php echo $_SESSION['Administrador']['nivel_acessos'];?> 
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
    <!-- Fim do PopUp Perfil-->
    <!-- Mensagem para o Administrador-->
    <section class="Mensage">
        <span class="text">
            <p class="title"><b>Bem-vindo ao Conquest Go - O Epicentro da Cultura Gamer!</b></p>
            <p><b>Caro(a) Administrador(a),</b></p>
            <p>É um prazer recebê-lo(a) como parte essencial da equipe do Conquest Go, o ponto de encontro definitivo para todos os amantes da cultura dos games! Como administrador, você desempenha um papel crucial na formação e no sucesso desta comunidade dinâmica.</p>
            <p><b>Suas Responsabilidades:</b></p>
            <p><b>Painel de Controle Poderoso:</b></p>
            <p>Explore e utilize todas as funcionalidades do nosso avançado painel de controle para otimizar a experiência do usuário.</p>
            <p><b>Postagens Impactantes:</b></p>
            <p>Compartilhe e promova conteúdos que fascinem e cativem a comunidade gamer.</p>
            <p>Esteja sempre atento(a) às últimas novidades para manter nossos usuários atualizados.</p>
            <p><b>Edição e Aprimoramento:</b></p>
            <p>Aperfeiçoe as postagens para garantir qualidade e relevância.</p>
            <p>Seja ágil na incorporação de informações adicionais e atualizações.</p>
            <p><b>Zeladoria da Qualidade:</b></p>
            <p>Exerça seu poder de exclusão para manter um padrão elevado em nosso conteúdo.</p>
            <p>Certifique-se de que cada postagem contribua para a riqueza da cultura gamer.</p>
            <p><b>Comunidade Unida:</b></p>
            <p>Lidere a manutenção de um ambiente saudável e inclusivo.</p>
            <p>Ofereça suporte e resolução de problemas para garantir uma experiência positiva aos usuários.</p>
            <p><b>Autoria Exclusiva:</b></p>
            <p>Distribua responsabilidades de autoria para diversificar e ampliar a variedade de tópicos.</p>
            <p>Encoraje colaboradores a compartilhar suas perspectivas únicas.</p>
            <p><b>Visão Integral:</b></p>
            <p>Explore postagens em sua totalidade para assegurar que cada conteúdo atenda aos padrões do Conquest Go.</p>
            <p><b>Vigilância contra Riscos:</b></p>
            <p>Esteja atento(a) a possíveis ameaças e tome medidas proativas para proteger a integridade da comunidade.</p>
            <p>Agradecemos sua dedicação à causa gamer e à construção desta plataforma vibrante. O Conquest Go é tão grandioso quanto a paixão que você traz para ele. Juntos, elevaremos a experiência gamer a novos patamares!</p>
            <p>Que a jornada seja épica!</p>
            <p>Saudações,</p>
            <p>Equipe Conquest Go</b></p>
        </span>
    </section>
    <!-- Fim da Mensagem para Administrador-->
    <!-- Painel de Controle -->
    <div class="TituloEndRoll" id="section1">
        <div class="Indice"><b>Painel de Controle</b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="PainelDeControle">
        <div class="containerPainelDeControle">
            <div class="ViewPainelDeControle">
                <div class="containerImgLogin">
                    <?php
                        if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
                        {
                            $caminho = 'Caminho_Imagens_De_Perfil/';
                            if($_SESSION['Administrador']['Photo'] != null)
                            {
                                echo '<img src="'.$caminho.$_SESSION['Administrador']['Photo'].'" class="ImgLogin">';
                            }
                            else
                            if($_SESSION['Adminsitrador']['Photo'] == null)
                            {
                                echo '<img src="Img/PadrãoFotoPerfil.png" class="ImgLogin">';
                            }
                        }
                    ?>
                </div>
                <div class="containerListras">
                    <ul class="containerListrasView">
                       <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_usuarios FROM usuarios WHERE nivel_acessos = :nivel_acessos";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':nivel_acessos','usuario');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Cadastros com nivel de acessos de usuario:      '.implode('',array_values($Dados)).' Usuarios </a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                        <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_usuarios FROM usuarios WHERE nivel_acessos = :nivel_acessos";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':nivel_acessos','autor');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Cadastros com nivel de acessos de usuario:      '.implode('',array_values($Dados)).' Autores </a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                       <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens";
                                        $stmt = $conn->prepare($sql);
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem no conquest Go:                   '.implode('',array_values($Dados)).' Postagens </a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                       <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens WHERE categoria = :categoria";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':categoria','acao');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem da categoria Ação:                '.implode('',array_values($Dados)).' Postagens de Ação </a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                       <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens WHERE categoria = :categoria";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':categoria','aventura');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem da categoria Aventura:            '.implode('',array_values($Dados)).' Postagens de Aventura</a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                        <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens WHERE categoria = :categoria";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':categoria','rpg');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem da categoria RPG:                 '.implode('',array_values($Dados)).' Postagens de RPG</a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                        <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens WHERE categoria = :categoria";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':categoria','estrategia');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem da categoria Estratégia:          '.implode('',array_values($Dados)).' Postagens de Estratégia </a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                       <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens WHERE categoria = :categoria";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':categoria','simulacao');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem da categoria Simulação:           '.implode('',array_values($Dados)).' Postagens de Simulação</a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                       <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens WHERE categoria = :categoria";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':categoria','esportes');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem da categoria Esportes :           '.implode('',array_values($Dados)).' Postagens de Esportes</a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                       <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens WHERE categoria = :categoria";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':categoria','corrida');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '<li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem da categoria corrida:             '.implode('',array_values($Dados)).' Postagens de Corridas</a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                        <?php
                            if($_SESSION['Administrador']['Login'] == true && $_SESSION['Administrador']['nivel_acessos'] == 'Administrador')
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
                                        $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens WHERE categoria = :categoria";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bindValue(':categoria','horror');
                                        if($stmt->execute())
                                        {
                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row as $Dados)
                                            {
                                                echo '                        <li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem da categoria horror:              '.implode('',array_values($Dados)).' Postagens de Horror</a></li>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo 'Banco de Dados não encontrado';
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL: [".$error->getMessage()."]";
                                }
                            }
                       ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim do Painel de Controle -->
    <!-- Postagens -->
    <div class="TituloEndRoll" id="section2">
        <div class="Indice"><b>Postagens</b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="Postagens">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Títutlo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Nome do Autor</th>
              </tr>
            </thead>
            <tbody>
            <?php
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
                        $sql = "SELECT*FROM Postagens";
                        $stmt = $conn->prepare($sql);
                        if($stmt->execute())
                        {
                            if($stmt->rowCount() > 0)
                            {
                                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach($row as $dados)
                                {
                                    echo "<tr>";
                                        $newNamesViewPost = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                        $valuesViewPost = array_values($dados);
                                        $ViewPosts = [];
                                        $count = ((count($newNamesViewPost))+(count($valuesViewPost)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $ViewPosts[$newNamesViewPost[$i]] = $valuesViewPost[$i];
                                        }
                                        echo '<th scope="row">'.htmlspecialchars($ViewPosts['ID']).'</th>';
                                        echo '<td>'.htmlspecialchars($ViewPosts['Título']).'</td>';
                                        echo '<td>'.htmlspecialchars($ViewPosts['Categoria']).'</td>';
                                        $sql_NomeDoAutor = "SELECT nome FROM usuarios WHERE id = :id";
                                        $stmt_NomeDoAutor = $conn->prepare($sql_NomeDoAutor);
                                        $stmt_NomeDoAutor->bindValue(':id',$ViewPosts['ID_Autor']);
                                        if($stmt_NomeDoAutor->execute())
                                        {
                                            if($stmt_NomeDoAutor->rowCount() > 0)
                                            {
                                                $row = $stmt_NomeDoAutor->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Nome)
                                                {
                                                    echo '<td>'.htmlspecialchars(implode('',array_values($Nome))).'</td>';
                                                }
                                            }
                                            else
                                            {
                                                echo "Nenhuma Linha Afetada";
                                            }
                                        }
                                        else
                                        {
                                            echo "Consulta Não Executou";
                                        }
                                    echo "</tr>";
                                }
                            }
                            else
                            {
                                echo "Nenhuma Linha Afetada";
                            }
                        }
                        else
                        {
                            echo "Consulta não executou";
                        }
                    }
                    else
                    {
                        echo "Banco de Dados não encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            ?>
            </tbody>
        </table>      
    </section>
    <div class="TituloEndRoll" id="section3">
        <div class="Indice"><b>Editar Postagens </b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="Postagens">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Títutlo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Nome do Autor</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>
            <?php
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
                        $sql = "SELECT*FROM Postagens";
                        $stmt = $conn->prepare($sql);
                        if($stmt->execute())
                        {
                            if($stmt->rowCount() > 0)
                            {
                                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach($row as $dados)
                                {
                                    echo "<tr>";
                                        $newNamesViewPost = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                        $valuesViewPost = array_values($dados);
                                        $ViewPosts = [];
                                        $count = ((count($newNamesViewPost))+(count($valuesViewPost)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $ViewPosts[$newNamesViewPost[$i]] = $valuesViewPost[$i];
                                        }
                                        echo '<th scope="row">'.htmlspecialchars($ViewPosts['ID']).'</th>';
                                        echo '<td>'.htmlspecialchars($ViewPosts['Título']).'</td>';
                                        echo '<td>'.htmlspecialchars($ViewPosts['Categoria']).'</td>';
                                        $sql_NomeDoAutor = "SELECT nome FROM usuarios WHERE id = :id";
                                        $stmt_NomeDoAutor = $conn->prepare($sql_NomeDoAutor);
                                        $stmt_NomeDoAutor->bindValue(':id',$ViewPosts['ID_Autor']);
                                        if($stmt_NomeDoAutor->execute())
                                        {
                                            if($stmt_NomeDoAutor->rowCount() > 0)
                                            {
                                                $row = $stmt_NomeDoAutor->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Nome)
                                                {
                                                    echo '<td>'.htmlspecialchars(implode('',array_values($Nome))).'</td>';
                                                }
                                            }
                                            else
                                            {
                                                echo "Nenhuma Linha Afetada";
                                            }
                                        }
                                        else
                                        {
                                            echo "Consulta Não Executou";
                                        }
                                        echo 
                                        "<td>
                                            <form method='POST' action='Administrador/Coletar-Novas-Noticia-Editar.php'>
                                                <input type='hidden' name='id' value='".$ViewPosts['ID']."'>
                                                <input type='hidden' name='titulo' value='".$ViewPosts['Título']."'>
                                                <input type='hidden' name='imagem' value='".$ViewPosts['Imagem']."'>
                                                <input type='hidden' name='descricao' value='".$ViewPosts['Descrição']."'>
                                                <input type='hidden' name='categoria' value='".$ViewPosts['Categoria']."'>
                                                <button type='submit' class='btn btn-primary'>Editar</button>
                                            </form>
                                        </td>";
                                    echo "</tr>";
                                }
                            }
                            else
                            {
                                echo "Nenhuma Linha Afetada";
                            }
                        }
                        else
                        {
                            echo "Consulta não executou";
                        }
                    }
                    else
                    {
                        echo "Banco de Dados não encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            ?>
            </tbody>
        </table>  
    </section>
    <div class="TituloEndRoll" id="section4">
        <div class="Indice"><b>Excluir Postagens </b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="Postagens">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Títutlo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Nome do Autor</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
            <?php
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
                        $sql = "SELECT*FROM Postagens";
                        $stmt = $conn->prepare($sql);
                        if($stmt->execute())
                        {
                            if($stmt->rowCount() > 0)
                            {
                                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach($row as $dados)
                                {
                                    echo "<tr>";
                                        $newNamesViewPost = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                        $valuesViewPost = array_values($dados);
                                        $ViewPosts = [];
                                        $count = ((count($newNamesViewPost))+(count($valuesViewPost)))/2;
                                        for($i = 0; $i < $count; $i++)
                                        {
                                            $ViewPosts[$newNamesViewPost[$i]] = $valuesViewPost[$i];
                                        }
                                        echo '<th scope="row">'.htmlspecialchars($ViewPosts['ID']).'</th>';
                                        echo '<td>'.htmlspecialchars($ViewPosts['Título']).'</td>';
                                        echo '<td>'.htmlspecialchars($ViewPosts['Categoria']).'</td>';
                                        $sql_NomeDoAutor = "SELECT nome FROM usuarios WHERE id = :id";
                                        $stmt_NomeDoAutor = $conn->prepare($sql_NomeDoAutor);
                                        $stmt_NomeDoAutor->bindValue(':id',$ViewPosts['ID_Autor']);
                                        if($stmt_NomeDoAutor->execute())
                                        {
                                            if($stmt_NomeDoAutor->rowCount() > 0)
                                            {
                                                $row = $stmt_NomeDoAutor->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Nome)
                                                {
                                                    echo '<td>'.htmlspecialchars(implode('',array_values($Nome))).'</td>';
                                                }
                                            }
                                            else
                                            {
                                                echo "Nenhuma Linha Afetada";
                                            }
                                        }
                                        else
                                        {
                                            echo "Consulta Não Executou";
                                        }
                                        echo 
                                        "<td>
                                            <form method='POST' action='Administrador/Excluir-Postagem.php'>
                                                <input type='hidden' name='id' value='".$ViewPosts['ID']."'>
                                                <input type='hidden' name='titulo' value='".$ViewPosts['Título']."'>
                                                <input type='hidden' name='descricao' value='".$ViewPosts['Descrição']."'>
                                                <input type='hidden' name='categoria' value='".$ViewPosts['Categoria']."'>
                                                <button type='submit' class='btn btn-danger'>Excluir</button>
                                            </form>
                                        </td>";
                                    echo "</tr>";
                                }
                            }
                            else
                            {
                                echo "Nenhuma Linha Afetada";
                            }
                        }
                        else
                        {
                            echo "Consulta não executou";
                        }
                    }
                    else
                    {
                        echo "Banco de Dados não encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            ?>
            </tbody>
        </table>  
    </section>
    <!-- Fim das Postagens -->
    <!-- Usuarios -->
    <div class="TituloEndRoll" id="section5">
        <div class="Indice"><b>Usuarios</b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="Postagens">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nivel de Acessos</th>
              </tr>
            </thead>
            <tbody>
            <?php
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
                       $sql = "SELECT*FROM usuarios WHERE nivel_acessos = :nivel_acessos";
                       $stmt = $conn->prepare($sql);
                       $stmt->bindValue(':nivel_acessos','usuario');
                       if($stmt->execute())
                       {
                        if($stmt->rowCount() > 0)
                        {
                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $dados)
                            {
                                echo "<tr>";
                                    $newNamesUser = ['ID','Nome','Email','Telefone','Senha','Nivel_de_Acesso'];
                                    $ValuesUser = array_values($dados);
                                    $Usuario = [];
                                    $count = ((count($newNamesUser))+(count($ValuesUser)))/2;
                                    for($i = 0; $i < $count; $i++)
                                    {
                                        $Usuario[$newNamesUser[$i]] = $ValuesUser[$i];
                                    }
                                    echo '<th scope="row">'.htmlspecialchars($Usuario['ID']).'</th>';
                                    echo '<td>'.htmlspecialchars($Usuario['Nome']).'</td>';
                                    echo '<td>'.htmlspecialchars($Usuario['Email']).'</td>';
                                    echo '<td>'.htmlspecialchars($Usuario['Nivel_de_Acesso']).'</td>';  
                                echo "</tr>";

                            }
                        }
                        else
                        {
                            echo "Nenhuma Linha Afetada";
                        }
                       }
                       else
                       {
                        echo "Consulta não executada";
                       }
                    }
                    else
                    {
                        echo "Banco de Dados não encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            ?>
            </tbody>
        </table>      
    </section>
    <div class="TituloEndRoll">
        <div class="Indice"><b>Editar Usuarios</b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="Postagens">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nivel de Acessos</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>
            <?php
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
                       $sql = "SELECT*FROM usuarios WHERE nivel_acessos = :nivel_acessos";
                       $stmt = $conn->prepare($sql);
                       $stmt->bindValue(':nivel_acessos','usuario');
                       if($stmt->execute())
                       {
                        if($stmt->rowCount() > 0)
                        {
                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $dados)
                            {
                                echo "<tr>";
                                    $newNamesUser = ['ID','Nome','Email','Telefone','Senha','Nivel_de_Acesso'];
                                    $ValuesUser = array_values($dados);
                                    $Usuario = [];
                                    $count = ((count($newNamesUser))+(count($ValuesUser)))/2;
                                    for($i = 0; $i < $count; $i++)
                                    {
                                        $Usuario[$newNamesUser[$i]] = $ValuesUser[$i];
                                    }
                                    echo '<th scope="row">'.htmlspecialchars($Usuario['ID']).'</th>';
                                    echo '<td>'.htmlspecialchars($Usuario['Nome']).'</td>';
                                    echo '<td>'.htmlspecialchars($Usuario['Email']).'</td>';
                                    echo '<td>'.htmlspecialchars($Usuario['Nivel_de_Acesso']).'</td>'; 
                                    echo 
                                    "<td>
                                        <form method='POST' action='Administrador/Coletar-Novas-Usuario-Editar.php'>
                                            <input type='hidden' name='id' value='".$Usuario['ID']."'>
                                            <input type='hidden' name='nivel_acessos' value='".$Usuario['Nivel_de_Acesso']."'>
                                            <button type='submit' class='btn btn-primary'>Editar</button>
                                        </form>
                                    </td>"; 
                                echo "</tr>";

                            }
                        }
                        else
                        {
                            echo "Nenhuma Linha Afetada";
                        }
                       }
                       else
                       {
                        echo "Consulta não executada";
                       }
                    }
                    else
                    {
                        echo "Banco de Dados não encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            ?>
            </tbody>
        </table>  
    </section>
    <div class="TituloEndRoll">
        <div class="Indice"><b>Excluir Usuarios </b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="Postagens">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nivel de Acessos</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
            <?php
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
                       $sql = "SELECT*FROM usuarios WHERE nivel_acessos = :nivel_acessos";
                       $stmt = $conn->prepare($sql);
                       $stmt->bindValue(':nivel_acessos','usuario');
                       if($stmt->execute())
                       {
                        if($stmt->rowCount() > 0)
                        {
                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $dados)
                            {
                                echo "<tr>";
                                    $newNamesUser = ['ID','Nome','Email','Telefone','Senha','Nivel_de_Acesso'];
                                    $ValuesUser = array_values($dados);
                                    $Usuario = [];
                                    $count = ((count($newNamesUser))+(count($ValuesUser)))/2;
                                    for($i = 0; $i < $count; $i++)
                                    {
                                        $Usuario[$newNamesUser[$i]] = $ValuesUser[$i];
                                    }
                                    echo '<th scope="row">'.htmlspecialchars($Usuario['ID']).'</th>';
                                    echo '<td>'.htmlspecialchars($Usuario['Nome']).'</td>';
                                    echo '<td>'.htmlspecialchars($Usuario['Email']).'</td>';
                                    echo '<td>'.htmlspecialchars($Usuario['Nivel_de_Acesso']).'</td>'; 
                                    echo 
                                    "<td>
                                        <form method='POST' action='Administrador/Excluir-Usuario.php'>
                                            <input type='hidden' name='id' value='".$Usuario['ID']."'>
                                            <input type='hidden' name='nivel_acessos' value='".$Usuario['Nivel_de_Acesso']."'>
                                            <button type='submit' class='btn btn-danger'>Excluir</button>
                                        </form>
                                    </td>"; 
                                echo "</tr>";

                            }
                        }
                        else
                        {
                            echo "Nenhuma Linha Afetada";
                        }
                       }
                       else
                       {
                        echo "Consulta não executada";
                       }
                    }
                    else
                    {
                        echo "Banco de Dados não encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            ?>
            </tbody>
        </table>  
    </section>
    <!-- Fim das Usuarios-->
    <!-- Autor -->
    <div class="TituloEndRoll" id="section6">
        <div class="Indice"><b>Autores</b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="Postagens">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nivel de Acessos</th>
              </tr>
            </thead>
            <tbody>
            <?php
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
                       $sql = "SELECT*FROM usuarios WHERE nivel_acessos = :nivel_acessos";
                       $stmt = $conn->prepare($sql);
                       $stmt->bindValue(':nivel_acessos','autor');
                       if($stmt->execute())
                       {
                        if($stmt->rowCount() > 0)
                        {
                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $dados)
                            {
                                echo "<tr>";
                                    $newNamesAutor = ['ID','Nome','Email','Telefone','Senha','Nivel_de_Acesso'];
                                    $ValuesAutor = array_values($dados);
                                    $Autor = [];
                                    $count = ((count($newNamesAutor))+(count($ValuesAutor)))/2;
                                    for($i = 0; $i < $count; $i++)
                                    {
                                        $Autor[$newNamesAutor[$i]] = $ValuesAutor[$i];
                                    }
                                    echo '<th scope="row">'.htmlspecialchars($Autor['ID']).'</th>';
                                    echo '<td>'.htmlspecialchars($Autor['Nome']).'</td>';
                                    echo '<td>'.htmlspecialchars($Autor['Email']).'</td>';
                                    echo '<td>'.htmlspecialchars($Autor['Nivel_de_Acesso']).'</td>';  
                                echo "</tr>";

                            }
                        }
                        else
                        {
                            echo "Nenhuma Linha Afetada";
                        }
                       }
                       else
                       {
                        echo "Consulta não executada";
                       }
                    }
                    else
                    {
                        echo "Banco de Dados não encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            ?>
            </tbody>
        </table>      
    </section>
    <div class="TituloEndRoll">
        <div class="Indice"><b>Editar Autores</b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="Postagens">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nivel de Acessos</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>
            <?php
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
                       $sql = "SELECT*FROM usuarios WHERE nivel_acessos = :nivel_acessos";
                       $stmt = $conn->prepare($sql);
                       $stmt->bindValue(':nivel_acessos','autor');
                       if($stmt->execute())
                       {
                        if($stmt->rowCount() > 0)
                        {
                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $dados)
                            {
                                echo "<tr>";
                                    $newNamesAutor = ['ID','Nome','Email','Telefone','Senha','Nivel_de_Acesso'];
                                    $ValuesAutor = array_values($dados);
                                    $Autor = [];
                                    $count = ((count($newNamesAutor))+(count($ValuesAutor)))/2;
                                    for($i = 0; $i < $count; $i++)
                                    {
                                        $Autor[$newNamesAutor[$i]] = $ValuesAutor[$i];
                                    }
                                    echo '<th scope="row">'.htmlspecialchars($Autor['ID']).'</th>';
                                    echo '<td>'.htmlspecialchars($Autor['Nome']).'</td>';
                                    echo '<td>'.htmlspecialchars($Autor['Email']).'</td>';
                                    echo '<td>'.htmlspecialchars($Autor['Nivel_de_Acesso']).'</td>'; 
                                    echo 
                                    "<td>
                                        <form method='POST' action='Administrador/Coletar-Novas-Autor-Editar.php'>
                                            <input type='hidden' name='id' value='".$Autor['ID']."'>
                                            <input type='hidden' name='nivel_acessos' value='".$Autor['Nivel_de_Acesso']."'>
                                            <button type='submit' class='btn btn-primary'>Editar</button>
                                        </form>
                                    </td>"; 
                                echo "</tr>";

                            }
                        }
                        else
                        {
                            echo "Nenhuma Linha Afetada";
                        }
                       }
                       else
                       {
                        echo "Consulta não executada";
                       }
                    }
                    else
                    {
                        echo "Banco de Dados não encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            ?>
            </tbody>
        </table>  
    </section>
    <div class="TituloEndRoll">
        <div class="Indice"><b>Excluir Autores</b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="Postagens">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nivel de Acessos</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php
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
                       $sql = "SELECT*FROM usuarios WHERE nivel_acessos = :nivel_acessos";
                       $stmt = $conn->prepare($sql);
                       $stmt->bindValue(':nivel_acessos','autor');
                       if($stmt->execute())
                       {
                        if($stmt->rowCount() > 0)
                        {
                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $dados)
                            {
                                echo "<tr>";
                                    $newNamesAutor = ['ID','Nome','Email','Telefone','Senha','Nivel_de_Acesso'];
                                    $ValuesAutor = array_values($dados);
                                    $Autor = [];
                                    $count = ((count($newNamesAutor))+(count($ValuesAutor)))/2;
                                    for($i = 0; $i < $count; $i++)
                                    {
                                        $Autor[$newNamesAutor[$i]] = $ValuesAutor[$i];
                                    }
                                    echo '<th scope="row">'.htmlspecialchars($Autor['ID']).'</th>';
                                    echo '<td>'.htmlspecialchars($Autor['Nome']).'</td>';
                                    echo '<td>'.htmlspecialchars($Autor['Email']).'</td>';
                                    echo '<td>'.htmlspecialchars($Autor['Nivel_de_Acesso']).'</td>'; 
                                    echo 
                                    "<td>
                                        <form method='POST' action='Administrador/Excluir-Autor.php'>
                                            <input type='hidden' name='id' value='".$Autor['ID']."'>
                                            <input type='hidden' name='nivel_acessos' value='".$Autor['Nivel_de_Acesso']."'>
                                            <button type='submit' class='btn btn-danger'>Excluir</button>
                                        </form>
                                    </td>"; 
                                echo "</tr>";

                            }
                        }
                        else
                        {
                            echo "Nenhuma Linha Afetada";
                        }
                       }
                       else
                       {
                        echo "Consulta não executada";
                       }
                    }
                    else
                    {
                        echo "Banco de Dados não encontrado";
                    }
                }
                catch(PDOException $error)
                {
                    echo "Error SQL: ['".$error->getMessage()."']";
                }
            ?>
            </tbody>
        </table>  
    </section>
    <!-- Fim dos Autores -->
    <!-- Ver Postagens -->
    <div class="TituloEndRoll" id="section7">
        <div class="Indice"><b>Ver Postagens</b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="ViewPost">
      <div class="containerPosts">
        <?php
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
                    $sql = "SELECT*FROM postagens";
                    $stmt = $conn->prepare($sql);
                    if($stmt->execute())
                    {
                        if($stmt->rowCount() > 0)
                        {
                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $dados)
                            {
                                $newNamesViews = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                $ValuesViews = array_values($dados);
                                $Post = [];
                                $count = ((count($newNamesViews))+(count($ValuesViews)))/2;
                                for($i = 0; $i < $count; $i++)
                                {
                                    $Post[$newNamesViews[$i]] = $ValuesViews[$i];
                                }
                                $caminho = 'Imagem_Para_Posteres/';
                                echo 
                                '
                                    <div class="PostView">
                                        <div class="containerImg"><img src="'.$caminho.$Post['Imagem'].'" class="ImgPostsView"></div>
                                        <div class="containerInfoPostsView">
                                            <div class="infoPostView">'.$Post['ID'].'</div>
                                            <div class="infoPostView">'.$Post['Título'].'</div>
                                            <div class="infoPostView">'.$Post['Descrição'] .'</div>
                                            <div class="infoPostView">'.$Post['Categoria'].'</div>
                                            <div class="infoPostView">'.$Post['ID_Autor'].'</div>
                                        </div>
                                    </div>
                                ';

                            }
                        }
                        else
                        {
                            echo "nenhuma linha afetada";
                        }
                    }
                    else
                    {
                        echo "Consulta não executada";
                    }
                }
                else
                {
                    echo "Banco de Dados não foi Encontrado";
                }
            }
            catch(PDOException $error)
            {
                echo "Error SQL ['".$error->getMessage()."']";
            }
        ?>
      </div>
    </section>
    <!-- Fim de Ver Postagens -->
    <!-- Gerenciamento de riscos -->
    <div class="TituloEndRoll" id="section8">
        <div class="Indice"><b>Gerenciamento de Riscos</b></div>
        <div class="NameLog"><?php echo $_SESSION['Administrador']['nome']; ?></div>
    </div>
    <section class="GerenciamentoDeRisco">
        <div class="containerGDR">
          <form class="FormGDR" method="POST" action="Administrador/Excluir-Tabela-Posts.php">
            <h2>
              Gerenciamento de Riscos 
            </h2>
            <div class="containerButtons"><label class="TxtButtons">Resetar o Banco de Dados    </label><div class="containerSubmit"><input type="submit" class="buttonsGDR" id="Resetar_banco_de_dados"      name="Resetar_banco_de_dados"      value="Resetar o Bando de Dados">  </div></div>
          </form>
        </div>
    </section>
</body>