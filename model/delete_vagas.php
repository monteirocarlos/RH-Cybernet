<?php
include('banco.php');
$id = intval($_GET['id_vaga']);
$sql_code = "DELETE FROM tb_vagas WHERE id_vaga = '$id'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
if($sql_query)
	echo "<script>
	alert('Vaga deletada com sucesso!');
	location.href='../view/vagas.php';
</script>";
else 
	echo "<script>
	alert('Erro ao deletar vaga.');
	location.href='../index.php';
</script>";
?>
