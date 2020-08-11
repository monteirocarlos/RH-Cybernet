<?php

include "banco.php";

$vagas = $_POST["grava_vaga_vagas"];
$setor = $_POST["grava_vaga_setor"];
$periodo = $_POST["grava_vaga_periodo"];
$nivel = $_POST["grava_vaga_nivel"];
$status = $_POST["grava_vaga_status"];
$descricao = ($_POST["grava_vaga_descricao"]);

$executa = "INSERT INTO tb_vagas (vagas, setor, periodo, nivel, status_vaga, descricao) VALUES ('$vagas', '$setor', '$periodo', '$nivel', '$status', '$descricao')";
      
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Vaga inserida!');window.location.href='../view/vagas.php'</script>";

?>