<?php
    $id = $_REQUEST["id"];

    if(!empty($id)){
        $sql = "delete from ficha where id = $id";

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
            echo "erro no select db";
            echo mysqli_error($c);
            mysqli_close($c);
            die();
        }

        $resp = mysqli_query($c,$sql);

        if(!$resp){
            echo "erro de consulta $sql";
            echo mysqli_error($c);
            mysqli_close($c);
            die();
        }
        else{
            header("location: lista.php");
        }
    }
    else{
        echo "ID não informado";
    }
?>
