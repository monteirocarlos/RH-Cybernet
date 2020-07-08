<?php

include "banco.php";

$colaborador = $_POST["grava_promocao_colaborador"];
$setor_cargo = $_POST["grava_promocao_setor"];
$antigo_cargo = $_POST["grava_promocao_antigo_cargo"];
$novo_cargo = $_POST["grava_promocao_novo_cargo"];
$categoria_cargo = ($_POST["grava_promocao_categoria"]);
$salario_anterior = ($_POST["grava_promocao_antigo_salario"]);
$salario_novo = ($_POST["grava_promocao_novo_salario"]);
$data_promocao =($_POST["grava_promocao_data"]);

$executa = "INSERT INTO tb_promocoes (colaborador, setor, antigo_cargo, novo_cargo, categoria_cargo, salario_anterior, salario_posterior, data_promocao) VALUES ('$colaborador', '$setor_cargo', '$antigo_cargo', '$novo_cargo', '$categoria_cargo', '$salario_anterior', '$salario_novo', '$data_promocao')";
      
$query = $mysqli->query($executa);

$executa = "UPDATE tb_colaboradores SET setor='$setor_cargo', cargo='$novo_cargo', categoria='$categoria_cargo' WHERE tb_colaboradores.nome='$colaborador'";

$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Promoção realizada!');window.location.href='../view/promocoes.php'</script>";

?>
