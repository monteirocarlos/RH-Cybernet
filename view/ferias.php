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
                                    <div class="input-group md-form form-sm form-2 pl-0">
                                    <input class="form-control my-0 py-1 red-border" type="text" placeholder="Nome do colaborador" aria-label="Search">
                                    <div class="input-group-append">
                                        <span class="input-group-text red lighten-3" id="basic-text1"><button type="submit" class="fas fa-search text-grey"
                                            aria-hidden="true"></button></span>
                                    </div>
                                    </div><br>
      
                                        <div class="row">

                                        <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <input type="text" class="form-control" name="grava_ferias_setor" id="grava_ferias_setor" disabled="">
                                        </div>

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Setor</label>
                                                <input type="text" class="form-control" name="grava_ferias_setor" id="grava_ferias_setor" disabled="">
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Salário</label>
                                                <input type="text" class="form-control" name="grava_ferias_setor" id="grava_ferias_setor" disabled="">
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

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        </html>

