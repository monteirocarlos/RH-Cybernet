<?php

include "banco.php";


$nome = $_POST["nome"];
$nascimento = $_POST["nascimento"];
$sexo = $_POST["sexo"];
$cpf = ($_POST["cpf"]);
$rg = ($_POST["rg"]);
$email = ($_POST["email"]);
$endereco = ($_POST["endereco"]);
$telefone = ($_POST["telefone"]);
$cargo = ($_POST["cargo"]);
$ativo = ($_POST["ativo"]);

$executa = "INSERT INTO tb_colaboradores (nome, nascimento, id_sexo, cpf, rg, email, endereco, telefone, id_cargo, ativo) VALUES ('$nome','$nascimento','$sexo','$cpf','$rg','$email','$endereco',
'$telefone','$cargo','$ativo')";
      
$query = $mysqli->query($executa);

echo "<fieldset>";
echo "<center><img src='checked.jpg' width='10%'>";
echo "<br><br><br>";
echo "<font color='red'>";
echo "<h1> Incluso realizada com sucesso<br>";
echo "<br><br>";
echo "<a href ='cadastro.html'>voltar</a></h1>";
echo "</font></center>";        
echo "</fieldset>";

?>


