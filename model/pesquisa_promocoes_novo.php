<?php
include_once "banco.php";

function retorna($codigo, $mysqli){
	$result_colaborador = "SELECT * FROM tb_cargo WHERE cargo = '$codigo' LIMIT 1";
	$resultado_colaborador = mysqli_query($mysqli, $result_colaborador);
	if($resultado_colaborador->num_rows){
		$row_colaborador = mysqli_fetch_assoc($resultado_colaborador);
		$valores['novo_promocao_setor'] = $row_colaborador['setor'];
		$valores['novo_promocao_salario'] = $row_colaborador['salario'];
	}else{
		
        $valores['novo_promocao_setor'] = 'Selecione o cargo';
        $valores['novo_promocao_salario'] = 'Selecione o cargo';
		
	}
	return json_encode($valores);
}

if(isset($_GET['codigo'])){
	echo retorna($_GET['codigo'], $mysqli);
}
?>