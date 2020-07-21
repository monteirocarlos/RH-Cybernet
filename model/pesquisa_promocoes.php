<?php
include_once "banco.php";

function retorna($codigo, $mysqli){
	$result_colaborador = "SELECT * FROM tb_colaboradores WHERE nome = '$codigo' LIMIT 1";
	$resultado_colaborador = mysqli_query($mysqli, $result_colaborador);
	if($resultado_colaborador->num_rows){
		$row_colaborador = mysqli_fetch_assoc($resultado_colaborador);
		$valores['colaborador_cargo'] = $row_colaborador['cargo'];
		$valores['colaborador_setor'] = $row_colaborador['setor'];
		$valores['colaborador_salario'] = $row_colaborador['salario'];
	}else{
		
		$valores['colaborador_cargo'] = 'Selecione o colaborador';
		$valores['colaborador_setor'] = 'Selecione o colaborador';
		$valores['colaborador_salario'] = 'Selecione o colaborador';
		
	}
	return json_encode($valores);
}

if(isset($_GET['codigo'])){
	echo retorna($_GET['codigo'], $mysqli);
}
?>

