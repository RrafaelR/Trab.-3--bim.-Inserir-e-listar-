<?php
    $id=$_REQUEST["id"];
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
    $sql = "select * from ficha where id = '$id'";
    $resp = mysqli_query($c,$sql);
    if(!$resp)
    {
        echo "erro na consulta $sql";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }
    $linha = mysqli_fetch_assoc($resp);
    if($linha){
        $nome = $linha["nome"];
        $cpf = $linha["cpf"];
        $cod_arma = $linha["cod_arma"];
        include formulario.php;
    }
    else{
        echo "Não encontrado";
    }
    mysqli_free_result($resp);
    mysqli_close($c);
?>