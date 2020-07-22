<?php
session_start();
include ("../model/verifica_login.php");
include ("../model/banco.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aniversariantes do dia</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/teste.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <?php
    session_start();
    include('menu.php');
    ?>
            <div id="layoutSidenav_content">
                <div class="card mb-4">
                    <div class="teste">
                        <h2>Aniversariantes do Mês</h2><br>
                        </div>			
                        </div>
                        
                        <div class="card-header bg-secondary text-light"></i>Aniversariantes do dia</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php 
                                $lista_aniversariantes = "SELECT * FROM tb_colaboradores WHERE MONTH(nascimento) = MONTH(NOW()) and DAY(nascimento) = DAY(NOW())";
                                $con = $mysqli->query($lista_aniversariantes) or die ($mysqli->error);
                                while ($dados = $con->fetch_array()){ ?>
                                <tbody>
                                    <td style="display:none;"><?php echo $dados['id_colaborador'];?></td>
                                    <td><?php echo $dados['nome'];?></td>
                                    <td><?php echo date('d/m/Y', strtotime($dados['nascimento']));?></td>

                                    <?php } ?> 
                            </tbody>  
                            </table>
                        </div>        
                       </div>

                    <div class="card-header bg-dark text-light"></i>Aniversariantes do mês</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php 
                                $lista_aniversariantes = "SELECT * FROM tb_colaboradores WHERE MONTH(nascimento) = MONTH(NOW())";
                                $con = $mysqli->query($lista_aniversariantes) or die ($mysqli->error);
                                while ($dados = $con->fetch_array()){ ?>
                                <tbody>
                                    <td style="display:none;"><?php echo $dados['id_colaborador'];?></td>
                                    <td><?php echo $dados['nome'];?></td>
                                    <td><?php echo date('d/m/Y', strtotime($dados['nascimento']));?></td>
                                    <?php } ?> 
                            </tbody>  
                            </table>
                        </div>        
                </div> 
            

                <?php include "footer.php" ?>
                </div>
                <script>

                function formatar(mascara, documento){
                    var i = documento.value.length;
                    var saida = mascara.substring(0,1);
                    var texto = mascara.substring(i)
                    
                    if (texto.substring(0,1) != saida){
                                documento.value += texto.substring(0,1);
                    }
                }
        </script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        </html>

