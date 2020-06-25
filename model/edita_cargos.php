<?php
include "banco.php";
$cargo = $_POST["id_edt_cargo"];
$setor = $_POST["id_edt_setor"];
$nivel = $_POST["id_edt_nivel"];
$cbo = $_POST["id_edt_cbo"];
$salario = $_POST["id_edt_salario"];
$descricao = $_POST["id_edt_descricao"];
$id = $_POST["modalId"];

$executa = "UPDATE tb_cargo SET cargo='$cargo', setor='$setor', nivel='$nivel', cbo='$cbo', salario='$salario', descricao='$descricao' WHERE tb_cargo.id_cargo='$id'";
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Edição realizada!');window.location.href='../view/cargos.php'</script>";

?>
