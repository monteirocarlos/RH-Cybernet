<?php
include "banco.php";
$nome = $_POST["edita_colaborador_nome"];

$cpf = ($_POST["edita_colaborador_cpf"]);
$rg = ($_POST["edita_colaborador_rg"]);
$nascimento = $_POST["edita_colaborador_nascimento"];
$admissao = $_POST["edita_colaborador_admissao"];
$sexo = $_POST["edita_colaborador_sexo"];
$telefone = ($_POST["edita_colaborador_telefone"]);
$celular = ($_POST["edita_colaborador_celular"]);
$email = ($_POST["edita_colaborador_email"]);
$cep = ($_POST["edita_colaborador_cep"]);
$rua = ($_POST["edita_colaborador_rua"]);
$bairro = ($_POST["edita_colaborador_bairro"]);
$numero = ($_POST["edita_colaborador_numero"]);
$cidade = ($_POST["edita_colaborador_cidade"]);
$setor = ($_POST["edita_colaborador_setor"]);
$cargo = ($_POST["edita_colaborador_cargo"]);
$categoria = ($_POST["edita_colaborador_categoria"]);
$condicao = ($_POST["edita_colaborador_condicao"]);
$id = $_POST["modalId"];

$executa = "UPDATE tb_colaboradores SET nome='$nome', cpf='$cpf', rg='$rg', nascimento='$nascimento', admissao='$admissao', sexo='$sexo', telefone='$telefone', celular='$celular', email='$email', cep='$cep', rua='$rua', bairro='$bairro', numero='$numero', cidade='$cidade', condicao='$condicao' WHERE tb_colaboradores.id_colaborador='$id'";
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Edição realizada!');window.location.href='../view/colaboradores.php'</script>";
?>
