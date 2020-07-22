<?php

include "banco.php";

$colaborador = $_POST["grava_promocao_colaborador"];
$cargo_atual = $_POST["grava_promocao_cargo_atual"];
$setor_atual = $_POST["grava_promocao_setor_atual"];
$novo_cargo = $_POST["grava_promocao_novo_cargo"];
$novo_setor = ($_POST["grava_promocao_novo_setor"]);
$salario_atual = ($_POST["grava_promocao_salario_atual"]);
$novo_salario = ($_POST["grava_promocao_novo_salario"]);
$data_promocao =($_POST["grava_promocao_data"]);

$executa = "INSERT INTO tb_promocoes (colaborador, cargo_atual, setor_atual, novo_cargo, novo_setor, salario_atual, novo_salario, data_promocao) VALUES ('$colaborador', '$cargo_atual', '$setor_atual', '$novo_cargo', '$novo_setor', '$salario_atual', '$novo_salario', '$data_promocao')";

$query = $mysqli->query($executa);

$executa = "UPDATE tb_colaboradores SET setor='$novo_setor', cargo='$novo_cargo', salario='$novo_salario' WHERE tb_colaboradores.nome='$colaborador'";

$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Promoção realizada!');window.location.href='../view/promocoes.php'</script>";

?>
