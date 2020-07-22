<?php

include "banco.php";

$colaborador = $_POST["grava_ferias_colaborador"];
$cargo = $_POST["grava_ferias_cargo"];
$setor = $_POST["grava_ferias_setor"];
$salario = $_POST["grava_ferias_salario"];
$abono = $_POST["grava_ferias_abono"];
$adiantamento = ($_POST["grava_ferias_adiantamento"]);
$data_inicial = ($_POST["grava_ferias_data"]);

$executa = "INSERT INTO tb_ferias (colaborador, cargo, setor, salario, abono, adiantamento, data_inicial) VALUES ('$colaborador', '$cargo', '$setor', '$salario', '$abono', '$adiantamento', '$data_inicial')";
      
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Férias agendada!');window.location.href='../view/ferias.php'</script>";

?>
