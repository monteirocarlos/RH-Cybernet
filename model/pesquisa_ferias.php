<?php
include_once "banco.php";

function retorna($codigo, $mysqli){
	$result_colaborador = "SELECT * FROM tb_colaboradores WHERE nome = '$codigo' LIMIT 1";
	$resultado_colaborador = mysqli_query($mysqli, $result_colaborador);
	if($resultado_colaborador->num_rows){
		$row_colaborador = mysqli_fetch_assoc($resultado_colaborador);
		$valores['ferias_cargo'] = $row_colaborador['cargo'];
		$valores['ferias_setor'] = $row_colaborador['setor'];
		$valores['ferias_salario'] = $row_colaborador['salario'];
	}else{
		
		$valores['ferias_setor'] = 'Não selecionado';
		$valores['ferias_cargo'] = 'Não selecionado';
		$valores['ferias_salario'] = 'Não selecionado';
		
	}
	return json_encode($valores);
}

if(isset($_GET['codigo'])){
	echo retorna($_GET['codigo'], $mysqli);
}
?>