<?php
$id = $_REQUEST["id"];
$nome = $_REQUEST["nome"];
$cpf = $_REQUEST["cpf"];
$cod_arma = $_REQUEST["cod_arma"];

if(empty($id)){
    $sql = "insert into ficha(nome,cpf,cod_arma) values('$nome','$cpf','$cod_arma')";
}
else{
    $sql = "update lista set nome='$nome', cpf='$cpf', cod_arma='$cod_arma' where id='$id'";
}
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
    $resp = mysqli_query($c,$sql);
    if(!$resp)
    {
        echo "erro na consulta $sql";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }
    else{
        header("location: lista.php");
    }
    
?>