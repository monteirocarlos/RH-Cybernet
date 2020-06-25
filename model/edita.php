<?php
include "banco.php";
$nome = $_POST["modalnome"];
$endereco = $_POST["modalendereco"];
$cpf = $_POST["modalcpf"];
$rg = $_POST["modalrg"];
$ativo = $_POST["modalativo"];
$sexo = $_POST["modalsexo"];
$cargo = $_POST["modalcargo"];
$telefone = $_POST["modaltelefone"];
$email = $_POST["modalemail"];
$nascimento = $_POST["modalnascimento"];
$id = $_POST["modalId"];

$executa = "UPDATE tb_colaboradores SET nome='$nome', nascimento='$nascimento', endereco='$endereco', cpf='$cpf', rg='$rg', ativo='$ativo', id_sexo='$sexo', id_cargo='$cargo', telefone='$telefone', email='$email' WHERE tb_colaboradores.id_colaborador='$id'";
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Edição realizada!');window.location.href='../view/colaboradores.php'</script>";

?>
