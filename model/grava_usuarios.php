<?php

include "banco.php";

$nome = $_POST["grava_usuario_nome"];
$usuario = $_POST["grava_usuario_usuario"];
$senha = md5($_POST["grava_usuario_senha"]);

$executa = "INSERT INTO tb_usuarios (nome, usuario, senha) VALUES ('$nome', '$usuario', '$senha')";
      
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado!');window.location.href='../view/usuarios.php'</script>";

?>
