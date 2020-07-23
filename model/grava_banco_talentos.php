<?php

include "banco.php";

$candidato = $_POST["grava_banco_canditado"];
$setor = $_POST["grava_banco_setor"];
$avalicao = $_POST["grava_banco_avaliacao"];
$data_processo = ($_POST["grava_banco_data"]);


$msg = false;
if (isset ($_FILES['grava_banco_arquivo'])){
    $extensao = strtolower(substr($_FILES['grava_banco_arquivo']['name'], -4));
    $novo_nome = $_POST["grava_banco_canditado"] . $extensao;
    $diretorio = "upload/";
    
    move_uploaded_file($_FILES['grava_banco_arquivo']['tmp_name'], $diretorio.$novo_nome);

    $executa ="INSERT INTO tb_talentos (canditado, setor, avaliacao, data_processo, arquivo) VALUES ('$canditado', '$setor', '$avaliacao', '$data_processo', '$novo_nome')";

    $query = $mysqli->query($executa);

echo"<script language='javascript' type='text/javascript'>alert('Cargo cadastrado!');window.location.href='../view/banco_talentos.php'</script>";
  
}

?>