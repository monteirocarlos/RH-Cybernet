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
                        <button type="button" class="btn btn-primary margin-top"  data-toggle="modal" data-target="#promocao_cargos">Nova promoção</button>&nbsp
                        </form>
                        </div>			
                        </div>
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
                                       
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cargo atual</label>
                                                <input type="text" class="form-control" name="grava_promocao_cargo_atual" id="grava_promocao_cargo_atual" readonly=“true”>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Setor atual</label>
                                                <input type="text" class="form-control" name="grava_promocao_setor_atual" id="grava_promocao_setor_atual" readonly=“true”>
                                            </div>
                                        
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Novo cargo</label>
                                                <select name="grava_promocao_novo_cargo" id="grava_promocao_novo_cargo" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_cargo ORDER BY cargo ";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['cargo'].'">'.$row_cat_post['cargo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Novo setor</label>
                                                <input type="text" class="form-control" name="grava_promocao_novo_setor" id="grava_promocao_novo_setor" readonly=“true”>
                                            </div>
                                            
                                        
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Salário atual</label>
                                                <input type="text" class="form-control" name="grava_promocao_salario_atual" id="grava_promocao_salario_atual" readonly=“true”>
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Novo salário</label>
                                                <input type="text" class="form-control" name="grava_promocao_novo_salario" id="grava_promocao_novo_salario" readonly=“true”>
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Data promoção</label>
                                                <input type="date" class="form-control" name="grava_promocao_data" id="grava_promocao_data" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)">
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

                        <div class="card-header"></i>Histórico de promoções</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered cores"  id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                    <tr>
                                        <th>Colaborador</th>
                                        <th>Cargo atual</th>
                                        <th>Novo Cargo</th>
                                        <th>Salário atual</th>
                                        <th>Novo Salário</th>
                                        <th>Data da promoção</th>                     
                                    </tr>
                                </thead>
                                <?php 
                                $lista_cargos = 'SELECT * FROM tb_promocoes';
                                $con = $mysqli->query($lista_cargos) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                
                                <tbody>
                                    <td><?php echo $dados['colaborador'];?></td>
                                    <td><?php echo $dados['cargo_atual'];?></td>
                                    <td><?php echo $dados['novo_cargo'];?></td>
                                    <td><?php echo $dados['salario_atual'];?></td>
                                    <td><?php echo $dados['novo_salario'];?></td>
                                    <td><?php echo date('d/m/Y', strtotime($dados['data_promocao']));?></td>
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
                            $("select[name='grava_promocao_colaborador']").blur(function(){
                                var $colaborador_cargo = $("input[name='grava_promocao_cargo_atual']");
                                var $colaborador_setor = $("input[name='grava_promocao_setor_atual']");
                                var $colaborador_salario = $("input[name='grava_promocao_salario_atual']");
                                $.getJSON('../model/pesquisa_promocoes.php',{ 
                                    codigo: $( this ).val() 
                                },function( json ){
                                    $colaborador_cargo.val( json.colaborador_cargo );
                                    $colaborador_setor.val( json.colaborador_setor );
                                    $colaborador_salario.val( json.colaborador_salario );
                                });
                            });
                        });
                    </script>
                    
                    
                    <script type='text/javascript'>
                        $(document).ready(function(){
                            $("select[name='grava_promocao_novo_cargo']").blur(function(){
                                var $novo_promocao_setor = $("input[name='grava_promocao_novo_setor']");
                                var $novo_promocao_salario = $("input[name='grava_promocao_novo_salario']");
                                $.getJSON('../model/pesquisa_promocoes_novo.php',{ 
                                    codigo: $( this ).val() 
                                },function( json ){
                                    $novo_promocao_setor.val( json.novo_promocao_setor );
                                    $novo_promocao_salario.val( json.novo_promocao_salario );
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

