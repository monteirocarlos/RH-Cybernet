<?php
include "banco.php";
$nome = $_POST["modalnome"];
$id = $_POST["modalId"];
$executa = "UPDATE tb_colaboradores SET nome='$nome' WHERE tb_colaboradores.id_colaborador='$id'";
$query = $mysqli->query($executa);
?>
