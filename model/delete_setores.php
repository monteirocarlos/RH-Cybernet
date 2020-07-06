<?php
include('banco.php');
$id = intval($_GET['id_setor']);
$sql_code = "DELETE FROM tb_setores WHERE id_setor = '$id'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
if($sql_query)
	echo "<script>
	alert('Cargo deletado com sucesso!');
	location.href='../view/setores.php';
</script>";
else 
	echo "<script>
	alert('Erro ao deletar usuário.');
	location.href='../index.php';
</script>";
?>
