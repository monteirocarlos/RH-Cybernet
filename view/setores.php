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
        <title>Cadastro de setores</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <?php
    session_start();
    include('menu.php');
    ?>

            <div id="layoutSidenav_content">
                <div class="card mb-4">
                    <div class="teste">
                        <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#grava_setores_modal" >Novo setor</button>&nbsp 		
		               </div>
                    
                    <div class="modal fade" id="grava_setores_modal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Novo setor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="../model/grava_setores.php">
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-lg-12">
                                                <label for="exampleInputEmail1"></label>
                                                <input type="text" class="form-control" name="grava_setor" id="grava_setor" placeholder="Insira o setor">
                                            </div>
                                        
                                        </fieldset> 

                                        <div class="teste">
                                            <button type="submit" class="btn btn-primary">Cadastrar setor</button>
                                            </div>          
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>
                    <div class="card-header"></i>Setores</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="display:none;">ID</th>
                                        <th>Setores</th>
                                        <th>Ações</th>                      
                                    </tr>
                                </thead>

                                <?php 
                                $lista_setores = "SELECT * FROM tb_setores";
                                $con = $mysqli->query($lista_setores) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                
                                <tbody>
                                    <td style="display:none;"><?php echo $dados['id_setor'];?></td>
                                    <td><?php echo $dados['nome'];?></td>
                                    <div class="acoes">
                                    <td>  
                                    <i class="fas fa-edit ml-1" title="Editar" data-toggle="modal" data-target="#edita_setores_modal" class="btnEditar" onclick="editar(this)"></i>
                                    <button type="submit" class="fas fa-trash ml-1" title="Deletar" onclick="if(confirm('Tem certeza que deseja deletar o setor: <?php echo $dados['nome'];?> ?'))
		                            location.href='../model/delete_setores.php?id_setor=<?php echo $dados['id_setor']; ?>';" ></button>
                                    </td></div>
                                    <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="edita_setores_modal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Editar setor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="../model/edita_setores.php">
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-lg-12">
                                                <label for="exampleInputEmail1"></label>
                                                <input type="hidden"  class="form-control"name="modalId" id="modalId" />
                                                <input type="text" class="form-control" name="edita_setor" id="edita_setor" placeholder="Insira o setor">
                                            </div>
                                        
                                        </fieldset> 

                                        <div class="teste">
                                            <button type="submit" class="btn btn-primary">Editar setor</button>
                                            </div>          
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>                       

                        <?php include "footer.php" ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    
            <script>
            function editar(e) {
            var linha = $(e).closest("tr");
            var id = linha.find("td:eq(0)").text().trim();
            var setor = linha.find("td:eq(1)").text().trim();
        
            $("#modalId").val(id);    
            $("#edita_setor").val(setor);
            }
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
    </body>
</html>
