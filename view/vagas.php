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
        <title>Vagas Cadastradas</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>

            <!-- Navbar-->
            
            <?php
            include "menu.php";
            ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                    <div class="text-center"> 
                    <br>
                    <h1>VAGAS</h1>
                    <br>
                    <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#modal_banco_talentos">Nova vaga</button>&nbsp 		
                    </div>
                    <br>
                    

                    <div class="modal fade" id="modal_banco_talentos" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Inserir nova vaga</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                            
                            
                            <form role="form" method="POST" action="../model/grava_vagas.php" enctype="multipart/form-data">
                                    <fieldset>
                                    
                                    <div class="row">
                                    
                                    <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Título da vaga</label>
                                                <input type="text" class="form-control" name="grava_vaga_vagas" id="grava_vaga_vagas" placeholder="Insira a vaga">
                                    </div>
      
                                    <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Setor correspondente</label>
                                                <select name="grava_vaga_setor" id="grava_vaga_setor" class="form-control">
                                                    <option value="">Selecione...</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_setores";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['nome'].'">'.$row_cat_post['nome'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Período de trabalho</label>
                                                <select name="grava_vaga_periodo" id="grava_vaga_periodo" class="form-control" >
                                                    <option value="">Selecione...</option>
                                                    <option value="Tempo Integral">Tempo Integral</option>
                                                    <option value="Estágio">Estágio</option>
                                                    <option value="Prestador de serviços">Prestador de serviços</option>
                                                    <option value="Meio período">Meio período</option>
                                                    <option value="Jovem aprendiz">Jovem aprendiz</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Nível</label>
                                                <select name="grava_vaga_nivel" id="grava_vaga_nivel" class="form-control" required>
                                                    <option value="">Selecione...</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_categoria";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['categoria'].'">'.$row_cat_post['categoria'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Status da vaga</label>
                                                <select name="grava_vaga_status" id="grava_vaga_status" class="form-control" >
                                                    <option value="">Selecione...</option>
                                                    <option value="Disponível">Disponível</option>
                                                    <option value="Encerrado">Encerrado</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="exampleInputEmail1">Descrição da vaga</label>
                                                <textarea type="textarea" class="form-control" name="grava_vaga_descricao" id="grava_vaga_descricao" placeholder="Insira a descrição da vaga" required></textarea>
                                            </div>
                                            </fieldset>

                                            <div class="teste">
                                            <button type="submit" class="btn btn-primary">Cadastrar vaga</button>
                                            </div>
                                </form>
                    
                    
                    
                    </div>
                    </div>
                    </div> 
                </main>

                <div class="card-header"></i>Vagas disponíveis em andamento</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered cores"  id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="display:none;">ID</th>
                                        <th>Título da vaga</th>
                                        <th>Setor correspondente</th>
                                        <th>Período de trabalho</th>
                                        <th>Nível</th>
                                        <th>Ações</th>                      
                                    </tr>
                                </thead>

                                <?php 
                                $lista_talentos = "SELECT * FROM tb_vagas where status_vaga = 'Disponível'";
                                $con = $mysqli->query($lista_talentos) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                
                                <tbody class="cores">
                                    <td style="display:none;"><?php echo $dados['id_vaga'];?></td>
                                    <td><?php echo $dados['vagas'];?></td>
                                    <td><?php echo $dados['setor'];?></td>
                                    <td><?php echo $dados['periodo'];?></td>
                                    <td><?php echo $dados['nivel'];?></td>
                                    <td>
                                    <button type="button" class="fas fa-trash ml-1" title="Deletar" onclick="if(confirm('Tem certeza que deseja deletar o canditado: <?php echo $dados['vagas'];?> ?'))
		                            location.href='../model/delete_vagas.php?id_vaga=<?php echo $dados['id_vaga']; ?>';" ></button>
                                    </td>
                                    <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                
            <?php include "footer.php" ?>
            </div>
            </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
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
