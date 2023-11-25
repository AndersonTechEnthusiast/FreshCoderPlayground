<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();

    if($_SESSION['usuario']['Login'] == true && $_SESSION['usuario']['nivel_acessos'] == 'usuario')
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $valor = null;
            if(implode('',array_values($_POST)))
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
                    $sql_buscarPeloNomeTitle = "SELECT*FROM Postagens WHERE titulo = :titulo";
                    $stmt_buscarPeloNomeTitle = $conn->prepare($sql_buscarPeloNomeTitle);
                    $stmt_buscarPeloNomeTitle->bindValue(':titulo',implode('',array_values($_POST)));
                    if($stmt_buscarPeloNomeTitle->execute())
                    {
                        if($stmt_buscarPeloNomeTitle->rowCount() > 0)
                        {
                            $valor = implode('',array_values($_POST));
                        }
                        else
                        {
                            echo "Nenhuma Linha foi Afetada";
                        }
                    }
                    else
                    {
                        echo "Consulta Não executada";
                    }
                }
                else
                {
                    echo "Banco de Dados não Encontrado";
                }
                }
                catch(PDOException $error)
                {
                echo "Error MySQL: ['".$error->getMessage()."']";
                } 
            }
            else
            {
                $palavras_chave_Acao = [
                    'Jogos_de_ação'         => strpos(strtolower(implode('',array_values($_POST))),'ação'),
                    'Jogos_de_acao'         => strpos(strtolower(implode('',array_values($_POST))),'acao'),
                    'Jogos_de_armas'        => strpos(strtolower(implode(array_values($_POST))),'armas'),
                    'Jogos_de_luta'         => strpos(strtolower(implode('',array_values($_POST))),'luta'),
                    'Jogos_de_batalha'      => strpos(strtolower(implode('',array_values($_POST))),'batalha'),
                    'Jogos_de_confronto'    => strpos(strtolower(implode('',array_values($_POST))),'confronto'),
                    'Jogo_de_Duelo'         => strpos(strtolower(implode('',array_values($_POST))),'duelo')
                ];
                $palavras_chave_Aventura = [
                    'Jogos_de_Aventura'     => strpos(strtolower(implode('',array_values($_POST))),'aventura'),
                    'Jogos_de_Exploração'   => strpos(strtolower(implode('',array_values($_POST))),'exploração'),
                    'Jogos_de_Exploracao'   => strpos(strtolower(implode('',array_values($_POST))),'exploracao'),
                    'Jogos_de_Missões'      => strpos(strtolower(implode('',array_values($_POST))),'missões'),
                    'Jogos_de_Missoes'      => strpos(strtolower(implode('',array_values($_POST))),'missoes'),
                    'Jogos_de_Missão'       => strpos(strtolower(implode('',array_values($_POST))),'missão'),
                    'Jogos_de_Missao'       => strpos(strtolower(implode('',array_values($_POST))),'missao'),
                    'Jogos_de_Jornada'      => strpos(strtolower(implode('',array_values($_POST))),'jornada'),
                    'Jogos_de_Perigo'       => strpos(strtolower(implode('',array_values($_POST))),'perigo'),
                    'Jogos_de_Descoberta'   => strpos(strtolower(implode('',array_values($_POST))),'descoberta')
                ];
                $palavras_chaves_rpg = [
                    'Jogos_de_RPG'          => strpos(strtolower(implode('',array_values($_POST))),'rpg'),
                    'Jogos_de_Narrativa'    => strpos(strtolower(implode('',array_values($_POST))),'narrativa'),
                    'Jogos_de_Enredo'       => strpos(strtolower(implode('',array_values($_POST))),'enredo'),
                    'Jogos_de_História'     => strpos(strtolower(implode('',array_values($_POST))),'história'),
                    'Jogos_de_Historia'     => strpos(strtolower(implode('',array_values($_POST))),'historia'),
                    'Jogos_de_Mitologia'    => strpos(strtolower(implode('',array_values($_POST))),'mitologia'),
                    'Jogos_de_Reino'        => strpos(strtolower(implode('',array_values($_POST))),'reino'),
                    'Jogos_de_Universo'     => strpos(strtolower(implode('',array_values($_POST))),'universo'),
                    'Jogos_de_Mapa'         => strpos(strtolower(implode('',array_values($_POST))),'mapa'),
                    'Jogos_de_RPG_de_mesa'  => strpos(strtolower(implode('',array_values($_POST))),'rpg'),
                    'Jogos_de_Turnos'       => strpos(strtolower(implode('',array_values($_POST))),'turnos'),
                    'Jogos_de_Turno'        => strpos(strtolower(implode('',array_values($_POST))),'turno')
                ];
                $palavras_chaves_Estrategia = [
                    'Jogos_de_Tática'       => strpos(strtolower(implode('',array_values($_POST))),'tática'),
                    'Jogos_de_Tatica'       => strpos(strtolower(implode('',array_values($_POST))),'tatica'),
                    'Jogos_de_Estratégia'   => strpos(strtolower(implode('',array_values($_POST))),'estratégia'),
                    'Jogos_de_Estrategia'   => strpos(strtolower(implode('',array_values($_POST))),'estrategia'),
                    'Jogos_de_Planejamento' => strpos(strtolower(implode('',array_values($_POST))),'planejamento'),
                    'Jogos_de_Inteligência' => strpos(strtolower(implode('',array_values($_POST))),'inteligência'),
                    'Jogos_de_Inteligencia' => strpos(strtolower(implode('',array_values($_POST))),'inteligencia'),
                    'Jogos_de_Habilidade'   => strpos(strtolower(implode('',array_values($_POST))),'habilidade')
                ];
                $palavras_chaves_simulacao = [
                    'Simulação'             => strpos(strtolower(implode('',array_values($_POST))),'simulação'),
                    'Simulacao'             => strpos(strtolower(implode('',array_values($_POST))),'simulacao'),
                    'Realismo'              => strpos(strtolower(implode('',array_values($_POST))),'realismo'),
                    'Autenticidade'         => strpos(strtolower(implode('',array_values($_POST))),'autencidade'),
                    'Fidelidade'            => strpos(strtolower(implode('',array_values($_POST))),'fidelidade'),
                    'Simulação de vida'     => strpos(strtolower(implode('',array_values($_POST))),'simulação'),
                    'Simulação de vida'     => strpos(strtolower(implode('',array_values($_POST))),'simulacao'),
                    'Rotina diária'         => strpos(strtolower(implode('',array_values($_POST))),'diária'),
                    'Rotina diaria'         => strpos(strtolower(implode('',array_values($_POST))),'diaria'),
                    'Tomada de decisões'    => strpos(strtolower(implode('',array_values($_POST))),'decisões'),
                    'Tomada de decisoes'    => strpos(strtolower(implode('',array_values($_POST))),'decisoes'),
                    'Tomada de decisão'     => strpos(strtolower(implode('',array_values($_POST))),'decisão'),
                    'Tomada de decisao'     => strpos(strtolower(implode('',array_values($_POST))),'decisao'),
                    'Interatividade'        => strpos(strtolower(implode('',array_values($_POST))),'interatividade')
                ];
                $palavras_chave_esporte = [
                    'Esporte'               => strpos(strtolower(implode('',array_values($_POST))),'esportes'),
                    'Competição'            => strpos(strtolower(implode('',array_values($_POST))),'competição'),
                    'Competicao'            => strpos(strtolower(implode('',array_values($_POST))),'competicao'),
                    'Desafio esportivo'     => strpos(strtolower(implode('',array_values($_POST))),'desafio'),
                    'Rivalidade'            => strpos(strtolower(implode('',array_values($_POST))),'rivalidade'),
                    'Estádios'              => strpos(strtolower(implode('',array_values($_POST))),'estádios'),
                    'Estadios'              => strpos(strtolower(implode('',array_values($_POST))),'estadios'),
                    'Estádio'               => strpos(strtolower(implode('',array_values($_POST))),'estádio'),
                    'Estadio'               => strpos(strtolower(implode('',array_values($_POST))),'estadio'),
                    'Campos'                => strpos(strtolower(implode('',array_values($_POST))),'campos'),
                    'Arenas'                => strpos(strtolower(implode('',array_values($_POST))),'arenas')
                ];
                $palavras_chave_corrida = [
                    'Corrida'               => strpos(strtolower(implode('',array_values($_POST))),'corrida'),
                    'Velocidade'            => strpos(strtolower(implode('',array_values($_POST))),'velocidade'),
                    'Adrenalina'            => strpos(strtolower(implode('',array_values($_POST))),'adrenalina'),
                    'Perseguição'           => strpos(strtolower(implode('',array_values($_POST))),'perseguição'),
                    'Perseguicao'           => strpos(strtolower(implode('',array_values($_POST))),'perseguicao'),
                    'Perseguições'          => strpos(strtolower(implode('',array_values($_POST))),'perseguições'),
                    'Perseguicoes'          => strpos(strtolower(implode('',array_values($_POST))),'perseguicoes'),
                    'Pilotos'               => strpos(strtolower(implode('',array_values($_POST))),'pilotos'),
                    'Piloto'                => strpos(strtolower(implode('',array_values($_POST))),'piloto'),
                    'Pistas'                => strpos(strtolower(implode('',array_values($_POST))),'pistas'),
                    'Pista'                 => strpos(strtolower(implode('',array_values($_POST))),'pista'),
                    'Classificações'        => strpos(strtolower(implode('',array_values($_POST))),'classificações'),
                    'Classificacoes'        => strpos(strtolower(implode('',array_values($_POST))),'classificacoes'),
                    'Classificacão'         => strpos(strtolower(implode('',array_values($_POST))),'classificação'),
                    'Classificacao'         => strpos(strtolower(implode('',array_values($_POST))),'classificacao'),
                    'Ultrpassagens'         => strpos(strtolower(implode('',array_values($_POST))),'ultrapassagens'),
                    'Ultrpassagem'          => strpos(strtolower(implode('',array_values($_POST))),'ultrapagem'),
                    'Carros'                => strpos(strtolower(implode('',array_values($_POST))),'carros'),
                    'Carro'                 => strpos(strtolower(implode('',array_values($_POST))),'carro'),
                    'motos'                 => strpos(strtolower(implode('',array_values($_POST))),'motos'),
                    'moto'                  => strpos(strtolower(implode('',array_values($_POST))),'moto')
                ];
                $palavras_chaves_horror = [
                    'Horror'                => strpos(strtolower(implode('',array_values($_POST))),'horror'),
                    'Terror'                => strpos(strtolower(implode('',array_values($_POST))),'terror'),
                    'Sombrio'               => strpos(strtolower(implode('',array_values($_POST))),'sombrio'),
                    'Assustador'            => strpos(strtolower(implode('',array_values($_POST))),'assustador'),
                    'Tensão'                => strpos(strtolower(implode('',array_values($_POST))),'tensão'),
                    'Tensao'                => strpos(strtolower(implode('',array_values($_POST))),'tensao'),
                    'Suspense'              => strpos(strtolower(implode('',array_values($_POST))),'suspense'),
                    'Mistério'              => strpos(strtolower(implode('',array_values($_POST))),'mistério'),
                    'Misterio'              => strpos(strtolower(implode('',array_values($_POST))),'misterio'),
                    'Monstros'              => strpos(strtolower(implode('',array_values($_POST))),'monstro'),
                    'Escuridão'             => strpos(strtolower(implode('',array_values($_POST))),'escuridão'),
                    'Escuridao'             => strpos(strtolower(implode('',array_values($_POST))),'escuridao'),
                    'Desespero'             => strpos(strtolower(implode('',array_values($_POST))),'desespero')
                ];
                $palavras_chave = [
                    'Games_de_Ação' => $palavras_chave_Acao,
                    'Games_de_Aventura' => $palavras_chave_Aventura,
                    'Games_de_RPG' => $palavras_chaves_rpg,
                    'Games_de_Estratégia' => $palavras_chaves_Estrategia,
                    'Games_de_Simulação' => $palavras_chaves_simulacao,
                    'Games_de_Esporte' => $palavras_chave_esporte,
                    'Games_de_Corrida' => $palavras_chave_corrida,
                    'Games_de_Horror' => $palavras_chaves_horror
                ];
                foreach($palavras_chave as $Dados)
                {
                    foreach($Dados as $keys => $values)
                    {
                        if($values > 0)
                        
                        
                        if(
                            $keys == 'Jogos_de_ação'      ||
                            $keys == 'Jogos_de_acao'      ||
                            $keys == 'Jogos_de_armas'     ||
                            $keys == 'Jogos_de_luta'      ||
                            $keys == 'Jogos_de_batalha'   ||
                            $keys == 'Jogos_de_confronto' ||
                            $keys == 'Jogo_de_Duelo'      
                        )
                        {
                           $valor = strtoupper("Acao");
                        }
                        else
                        if(
                            $keys == 'Jogos_de_Aventura'   ||
                            $keys == 'Jogos_de_Exploração' ||
                            $keys == 'Jogos_de_Exploracao' ||
                            $keys == 'Jogos_de_Missões'    ||
                            $keys == 'Jogos_de_Missoes'    ||
                            $keys == 'Jogos_de_Missão'     ||
                            $keys == 'Jogos_de_Missao'     ||
                            $keys == 'Jogos_de_Jornada'    ||
                            $keys == 'Jogos_de_Perigo'     ||
                            $keys == 'Jogos_de_Descoberta'
                        )
                        {
                            $valor = strtoupper("Aventura");
                        }
                        else
                        if(
                            $keys == 'Jogos_de_RPG'         ||
                            $keys == 'Jogos_de_Narrativa'   ||
                            $keys == 'Jogos_de_Enredo'      ||
                            $keys == 'Jogos_de_História'    ||
                            $keys == 'Jogos_de_Historia'    ||
                            $keys == 'Jogos_de_Mitologia'   ||
                            $keys == 'Jogos_de_Reino'       ||
                            $keys == 'Jogos_de_Universo'    ||
                            $keys == 'Jogos_de_Mapa'        ||
                            $keys == 'Jogos_de_RPG_de_mesa' ||
                            $keys == 'Jogos_de_Turnos'      ||
                            $keys == 'Jogos_de_Turno'       
                        )
                        {
                           $valor = strtoupper("RPG");
                        }
                        else
                        if(
                            $keys == 'Jogos_de_Tática'       ||
                            $keys == 'Jogos_de_Tatica'       ||
                            $keys == 'Jogos_de_Estratégia'   ||
                            $keys == 'Jogos_de_Estrategia'   ||
                            $keys == 'Jogos_de_Planejamento' ||
                            $keys == 'Jogos_de_Inteligência' ||
                            $keys == 'Jogos_de_Inteligencia' ||
                            $keys == 'Jogos_de_Habilidade'   
                        )
                        {
                           $valor = strtoupper("Estratégia");
                        }
                        else
                        if(
                            $keys =='Simulação'              ||
                            $keys =='Simulacao'              ||
                            $keys == 'Realismo'              ||
                            $keys == 'Autenticidade'         ||
                            $keys == 'Fidelidade'            ||
                            $keys == 'Simulação de vida'     ||
                            $keys == 'Simulação de vida'     ||
                            $keys == 'Rotina diária'         ||
                            $keys == 'Rotina diaria'         ||
                            $keys == 'Tomada de decisões'    ||
                            $keys == 'Tomada de decisoes'    ||
                            $keys == 'Tomada de decisão'     ||
                            $keys == 'Tomada de decisao'     ||
                            $keys == 'Interatividade'        
                        )
                        {
                            $valor = strtoupper("Simulação");
                        }
                        else
                        if(
                            $keys == 'Esporte'               ||
                            $keys == 'Competição'            ||
                            $keys == 'Competicao'            ||
                            $keys == 'Desafio esportivo'     ||
                            $keys == 'Rivalidade'            ||
                            $keys == 'Estádios'              ||
                            $keys == 'Estadios'              ||
                            $keys == 'Estádio'               ||
                            $keys == 'Estadio'               ||
                            $keys == 'Campos'                ||
                            $keys == 'Arenas'                
                        )
                        {
                           $valor = strtoupper("Esportes");
                        }
                        else
                        if(
                            $keys == 'Corrida'               ||
                            $keys == 'Velocidade'            ||
                            $keys == 'Adrenalina'            ||
                            $keys == 'Perseguição'           ||
                            $keys == 'Perseguicao'           ||
                            $keys == 'Perseguições'          ||
                            $keys == 'Perseguicoes'          ||
                            $keys == 'Pilotos'               ||
                            $keys == 'Piloto'                ||
                            $keys == 'Pistas'                ||
                            $keys == 'Pista'                 ||
                            $keys == 'Classificações'        ||
                            $keys == 'Classificacoes'        ||
                            $keys == 'Classificacão'         ||
                            $keys == 'Classificacao'         ||
                            $keys == 'Ultrpassagens'         ||
                            $keys == 'Ultrpassagem'          ||
                            $keys == 'Carros'                ||
                            $keys == 'Carro'                 ||
                            $keys == 'motos'                 ||
                            $keys == 'moto'                  
                        )
                        {
                            $valor = strtoupper("Corrida");
                        }
                        else
                        if(
                            $keys == 'Horror'                ||
                            $keys == 'Terror'                ||
                            $keys == 'Sombrio'               ||
                            $keys == 'Assustador'            ||
                            $keys == 'Tensão'                ||
                            $keys == 'Tensao'                ||
                            $keys == 'Suspense'              ||
                            $keys == 'Mistério'              ||
                            $keys == 'Misterio'              ||
                            $keys == 'Monstros'              ||
                            $keys == 'Escuridão'             ||
                            $keys == 'Escuridao'             ||
                            $keys == 'Desespero'             
                        )
                        {
                            $valor = strtoupper("Horror");
                        }
                    }
                }
            }
            echo 
            '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="../Css/Search-Styles/PageValueSearch.css">
                <link rel="stylesheet" href="../Css/User/BarraDePesquisa.css">
                <link rel="stylesheet" href="../Css/User/containerPosts.css">
                <link rel="stylesheet" href="../Css/User/container-title.css">
                <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            </head>
            <body>
                 <section class="BarraDePesquisaContainer">
                    <form class="FormBarradePesquisa" method="POST" action="Result-Search.php">
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
                <section class="ContainerCategory">
                    <div class="Category">
                        '.$valor.'
                    </div>
                </section>
            ';
            if(implode('',array_values($_POST)))
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
                    $sql_buscarPeloNomeTitle = "SELECT*FROM Postagens WHERE titulo = :titulo";
                    $stmt_buscarPeloNomeTitle = $conn->prepare($sql_buscarPeloNomeTitle);
                    $stmt_buscarPeloNomeTitle->bindValue(':titulo',implode('',array_values($_POST)));
                    if($stmt_buscarPeloNomeTitle->execute())
                    {
                        if($stmt_buscarPeloNomeTitle->rowCount() > 0)
                        {
                            $Posts = $stmt_buscarPeloNomeTitle->fetchAll(PDO::FETCH_ASSOC);
                            foreach($Posts as $Post)
                            {
                                $newNamesForPost = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                $ValuesForPost = array_values($Post);
                                $count = ((count($newNamesForPost))+(count($ValuesForPost)))/2;
                                $Post_Select = [];
                                for($i = 0; $i < $count; $i++)
                                {
                                    $Post_Select[$newNamesForPost[$i]] = $ValuesForPost[$i];
                                }
                                $valor = $Post_Select['Categoria'];
                                $caminho = '../Imagem_Para_Posteres/';
                                $id_Post_Select = $Post_Select['ID'];
                                echo '<section class="PostsAll"><div class="containerPosts"><div class="testecontainer"><div class="titlePostViewNoticeCategory">'.$Post_Select['Título'].'</div><div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Post_Select['Imagem'].'" class="ImgSrcViewPost"></div><div class="BtnPostViewNoticeCategory"><a href="../PreviewPost.php?id='.$id_Post_Select.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div></div></div></section';
                            }
                        }
                        else
                        {
                            echo "Nenhuma Linha foi Afetada";
                        }
                    }
                    else
                    {
                        echo "Consulta Não executada";
                    }
                }
                else
                {
                    echo "Banco de Dados não Encontrado";
                }
                }
                catch(PDOException $error)
                {
                echo "Error MySQL: ['".$error->getMessage()."']";
                } 
            }
            else
            {
                $palavras_chave_Acao = [
                    'Jogos_de_ação'         => strpos(strtolower(implode('',array_values($_POST))),'ação'),
                    'Jogos_de_acao'         => strpos(strtolower(implode('',array_values($_POST))),'acao'),
                    'Jogos_de_armas'        => strpos(strtolower(implode(array_values($_POST))),'armas'),
                    'Jogos_de_luta'         => strpos(strtolower(implode('',array_values($_POST))),'luta'),
                    'Jogos_de_batalha'      => strpos(strtolower(implode('',array_values($_POST))),'batalha'),
                    'Jogos_de_confronto'    => strpos(strtolower(implode('',array_values($_POST))),'confronto'),
                    'Jogo_de_Duelo'         => strpos(strtolower(implode('',array_values($_POST))),'duelo')
                ];
                $palavras_chave_Aventura = [
                    'Jogos_de_Aventura'     => strpos(strtolower(implode('',array_values($_POST))),'aventura'),
                    'Jogos_de_Exploração'   => strpos(strtolower(implode('',array_values($_POST))),'exploração'),
                    'Jogos_de_Exploracao'   => strpos(strtolower(implode('',array_values($_POST))),'exploracao'),
                    'Jogos_de_Missões'      => strpos(strtolower(implode('',array_values($_POST))),'missões'),
                    'Jogos_de_Missoes'      => strpos(strtolower(implode('',array_values($_POST))),'missoes'),
                    'Jogos_de_Missão'       => strpos(strtolower(implode('',array_values($_POST))),'missão'),
                    'Jogos_de_Missao'       => strpos(strtolower(implode('',array_values($_POST))),'missao'),
                    'Jogos_de_Jornada'      => strpos(strtolower(implode('',array_values($_POST))),'jornada'),
                    'Jogos_de_Perigo'       => strpos(strtolower(implode('',array_values($_POST))),'perigo'),
                    'Jogos_de_Descoberta'   => strpos(strtolower(implode('',array_values($_POST))),'descoberta')
                ];
                $palavras_chaves_rpg = [
                    'Jogos_de_RPG'          => strpos(strtolower(implode('',array_values($_POST))),'rpg'),
                    'Jogos_de_Narrativa'    => strpos(strtolower(implode('',array_values($_POST))),'narrativa'),
                    'Jogos_de_Enredo'       => strpos(strtolower(implode('',array_values($_POST))),'enredo'),
                    'Jogos_de_História'     => strpos(strtolower(implode('',array_values($_POST))),'história'),
                    'Jogos_de_Historia'     => strpos(strtolower(implode('',array_values($_POST))),'historia'),
                    'Jogos_de_Mitologia'    => strpos(strtolower(implode('',array_values($_POST))),'mitologia'),
                    'Jogos_de_Reino'        => strpos(strtolower(implode('',array_values($_POST))),'reino'),
                    'Jogos_de_Universo'     => strpos(strtolower(implode('',array_values($_POST))),'universo'),
                    'Jogos_de_Mapa'         => strpos(strtolower(implode('',array_values($_POST))),'mapa'),
                    'Jogos_de_RPG_de_mesa'  => strpos(strtolower(implode('',array_values($_POST))),'rpg'),
                    'Jogos_de_Turnos'       => strpos(strtolower(implode('',array_values($_POST))),'turnos'),
                    'Jogos_de_Turno'        => strpos(strtolower(implode('',array_values($_POST))),'turno')
                ];
                $palavras_chaves_Estrategia = [
                    'Jogos_de_Tática'       => strpos(strtolower(implode('',array_values($_POST))),'tática'),
                    'Jogos_de_Tatica'       => strpos(strtolower(implode('',array_values($_POST))),'tatica'),
                    'Jogos_de_Estratégia'   => strpos(strtolower(implode('',array_values($_POST))),'estratégia'),
                    'Jogos_de_Estrategia'   => strpos(strtolower(implode('',array_values($_POST))),'estrategia'),
                    'Jogos_de_Planejamento' => strpos(strtolower(implode('',array_values($_POST))),'planejamento'),
                    'Jogos_de_Inteligência' => strpos(strtolower(implode('',array_values($_POST))),'inteligência'),
                    'Jogos_de_Inteligencia' => strpos(strtolower(implode('',array_values($_POST))),'inteligencia'),
                    'Jogos_de_Habilidade'   => strpos(strtolower(implode('',array_values($_POST))),'habilidade')
                ];
                $palavras_chaves_simulacao = [
                    'Simulação'             => strpos(strtolower(implode('',array_values($_POST))),'simulação'),
                    'Simulacao'             => strpos(strtolower(implode('',array_values($_POST))),'simulacao'),
                    'Realismo'              => strpos(strtolower(implode('',array_values($_POST))),'realismo'),
                    'Autenticidade'         => strpos(strtolower(implode('',array_values($_POST))),'autencidade'),
                    'Fidelidade'            => strpos(strtolower(implode('',array_values($_POST))),'fidelidade'),
                    'Simulação de vida'     => strpos(strtolower(implode('',array_values($_POST))),'simulação'),
                    'Simulação de vida'     => strpos(strtolower(implode('',array_values($_POST))),'simulacao'),
                    'Rotina diária'         => strpos(strtolower(implode('',array_values($_POST))),'diária'),
                    'Rotina diaria'         => strpos(strtolower(implode('',array_values($_POST))),'diaria'),
                    'Tomada de decisões'    => strpos(strtolower(implode('',array_values($_POST))),'decisões'),
                    'Tomada de decisoes'    => strpos(strtolower(implode('',array_values($_POST))),'decisoes'),
                    'Tomada de decisão'     => strpos(strtolower(implode('',array_values($_POST))),'decisão'),
                    'Tomada de decisao'     => strpos(strtolower(implode('',array_values($_POST))),'decisao'),
                    'Interatividade'        => strpos(strtolower(implode('',array_values($_POST))),'interatividade')
                ];
                $palavras_chave_esporte = [
                    'Esporte'               => strpos(strtolower(implode('',array_values($_POST))),'esportes'),
                    'Competição'            => strpos(strtolower(implode('',array_values($_POST))),'competição'),
                    'Competicao'            => strpos(strtolower(implode('',array_values($_POST))),'competicao'),
                    'Desafio esportivo'     => strpos(strtolower(implode('',array_values($_POST))),'desafio'),
                    'Rivalidade'            => strpos(strtolower(implode('',array_values($_POST))),'rivalidade'),
                    'Estádios'              => strpos(strtolower(implode('',array_values($_POST))),'estádios'),
                    'Estadios'              => strpos(strtolower(implode('',array_values($_POST))),'estadios'),
                    'Estádio'               => strpos(strtolower(implode('',array_values($_POST))),'estádio'),
                    'Estadio'               => strpos(strtolower(implode('',array_values($_POST))),'estadio'),
                    'Campos'                => strpos(strtolower(implode('',array_values($_POST))),'campos'),
                    'Arenas'                => strpos(strtolower(implode('',array_values($_POST))),'arenas')
                ];
                $palavras_chave_corrida = [
                    'Corrida'               => strpos(strtolower(implode('',array_values($_POST))),'corrida'),
                    'Velocidade'            => strpos(strtolower(implode('',array_values($_POST))),'velocidade'),
                    'Adrenalina'            => strpos(strtolower(implode('',array_values($_POST))),'adrenalina'),
                    'Perseguição'           => strpos(strtolower(implode('',array_values($_POST))),'perseguição'),
                    'Perseguicao'           => strpos(strtolower(implode('',array_values($_POST))),'perseguicao'),
                    'Perseguições'          => strpos(strtolower(implode('',array_values($_POST))),'perseguições'),
                    'Perseguicoes'          => strpos(strtolower(implode('',array_values($_POST))),'perseguicoes'),
                    'Pilotos'               => strpos(strtolower(implode('',array_values($_POST))),'pilotos'),
                    'Piloto'                => strpos(strtolower(implode('',array_values($_POST))),'piloto'),
                    'Pistas'                => strpos(strtolower(implode('',array_values($_POST))),'pistas'),
                    'Pista'                 => strpos(strtolower(implode('',array_values($_POST))),'pista'),
                    'Classificações'        => strpos(strtolower(implode('',array_values($_POST))),'classificações'),
                    'Classificacoes'        => strpos(strtolower(implode('',array_values($_POST))),'classificacoes'),
                    'Classificacão'         => strpos(strtolower(implode('',array_values($_POST))),'classificação'),
                    'Classificacao'         => strpos(strtolower(implode('',array_values($_POST))),'classificacao'),
                    'Ultrpassagens'         => strpos(strtolower(implode('',array_values($_POST))),'ultrapassagens'),
                    'Ultrpassagem'          => strpos(strtolower(implode('',array_values($_POST))),'ultrapagem'),
                    'Carros'                => strpos(strtolower(implode('',array_values($_POST))),'carros'),
                    'Carro'                 => strpos(strtolower(implode('',array_values($_POST))),'carro'),
                    'motos'                 => strpos(strtolower(implode('',array_values($_POST))),'motos'),
                    'moto'                  => strpos(strtolower(implode('',array_values($_POST))),'moto')
                ];
                $palavras_chaves_horror = [
                    'Horror'                => strpos(strtolower(implode('',array_values($_POST))),'horror'),
                    'Terror'                => strpos(strtolower(implode('',array_values($_POST))),'terror'),
                    'Sombrio'               => strpos(strtolower(implode('',array_values($_POST))),'sombrio'),
                    'Assustador'            => strpos(strtolower(implode('',array_values($_POST))),'assustador'),
                    'Tensão'                => strpos(strtolower(implode('',array_values($_POST))),'tensão'),
                    'Tensao'                => strpos(strtolower(implode('',array_values($_POST))),'tensao'),
                    'Suspense'              => strpos(strtolower(implode('',array_values($_POST))),'suspense'),
                    'Mistério'              => strpos(strtolower(implode('',array_values($_POST))),'mistério'),
                    'Misterio'              => strpos(strtolower(implode('',array_values($_POST))),'misterio'),
                    'Monstros'              => strpos(strtolower(implode('',array_values($_POST))),'monstro'),
                    'Escuridão'             => strpos(strtolower(implode('',array_values($_POST))),'escuridão'),
                    'Escuridao'             => strpos(strtolower(implode('',array_values($_POST))),'escuridao'),
                    'Desespero'             => strpos(strtolower(implode('',array_values($_POST))),'desespero')
                ];
                $palavras_chave = [
                    'Games_de_Ação' => $palavras_chave_Acao,
                    'Games_de_Aventura' => $palavras_chave_Aventura,
                    'Games_de_RPG' => $palavras_chaves_rpg,
                    'Games_de_Estratégia' => $palavras_chaves_Estrategia,
                    'Games_de_Simulação' => $palavras_chaves_simulacao,
                    'Games_de_Esporte' => $palavras_chave_esporte,
                    'Games_de_Corrida' => $palavras_chave_corrida,
                    'Games_de_Horror' => $palavras_chaves_horror
                ];
                foreach($palavras_chave as $Dados)
                {
                    foreach($Dados as $keys => $values)
                    {
                        if($values > 0)
                        {
                            if(
                                $keys == 'Jogos_de_ação'      ||
                                $keys == 'Jogos_de_acao'      ||
                                $keys == 'Jogos_de_armas'     ||
                                $keys == 'Jogos_de_luta'      ||
                                $keys == 'Jogos_de_batalha'   ||
                                $keys == 'Jogos_de_confronto' ||
                                $keys == 'Jogo_de_Duelo'      
                            )
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
                                        $sql_acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                                        $stmt_acao = $conn->prepare($sql_acao);
                                        $stmt_acao->bindValue(':categoria','acao');
                                        if($stmt_acao->execute())
                                        {
                                            if($stmt_acao->rowCount() > 0)
                                            {
                                                $row = $stmt_acao->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Informacoes)
                                                {
                                                    $newNamesPostagens = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                    $ValuesPostagens = array_values($Informacoes);
                                                    $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                                    $Postagem = [];
                                                    for($i = 0; $i < $count; $i++)
                                                    {
                                                        $Postagem[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                                    }
                                                    $valor = $Postagem['Categoria'];
                                                    $caminho = '../Imagem_Para_Posteres/';
                                                    $id_postagem = $Postagem['ID'];
                                                    echo '<section class="PostsAll"><div class="containerPosts"><div class="testecontainer"><div class="titlePostViewNoticeCategory">'.$Postagem['Título'].'</div><div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagem['Imagem'].'" class="ImgSrcViewPost"></div><div class="BtnPostViewNoticeCategory"><a href="../PreviewPost.php?id='.$id_postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div></div></div></section';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "erro na execução da consulta";
                                        }
                                    }
                                    else
                                    {
                                        echo "Banco de Dados não encontrado";
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL : ['".$error->getMessage()."']";
                                }
                            }
                            else
                            if(
                                $keys == 'Jogos_de_Aventura'   ||
                                $keys == 'Jogos_de_Exploração' ||
                                $keys == 'Jogos_de_Exploracao' ||
                                $keys == 'Jogos_de_Missões'    ||
                                $keys == 'Jogos_de_Missoes'    ||
                                $keys == 'Jogos_de_Missão'     ||
                                $keys == 'Jogos_de_Missao'     ||
                                $keys == 'Jogos_de_Jornada'    ||
                                $keys == 'Jogos_de_Perigo'     ||
                                $keys == 'Jogos_de_Descoberta'
                            )
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
                                        $sql_acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                                        $stmt_acao = $conn->prepare($sql_acao);
                                        $stmt_acao->bindValue(':categoria','aventuta');
                                        if($stmt_acao->execute())
                                        {
                                            if($stmt_acao->rowCount() > 0)
                                            {
                                                $row = $stmt_acao->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Informacoes)
                                                {
                                                    $newNamesPostagens = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                    $ValuesPostagens = array_values($Informacoes);
                                                    $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                                    $Postagem = [];
                                                    for($i = 0; $i < $count; $i++)
                                                    {
                                                        $Postagem[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                                    }
                                                    $valor = $Postagem['Categoria'];
                                                    $caminho = '../Imagem_Para_Posteres/';
                                                    $id_postagem = $Postagem['ID'];
                                                    echo '<section class="PostsAll"><div class="containerPosts"><div class="testecontainer"><div class="titlePostViewNoticeCategory">'.$Postagem['Título'].'</div><div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagem['Imagem'].'" class="ImgSrcViewPost"></div><div class="BtnPostViewNoticeCategory"><a href="../PreviewPost.php?id='.$id_postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div></div></div></section';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "erro na execução da consulta";
                                        }
                                    }
                                    else
                                    {
                                        echo "Banco de Dados não encontrado";
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL : ['".$error->getMessage()."']";
                                }
                            }
                            else
                            if(
                                $keys == 'Jogos_de_RPG'         ||
                                $keys == 'Jogos_de_Narrativa'   ||
                                $keys == 'Jogos_de_Enredo'      ||
                                $keys == 'Jogos_de_História'    ||
                                $keys == 'Jogos_de_Historia'    ||
                                $keys == 'Jogos_de_Mitologia'   ||
                                $keys == 'Jogos_de_Reino'       ||
                                $keys == 'Jogos_de_Universo'    ||
                                $keys == 'Jogos_de_Mapa'        ||
                                $keys == 'Jogos_de_RPG_de_mesa' ||
                                $keys == 'Jogos_de_Turnos'      ||
                                $keys == 'Jogos_de_Turno'       
                            )
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
                                        $sql_acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                                        $stmt_acao = $conn->prepare($sql_acao);
                                        $stmt_acao->bindValue(':categoria','rpg');
                                        if($stmt_acao->execute())
                                        {
                                            if($stmt_acao->rowCount() > 0)
                                            {
                                                $row = $stmt_acao->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Informacoes)
                                                {
                                                    $newNamesPostagens = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                    $ValuesPostagens = array_values($Informacoes);
                                                    $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                                    $Postagem = [];
                                                    for($i = 0; $i < $count; $i++)
                                                    {
                                                        $Postagem[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                                    }
                                                    $valor = $Postagem['Categoria'];
                                                    $caminho = '../Imagem_Para_Posteres/';
                                                    $id_postagem = $Postagem['ID'];
                                                    echo '<section class="PostsAll"><div class="containerPosts"><div class="testecontainer"><div class="titlePostViewNoticeCategory">'.$Postagem['Título'].'</div><div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagem['Imagem'].'" class="ImgSrcViewPost"></div><div class="BtnPostViewNoticeCategory"><a href="../PreviewPost.php?id='.$id_postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div></div></div></section';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "erro na execução da consulta";
                                        }
                                    }
                                    else
                                    {
                                        echo "Banco de Dados não encontrado";
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL : ['".$error->getMessage()."']";
                                }
                            }
                            else
                            if(
                                $keys == 'Jogos_de_Tática'       ||
                                $keys == 'Jogos_de_Tatica'       ||
                                $keys == 'Jogos_de_Estratégia'   ||
                                $keys == 'Jogos_de_Estrategia'   ||
                                $keys == 'Jogos_de_Planejamento' ||
                                $keys == 'Jogos_de_Inteligência' ||
                                $keys == 'Jogos_de_Inteligencia' ||
                                $keys == 'Jogos_de_Habilidade'   
                            )
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
                                        $sql_acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                                        $stmt_acao = $conn->prepare($sql_acao);
                                        $stmt_acao->bindValue(':categoria','estrategia');
                                        if($stmt_acao->execute())
                                        {
                                            if($stmt_acao->rowCount() > 0)
                                            {
                                                $row = $stmt_acao->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Informacoes)
                                                {
                                                    $newNamesPostagens = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                    $ValuesPostagens = array_values($Informacoes);
                                                    $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                                    $Postagem = [];
                                                    for($i = 0; $i < $count; $i++)
                                                    {
                                                        $Postagem[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                                    }
                                                    $valor = $Postagem['Categoria'];
                                                    $caminho = '../Imagem_Para_Posteres/';
                                                    $id_postagem = $Postagem['ID'];
                                                    echo '<section class="PostsAll"><div class="containerPosts"><div class="testecontainer"><div class="titlePostViewNoticeCategory">'.$Postagem['Título'].'</div><div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagem['Imagem'].'" class="ImgSrcViewPost"></div><div class="BtnPostViewNoticeCategory"><a href="../PreviewPost.php?id='.$id_postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div></div></div></section';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "erro na execução da consulta";
                                        }
                                    }
                                    else
                                    {
                                        echo "Banco de Dados não encontrado";
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL : ['".$error->getMessage()."']";
                                }
                            }
                            else
                            if(
                                $keys =='Simulação'              ||
                                $keys =='Simulacao'              ||
                                $keys == 'Realismo'              ||
                                $keys == 'Autenticidade'         ||
                                $keys == 'Fidelidade'            ||
                                $keys == 'Simulação de vida'     ||
                                $keys == 'Simulação de vida'     ||
                                $keys == 'Rotina diária'         ||
                                $keys == 'Rotina diaria'         ||
                                $keys == 'Tomada de decisões'    ||
                                $keys == 'Tomada de decisoes'    ||
                                $keys == 'Tomada de decisão'     ||
                                $keys == 'Tomada de decisao'     ||
                                $keys == 'Interatividade'        
                            )
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
                                        $sql_acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                                        $stmt_acao = $conn->prepare($sql_acao);
                                        $stmt_acao->bindValue(':categoria','simulacao');
                                        if($stmt_acao->execute())
                                        {
                                            if($stmt_acao->rowCount() > 0)
                                            {
                                                $row = $stmt_acao->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Informacoes)
                                                {
                                                    $newNamesPostagens = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                    $ValuesPostagens = array_values($Informacoes);
                                                    $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                                    $Postagem = [];
                                                    for($i = 0; $i < $count; $i++)
                                                    {
                                                        $Postagem[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                                    }
                                                    $valor = $Postagem['Categoria'];
                                                    $caminho = '../Imagem_Para_Posteres/';
                                                    $id_postagem = $Postagem['ID'];
                                                    echo '<section class="PostsAll"><div class="containerPosts"><div class="testecontainer"><div class="titlePostViewNoticeCategory">'.$Postagem['Título'].'</div><div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagem['Imagem'].'" class="ImgSrcViewPost"></div><div class="BtnPostViewNoticeCategory"><a href="../PreviewPost.php?id='.$id_postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div></div></div></section';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "erro na execução da consulta";
                                        }
                                    }
                                    else
                                    {
                                        echo "Banco de Dados não encontrado";
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL : ['".$error->getMessage()."']";
                                }
                            }
                            else
                            if(
                                $keys == 'Esporte'               ||
                                $keys == 'Competição'            ||
                                $keys == 'Competicao'            ||
                                $keys == 'Desafio esportivo'     ||
                                $keys == 'Rivalidade'            ||
                                $keys == 'Estádios'              ||
                                $keys == 'Estadios'              ||
                                $keys == 'Estádio'               ||
                                $keys == 'Estadio'               ||
                                $keys == 'Campos'                ||
                                $keys == 'Arenas'                
                            )
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
                                        $sql_acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                                        $stmt_acao = $conn->prepare($sql_acao);
                                        $stmt_acao->bindValue(':categoria','esportes');
                                        if($stmt_acao->execute())
                                        {
                                            if($stmt_acao->rowCount() > 0)
                                            {
                                                $row = $stmt_acao->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Informacoes)
                                                {
                                                    $newNamesPostagens = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                    $ValuesPostagens = array_values($Informacoes);
                                                    $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                                    $Postagem = [];
                                                    for($i = 0; $i < $count; $i++)
                                                    {
                                                        $Postagem[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                                    }
                                                    $valor = $Postagem['Categoria'];
                                                    $caminho = '../Imagem_Para_Posteres/';
                                                    $id_postagem = $Postagem['ID'];
                                                    echo '<section class="PostsAll"><div class="containerPosts"><div class="testecontainer"><div class="titlePostViewNoticeCategory">'.$Postagem['Título'].'</div><div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagem['Imagem'].'" class="ImgSrcViewPost"></div><div class="BtnPostViewNoticeCategory"><a href="../PreviewPost.php?id='.$id_postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div></div></div></section';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "erro na execução da consulta";
                                        }
                                    }
                                    else
                                    {
                                        echo "Banco de Dados não encontrado";
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL : ['".$error->getMessage()."']";
                                }
                            }
                            else
                            if(
                                $keys == 'Corrida'               ||
                                $keys == 'Velocidade'            ||
                                $keys == 'Adrenalina'            ||
                                $keys == 'Perseguição'           ||
                                $keys == 'Perseguicao'           ||
                                $keys == 'Perseguições'          ||
                                $keys == 'Perseguicoes'          ||
                                $keys == 'Pilotos'               ||
                                $keys == 'Piloto'                ||
                                $keys == 'Pistas'                ||
                                $keys == 'Pista'                 ||
                                $keys == 'Classificações'        ||
                                $keys == 'Classificacoes'        ||
                                $keys == 'Classificacão'         ||
                                $keys == 'Classificacao'         ||
                                $keys == 'Ultrpassagens'         ||
                                $keys == 'Ultrpassagem'          ||
                                $keys == 'Carros'                ||
                                $keys == 'Carro'                 ||
                                $keys == 'motos'                 ||
                                $keys == 'moto'                  
                            )
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
                                        $sql_acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                                        $stmt_acao = $conn->prepare($sql_acao);
                                        $stmt_acao->bindValue(':categoria','corrida');
                                        if($stmt_acao->execute())
                                        {
                                            if($stmt_acao->rowCount() > 0)
                                            {
                                                $row = $stmt_acao->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Informacoes)
                                                {
                                                    $newNamesPostagens = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                    $ValuesPostagens = array_values($Informacoes);
                                                    $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                                    $Postagem = [];
                                                    for($i = 0; $i < $count; $i++)
                                                    {
                                                        $Postagem[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                                    }
                                                    $valor = $Postagem['Categoria'];
                                                    $caminho = '../Imagem_Para_Posteres/';
                                                    $id_postagem = $Postagem['ID'];
                                                    echo '<section class="PostsAll"><div class="containerPosts"><div class="testecontainer"><div class="titlePostViewNoticeCategory">'.$Postagem['Título'].'</div><div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagem['Imagem'].'" class="ImgSrcViewPost"></div><div class="BtnPostViewNoticeCategory"><a href="../PreviewPost.php?id='.$id_postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div></div></div></section';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "erro na execução da consulta";
                                        }
                                    }
                                    else
                                    {
                                        echo "Banco de Dados não encontrado";
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL : ['".$error->getMessage()."']";
                                }
                            }
                            else
                            if(
                                $keys == 'Horror'                ||
                                $keys == 'Terror'                ||
                                $keys == 'Sombrio'               ||
                                $keys == 'Assustador'            ||
                                $keys == 'Tensão'                ||
                                $keys == 'Tensao'                ||
                                $keys == 'Suspense'              ||
                                $keys == 'Mistério'              ||
                                $keys == 'Misterio'              ||
                                $keys == 'Monstros'              ||
                                $keys == 'Escuridão'             ||
                                $keys == 'Escuridao'             ||
                                $keys == 'Desespero'             
                            )
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
                                        $sql_acao = "SELECT*FROM Postagens WHERE categoria = :categoria";
                                        $stmt_acao = $conn->prepare($sql_acao);
                                        $stmt_acao->bindValue(':categoria','horror');
                                        if($stmt_acao->execute())
                                        {
                                            if($stmt_acao->rowCount() > 0)
                                            {
                                                $row = $stmt_acao->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $Informacoes)
                                                {
                                                    $newNamesPostagens = ['ID','Título','Imagem','Descrição','Categoria','ID_Autor'];
                                                    $ValuesPostagens = array_values($Informacoes);
                                                    $count = ((count($newNamesPostagens))+(count($ValuesPostagens)))/2;
                                                    $Postagem = [];
                                                    for($i = 0; $i < $count; $i++)
                                                    {
                                                        $Postagem[$newNamesPostagens[$i]] = $ValuesPostagens[$i];
                                                    }
                                                    $valor = $Postagem['Categoria'];
                                                    $caminho = '../Imagem_Para_Posteres/';
                                                    $id_postagem = $Postagem['ID'];
                                                    echo '<section class="PostsAll"><div class="containerPosts"><div class="testecontainer"><div class="titlePostViewNoticeCategory">'.$Postagem['Título'].'</div><div class="ImgPostViewNoticeCategory"><img src="'.$caminho.$Postagem['Imagem'].'" class="ImgSrcViewPost"></div><div class="BtnPostViewNoticeCategory"><a href="../PreviewPost.php?id='.$id_postagem.'" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div></div></div></section';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "erro na execução da consulta";
                                        }
                                    }
                                    else
                                    {
                                        echo "Banco de Dados não encontrado";
                                    }
                                }
                                catch(PDOException $error)
                                {
                                    echo "Error SQL : ['".$error->getMessage()."']";
                                }
                            }
                            else
                            {
                                header("Location: Error_404.html");
                            }
                        }
                    }
                }
            }
        }
    }
?>
</body>
<script src="../JavasScript/User/Search-Validate.js"></script>
</html>
    <!-- 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../Css/Search-Styles/PageValueSearch.css">
        <link rel="stylesheet" href="../Css/User/BarraDePesquisa.css">
        <link rel="stylesheet" href="../Css/User/containerPosts.css">
        <link rel="stylesheet" href="../Css/User/container-title.css">
        <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
         <section class="BarraDePesquisaContainer">
            <form class="FormBarradePesquisa">
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
        <section class="ContainerCategory">
            <div class="Category">
                VALOR
            </div>
        </section>

        <section class="PostsAll">
            <div class="containerPosts">
               
            </div>
        </section>
    </body>
    <script src="../JavasScript/User/Search-Validate.js"></script>
    </html> 

    <div class="testecontainer">
                            <div class="titlePostViewNoticeCategory">teste</div>
                            <div class="ImgPostViewNoticeCategory"><img src="../Img/Post.webp" class="ImgSrcViewPost"></div>
                            <div class="BtnPostViewNoticeCategory"><a href="#" class="LinkPostView"><button class="ButtonViewPost"> Ver </button></a></div>
                        </div> -->