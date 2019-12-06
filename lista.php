<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "fbi";
 
    $c = mysqli_connect($host,$usuario,$senha);
    if(!$c){
        echo "erro de conexão";
        echo mysqli_error($c);
        die();
    }
    if(!mysqli_select_db($c,$banco)){
        echo "erro no select_db";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }
    $sql = "select * from ficha";
    
    $resp = mysqli_query($c,$sql);
    if(!$resp){
        echo "erro na consulta!";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }

    $linha = mysqli_fetch_assoc($resp);
    if($linha){
        while($linha){
            echo "<div style=\"padding:10px;margin:5px;border:1px black solid;\">"
            ."id servidor publico militar: <b>{$linha["id"]}</b><br>"
            ."nome:<b>{$linha["nome"]}</b><br>"
            ."CPF: <b>{$linha["cpf"]}</b><br>"
            ."codigo da arma:<b>{$linha["cod_arma"]}</b><br>"
            ."<a href=\"deletar.php?id={$linha["id"]}\">Deleta</a>"
            ."||"
            ."<a href=\"atualizar.php?id={$linha["id"]}\">Editar</a>"
            ."</div>";
            $linha = mysqli_fetch_assoc($resp);
        }
    }
    else{
        echo "tabela vazia";
    }
    echo "<a href=\"formulario.php\">Incluir</a>";
    mysqli_free_result($resp);
    mysqli_close($c);
        
?>