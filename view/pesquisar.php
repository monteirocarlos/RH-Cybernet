<?php
    include ("../model/banco.php");
    
    $pesquisar = $_POST['pesquisar'];
    $result_cursos = "SELECT * FROM tb_colaboradores WHERE nome LIKE '%$pesquisar%' LIMIT 5";
    $resultado_cursos = mysqli_query($mysqli, $result_cursos);
    
    while($rows_cursos = mysqli_fetch_array($resultado_cursos)){ ?>
        
        <tbody>
                            
        <td style="display:none;"><?php echo $dados['id_colaborador'];?></td>
        <td><?php echo $dados['nome'];?></td>
        <td><?php echo $dados['celular'];?></td>
        <td><?php echo $dados['email'];?></td>
        <td><?php echo $dados['cargo'];?></td>
        <td><?php echo $dados['condicao'];?></td>

   <?php> } ?>
