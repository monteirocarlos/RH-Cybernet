<?php

include "banco.php";

$nome = $_POST["grava_colaborador_nome"];
$cpf = ($_POST["grava_colaborador_cpf"]);
$rg = ($_POST["grava_colaborador_rg"]);
$nascimento = $_POST["grava_colaborador_nascimento"];
$admissao = $_POST["grava_colaborador_admissao"];
$sexo = $_POST["grava_colaborador_sexo"];
$email = ($_POST["grava_colaborador_email"]);
$cep = ($_POST["grava_colaborador_cep"]);
$rua = ($_POST["grava_colaborador_rua"]);
$bairro = ($_POST["grava_colaborador_bairro"]);
$numero = ($_POST["grava_colaborador_numero"]);
$cidade = ($_POST["grava_colaborador_cidade"]);
$setor = ($_POST["grava_colaborador_setor"]);
$cargo = ($_POST["grava_colaborador_cargo"]);
$categoria = ($_POST["grava_colaborador_categoria"]);
$condicao = ($_POST["grava_colaborador_condicao"]);

$executa = "INSERT INTO tb_teste (nome, cpf, rg, nascimento, admissao, sexo, email, cep, rua, bairro, numero, cidade, setor, cargo, categoria) VALUES ('$nome','$cpf','$rg','$nascimento','$admissao','$sexo','$email',
'$cep','$rua','$bairro','$numero','$cidade','$setor','$cargo','$categoria')";
      
$query = $mysqli->query($executa);
echo"<script language='javascript' type='text/javascript'>alert('Cadastrado!');window.location.href='../view/colaboradores_teste.php'</script>";
?>

