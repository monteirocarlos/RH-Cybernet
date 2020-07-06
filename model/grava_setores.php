<?php

include "banco.php";

$setor = $_POST["grava_setor"];

$executa = "INSERT INTO tb_setores (nome) VALUES ('$setor')";
      
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Setor cadastrado!');window.location.href='../view/setores.php'</script>";

?>
