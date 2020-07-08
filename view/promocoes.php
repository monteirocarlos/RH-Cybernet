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
        <title>Promoções de colaboradores</title>
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
                        <h1>PROMOÇÕES</h1><br>
                        <div class="container">
                        <div class="md-form mt-0">
                        <form method="POST" action="pesquisar.php">
                        <input class="form-control" type="text"  id="pesquisar" placeholder="Insira o nome do colaborador" aria-label="Search"><br>
                        <button type="button" class="btn btn-primary margin-top"  data-toggle="modal" data-target="#promocao_cargos">Nova promoção</button>&nbsp
                        </form>
                        </div>			
                        </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered cores"  id="dataTable" width="100%" cellspacing="0">

                                <?php 
                                $lista_cargos = "SELECT * FROM tb_cargo";
                                $con = $mysqli->query($lista_cargos) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                
                                <tbody class="cores">
                                    <td style="display:none;"><?php echo $dados['id_cargo'];?></td>
                                    <td style="display:none;"><?php echo $dados['cargo'];?></td>
                                    <td style="display:none;"><?php echo $dados['setor'];?></td>
                                    <td style="display:none;"><?php echo $dados['nivel'];?></td>
                                    <td style="display:none;"><?php echo $dados['cbo'];?></td>
                                    <td style="display:none;"><?php echo $dados['salario'];?></td>
                                    <td style="display:none;"><?php echo $dados['descricao'];?></td>
                                    <?php } ?>
                            </tbody>
                            </table>
                    </div>

                    <div class="modal fade" id="promocao_cargos" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Promover cargo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="../model/grava_promocao.php">
                                    <fieldset>
                                        <div class="row">
                                        <div class="form-group col-lg-12">
                                        <input type="hidden"  class="form-control" name="modalId" id="modalId" />

                                                <label for="exampleInputEmail1">Nome do colaborador</label>
                                                <select name="grava_promocao_colaborador" id="grava_promocao_colaborador" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_colaboradores";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['nome'].'">'.$row_cat_post['nome'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                        
                                            </div>

                                        <div class="row">
                                       
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Antigo cargo</label>
                                                <select name="grava_promocao_antigo_cargo" id="grava_promocao_antigo_cargo" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_cargo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['cargo'].'">'.$row_cat_post['cargo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Novo cargo</label>
                                                <select name="grava_promocao_novo_cargo" id="grava_promocao_novo_cargo" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_cargo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['cargo'].'">'.$row_cat_post['cargo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                        <input type="hidden"  class="form-control" name="modalId" id="modalId" />

                                                <label for="exampleInputEmail1">Categoria</label>
                                                <select name="grava_promocao_categoria" id="grava_promocao_categoria" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_categoria";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['categoria'].'">'.$row_cat_post['categoria'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Salário anterior</label>
                                                <input type="text" class="form-control" name="grava_promocao_antigo_salario" id="grava_promocao_antigo_salario" placeholder="Salário anterior">
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Salário posterior</label>
                                                <input type="text" class="form-control" name="grava_promocao_novo_salario" id="grava_promocao_novo_salario" placeholder="Insira o salário">
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Data promoção</label>
                                                <input type="text" class="form-control" name="grava_promocao_data" id="grava_promocao_data" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)">
                                            </div>
                                            
                                            </fieldset> 

                                            <div class="teste">
                                            <button type="submit" class="btn btn-primary">Efetuar promoção</button>
                                            </div>
                                 
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>

                      

        </div>                                          
        <?php include "footer.php" ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        </html>

