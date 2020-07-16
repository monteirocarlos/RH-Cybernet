<?php

$servidor = 'localhost';
$porta = '3306';
$usuario = 'root';
$senha = 'root';
$banco = 'recursoshumanos';

// Conecta-se ao banco de dados MySQL
$mysqli = new mysqli ($servidor, $usuario, $senha, $banco, $porta);

// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno())
    trigger_error(mysqli_connect_error());
?>
