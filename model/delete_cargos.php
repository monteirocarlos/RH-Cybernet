<?php
include('banco.php');
$id = intval($_GET['id_cargo']);
$sql_code = "DELETE FROM tb_cargo WHERE id_cargo = '$id'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
if($sql_query)
	echo "<script>
	alert('Cargo deletado com sucesso!');
	location.href='../view/cargos.php';
</script>";
else 
	echo "<script>
	alert('Erro ao deletar usuário.');
	location.href='../index.php';
</script>";
?>
