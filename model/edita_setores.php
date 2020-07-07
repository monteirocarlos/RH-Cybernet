<?php
include "banco.php";
$setor = $_POST["edita_setor"];
$id = $_POST["modalId"];

$executa = "UPDATE tb_setores SET nome='$setor' WHERE tb_setores.id_setor='$id'";
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Edição realizada!');window.location.href='../view/setores.php'</script>";

?>
