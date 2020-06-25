<?php

include "banco.php";

$cargo = $_POST["id_cargo"];
$setor = $_POST["id_setor"];
$nivel = $_POST["id_nivel"];
$cbo = ($_POST["id_cbo"]);
$salario = ($_POST["id_salario"]);
$descricao = ($_POST["id_descricao"]);

$executa = "INSERT INTO tb_cargo (cargo, setor, nivel, cbo, salario, descricao) VALUES ('$cargo', '$setor', '$nivel', '$cbo', '$salario', '$descricao')";
      
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Cargo cadastrado!');window.location.href='../view/cargos.php'</script>";

?>