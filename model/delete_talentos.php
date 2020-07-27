<?php
include('banco.php');
$id = intval($_GET['id_talento']);
$sql_code = "DELETE FROM tb_talentos WHERE id_talento = '$id'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
if($sql_query)
	echo "<script>
	alert('Candidato deletado com sucesso!');
	location.href='../view/banco_talentos.php';
</script>";
else 
	echo "<script>
	alert('Erro ao deletar canditado.');
	location.href='../index.php';
</script>";
?>
