<?php
 
$form = <<<EOT
 
<form method="post" action="salvar.php">
    <input type="hidden" name="id" >
    <p>Nome: <input type="text" name="nome" size="40" ></p>
    <p>CPF: <input type="text" name="cpf" size="40" ></p>
    <p>Codigo da arma: <input type="text" name="cod_arma" size="40" ></p>
    <p><input type="submit" value="salva"></p>
</form>
 
EOT;
 
echo $form;
?>