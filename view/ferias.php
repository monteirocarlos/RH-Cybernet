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
        <title>Controle de férias</title>
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
                        <h1>CONTROLE DE FÉRIAS</h1><br>
                        <div class="container">
                        <div class="md-form mt-0">
                        <form method="POST" action="pesquisar.php">
                        <button type="button" class="btn btn-secondary margin-top"  data-toggle="modal" data-target="#agenda_ferias">Novo agendamento</button>&nbsp
                        <button type="button" class="btn btn-secondary margin-top"  data-toggle="modal" data-target="#agenda_ferias">Calculo de férias</button>&nbsp
                        </form>
                        </div>			
                        </div>
                        </div>

                    <div class="modal fade" id="agenda_ferias" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Agendar férias</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST">
                                    <fieldset>
                                    
                                    <div class="form-group col-lg-13">
                                                <label for="exampleInputEmail1">Colaborador</label>
                                                <select name="grava_ferias_colaborador" id="grava_ferias_colaborador" class="form-control">
                                                    <option value="">Selecione o colaborador</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_colaboradores";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['nome'].'">'.$row_cat_post['nome'].'</option>';
					                                }
				                                    ?>
                                                </select>
      
                                        <div class="row">

                                        <div class="form-group col-lg-3">
                                            <label for="exampleInputEmail1">Setor</label>
                                            <input type="text" class="form-control" name="grava_ferias_setor" id="grava_ferias_setor" disabled="">
                                        </div>

                                        <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <input type="text" class="form-control" name="grava_ferias_cargo" id="grava_ferias_cargo" disabled="">
                                        </div>

                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Categoria</label>
                                                <input type="text" class="form-control" name="grava_ferias_categoria" id="grava_ferias_categoria" disabled="">
                                            </div>
                                            
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Salário</label>
                                                <input type="text" class="form-control" name="grava_ferias_salario" id="grava_ferias_salario" disabled="">
                                            </div>
                                            
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Abono pecuniário</label>
                                                <select name="grava_ferias_setor" id="grava_ferias_setor" class="form-control" required>
                                                    <option value="">Selecionar</option>
                                                    <option value="Sim">Sim</option>
				                                    <option value="Não">Não</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Adiantar 1ª parcela 13º</label>
                                                <select name="grava_ferias_setor" id="grava_ferias_setor" class="form-control" required>
                                                    <option value="">Selecionar</option>
                                                    <option value="Sim">Sim</option>
                                                    <option value="Não">Não</option>
                                                </select>
                                            </div>
                                            

                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Data inicial</label>
                                                <input type="date" class="form-control" name="grava_promocao_data" id="grava_promocao_data" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required>
                                            </div>
                                            
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Término</label>
                                                <input type="date" class="form-control" name="grava_promocao_data" id="grava_promocao_data" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required>
                                            </div>

                                            
                                            </fieldset>
                                            
                                            <div class="teste">
                                            <button type="submit" class="btn btn-secondary">Concluir agendamento</button>
                                            </div>
                                 
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>

                        <div class="card-header"></i>Férias em andamento no mês</div>
                    <div class="card-body">
                        <div class="table-responsive">
                           
                        </div>
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
		
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script type='text/javascript'>
			$(document).ready(function(){
				$("select[name='grava_ferias_colaborador']").blur(function(){
					var $ferias_cargo = $("input[name='grava_ferias_cargo']");
					var $ferias_setor = $("input[name='grava_ferias_setor']");
                    var $ferias_categoria = $("input[name='grava_ferias_categoria']");
					$.getJSON('../model/pesquisa_ferias.php',{ 
						codigo: $( this ).val() 
					},function( json ){
						$ferias_cargo.val( json.ferias_cargo );
						$ferias_setor.val( json.ferias_setor );
                        $ferias_categoria.val( json.ferias_categoria );
                        $ferias_salario.val( json.ferias_salario );
					});
				});
			});
		</script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        </html>

        