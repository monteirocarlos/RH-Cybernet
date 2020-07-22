<?php
include('banco.php');
$id = intval($_GET['id_ferias']);
$sql_code = "DELETE FROM tb_ferias WHERE id_ferias = '$id'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
if($sql_query)
	echo "<script>
	alert('Agendamento deletado com sucesso!');
	location.href='../view/ferias.php';
</script>";
else 
	echo "<script>
	alert('Erro ao deletar agendamento.');
	location.href='../index.php';
</script>";
?>
