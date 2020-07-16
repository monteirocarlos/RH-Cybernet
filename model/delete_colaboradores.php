<?php
include('banco.php');
$id = intval($_GET['id_colaborador']);
$sql_code = "DELETE FROM tb_colaboradores WHERE id_colaborador = '$id'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
if($sql_query)
	echo "<script>
	alert('Colaborador deletado com sucesso!');
	location.href='../view/colaboradores.php';
</script>";
else 
	echo "<script>
	alert('Erro ao deletar usuário.');
	location.href='../index.php';
</script>";
?>
