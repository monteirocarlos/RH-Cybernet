<?php
include('banco.php');
$id = intval($_GET['id_usuario']);
$sql_code = "DELETE FROM tb_usuarios WHERE id_usuario = '$id'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
if($sql_query)
	echo "<script>
	alert('Usuário deletado com sucesso!');
	location.href='../view/usuarios.php';
</script>";
else 
	echo "<script>
	alert('Erro ao deletar usuário.');
	location.href='../index.php';
</script>";
?>


