<?php 

include "../model/banco.php"
include "colaboradores_teste.php"


if (isset($_GET['search'])) {
    $cod_estados = $_GET['search'];
    $obj = new CidadeDao();
	//chamando a DAO para listar as cidades de acordo com o id do estado selecionado
    $obj->ListarCidade($cod_estados);
	//recebe o resultado da consulta
    $recebe = $obj->getResultado();
//faz um loop para montar linha por linha da combo de cidade
    for ($i = 0; $i < count($recebe); $i++) {
	// devolvendo a linha HTML para o javascript e montar no append
        echo "<option value='" . $recebe[$i]['cod_cidade'] . "' >" . $recebe[$i]['nome_cidade'] . "</option>";
    }
}

?>

