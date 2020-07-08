<?php
    include ("../model/banco.php");
    
    $pesquisar = $_POST['pesquisar'];
    $result_cursos = "SELECT * FROM tb_colaboradores WHERE nome LIKE '%$pesquisar%' LIMIT 5";
    $resultado_cursos = mysqli_query($mysqli, $result_cursos);
    
    while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
        echo "Colaborador: ".$rows_cursos['nome']."<br>";
    }
?>
