<?php
include "banco.php";
$nome = $_POST["edita_usuario_nome"];
$senha = md5 ($_POST["edita_usuario_senha"]);
$id = $_POST["modalId"];

$executa = "UPDATE tb_usuarios SET nome='$nome', senha='$senha' WHERE tb_usuarios.id_usuario='$id'";
$query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Edição realizada!');window.location.href='../view/usuarios.php'</script>";

?>

