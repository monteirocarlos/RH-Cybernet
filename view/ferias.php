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
                        <button type="button" class="btn btn-primary margin-top"  data-toggle="modal" data-target="#agenda_ferias">Novo agendamento</button>&nbsp
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
                                <form role="form" method="POST" action="../model/grava_ferias.php">
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

                                        <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <input type="text" class="form-control" name="grava_ferias_cargo" id="grava_ferias_cargo" readonly=“true”>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Setor</label>
                                            <input type="text" class="form-control" name="grava_ferias_setor" id="grava_ferias_setor" readonly=“true”>
                                        </div>
                                           
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Salário</label>
                                                <input type="text" class="form-control" name="grava_ferias_salario" id="grava_ferias_salario" readonly=“true”>
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Abono pecuniário</label>
                                                <select name="grava_ferias_abono" id="grava_ferias_abono" class="form-control" >
                                                    <option value="">Selecionar</option>
                                                    <option value="Sim">Sim</option>
				                                    <option value="Não">Não</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Adiantar 1ª parcela 13º</label>
                                                <select name="grava_ferias_adiantamento" id="grava_ferias_adiantamento" class="form-control" >
                                                    <option value="">Selecionar</option>
                                                    <option value="Sim">Sim</option>
                                                    <option value="Não">Não</option>
                                                </select>
                                            </div>
                                            

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Data inicial</label>
                                                <input type="date" class="form-control" name="grava_ferias_data" id="grava_ferias_data" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)">
                                            </div>
                                            
                                            </fieldset>
                                            
                                            <div class="teste">
                                            <button type="submit" class="btn btn-primary">Concluir agendamento</button>
                                            </div>
                                 
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>

                        <div class="card-header"></i>Colaboradores em período de férias</div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered cores"  id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="display:none;">ID</th>
                                        <th>Colaborador</th>
                                        <th>Cargo</th>
                                        <th>Setor</th>
                                        <th>Início</th>
                                        <th>Retorno</th>
                                                            
                                    </tr>
                                </thead>

                                
                                <?php 
                                $lista_aniversariantes = "SELECT * FROM tb_ferias WHERE MONTH(data_inicial) = MONTH(NOW()) and YEAR(data_inicial) = YEAR(NOW())";
                                $con = $mysqli->query($lista_aniversariantes) or die ($mysqli->error);
                                while ($dados = $con->fetch_array()){ ?>
                                
                                <tbody class="cores">
                                    <td style="display:none;"><?php echo $dados['id_ferias'];?></td>
                                    <td><?php echo $dados['colaborador'];?></td>
                                    <td><?php echo $dados['cargo'];?></td>
                                    <td><?php echo $dados['setor'];?></td>
                                    <td><?php echo date('d/m/Y', strtotime($dados['data_inicial']));?></td>
                                    <td><?php echo date('d/m/Y', strtotime('+30 days', strtotime($dados['data_inicial'])));?></td>
                                    <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                 

                <div class="card-header"></i>Histórico de agendamentos</div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered cores"  id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="display:none;">ID</th>
                                        <th>Colaborador</th>
                                        <th>Cargo</th>
                                        <th>Setor</th>
                                        <th>Salário</th>
                                        <th>Abono</th>
                                        <th>Adiantamento</th>
                                        <th>Período inicial</th>
                                        <th>Retorno</th>
                                        <th>Ações</th>                      
                                    </tr>
                                </thead>

                                <?php 
                                $lista_ferias = "SELECT * FROM tb_ferias";
                                $con = $mysqli->query($lista_ferias) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                
                                <tbody class="cores">
                                    <td style="display:none;"><?php echo $dados['id_ferias'];?></td>
                                    <td><?php echo $dados['colaborador'];?></td>
                                    <td><?php echo $dados['cargo'];?></td>
                                    <td><?php echo $dados['setor'];?></td>
                                    <td><?php echo $dados['salario'];?></td>
                                    <td><?php echo $dados['abono'];?></td>
                                    <td><?php echo $dados['adiantamento'];?></td>
                                    <td><?php echo date('d/m/Y', strtotime($dados['data_inicial']));?></td>
                                    <td><?php echo date('d/m/Y', strtotime('+30 days', strtotime($dados['data_inicial'])));?></td>
                                    <td>  
                                    <button type="submit" class="fas fa-trash ml-1" title="Deletar" onclick="if(confirm('Tem certeza que deseja deletar o agendamento do colaborador(a): <?php echo $dados['colaborador'];?> ?'))
		                            location.href='../model/delete_ferias.php?id_ferias=<?php echo $dados['id_ferias']; ?>';" ></button>
                                    </td>
                                    <?php } ?>
                            </tbody>
                            </table>
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
                    var $ferias_salario = $("input[name='grava_ferias_salario']");
					$.getJSON('../model/pesquisa_ferias.php',{ 
						codigo: $( this ).val() 
					},function( json ){
						$ferias_cargo.val( json.ferias_cargo );
						$ferias_setor.val( json.ferias_setor );
                        $ferias_salario.val( json.ferias_salario );
					});
				});
			});
		</script>

        <script>
                window.addEventListener("keydown", ev => {
                switch( true ) {
                    case ev.keyCode === 123:
                    case ev.ctrlKey && ev.shiftKey && event.keyCode == 74:
                    case ev.ctrlKey && ev.keyCode == 85:
                    console.log("Tecla bloqueada");
                    ev.preventDefault();
                    return false;
                }
                })
                window.addEventListener("contextmenu", ev => {
                ev.preventDefault();
                return false;
                });
                </script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        </html>

        