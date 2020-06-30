<?php
session_start();
include('banco.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: ../index.php');
	exit();
}

$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

$query = "select usuario from tb_usuarios where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($mysqli, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: ../view/painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../index.php');
	exit();
}


