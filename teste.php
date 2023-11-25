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
            $sql = "SELECT COUNT(*) AS total_de_postagens FROM postagens WHERE categoria = :categoria";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':categoria','acao');
            if($stmt->execute())
            {
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($row as $Dados)
                {
                    echo '                        <li class="listasPainelDeControle"><a href="#" class="PainelDeControleEstatisticas">Postagens tem da categoria Ação:                '.implode('',array_values($Dados)).' </a></li>';
                }
            }
        }
        else
        {

        }
    }
    catch(PDOException $error)
    {
        echo "Error SQL: [".$error->getMessage()."]";
    }
?>