<?php

include "abrir_banco.php";


$nome = $_POST["nome"];
$nascimento = $_POST["email"];
$sexo = $_POST["sexo"];
$cpf = ($_POST["cpf"]);
$rg = ($_POST["rg"]);
$email = ($_POST["email"]);
$endereco = ($_POST["endereco"]);
$telefone = ($_POST["telefone"]);
$cargo = ($_POST["cargo"]);
$ativo = ($_POST["ativo"]);

$executa = "INSERT INTO tb_colaboradores (nome, nascimento, sexo, cpf, rg, email, endereco, telefone, cargo, ativo) VALUES ('$nome','$nascimento','$sexo','$cpf','$rg',
'$email','$endereco','$telefone','$cargo','$ativo')";
      
$query = $mysqli->query($executa);

?>

