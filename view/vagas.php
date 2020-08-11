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
                    <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#modal_banco_talentos" >Nova vaga</button>&nbsp 		
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
                            
                            
                            <form role="form" method="POST" action="../model/grava_banco_talentos.php" enctype="multipart/form-data">
                                    <fieldset>
                                    
                                    <div class="row">
                                    
                                    <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Título da vaga</label>
                                                <input type="text" class="form-control" name="grava_banco_canditado" id="grava_banco_canditado" placeholder="Insira a vaga">
                                    </div>
      
                                    <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Setor correspondente</label>
                                                <select name="grava_banco_setor" id="grava_banco_setor" class="form-control">
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
                                                <select name="grava_banco_avaliacao" id="grava_banco_avaliacao" class="form-control" >
                                                    <option value="">Selecione...</option>
                                                    <option value="Ótimo">Tempo Integral</option>
                                                    <option value="Bom">Estágio</option>
                                                    <option value="Regular">Prestador de serviços</option>
                                                    <option value="Ruim">Meio período</option>
                                                    <option value="Péssimo">Jovem aprendiz</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Nível</label>
                                                <select name="id_nivel" id="id_nivel" class="form-control" required>
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
                                                <select name="grava_banco_avaliacao" id="grava_banco_avaliacao" class="form-control" >
                                                    <option value="">Selecione...</option>
                                                    <option value="Ótimo">Disponível</option>
                                                    <option value="Bom">Encerrado</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="exampleInputEmail1">Descrição da vaga</label>
                                                <textarea type="textarea" class="form-control" name="id_descricao" id="id_descricao" placeholder="Insira a descrição da vaga" required></textarea>
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

                <div class="card-header"></i>Histórico banco de talentos</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered cores"  id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="display:none;">ID</th>
                                        <th>Candidato</th>
                                        <th>Setor correspondente</th>
                                        <th>Avaliação</th>
                                        <th>Data avaliativa</th>
                                        <th>Currículo</th>
                                        <th>Ações</th>                      
                                    </tr>
                                </thead>

                                <?php 
                                $lista_talentos = "SELECT * FROM tb_talentos";
                                $con = $mysqli->query($lista_talentos) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                
                                <tbody class="cores">
                                    <td style="display:none;"><?php echo $dados['id_talento'];?></td>
                                    <td><?php echo $dados['candidato'];?></td>
                                    <td><?php echo $dados['setor'];?></td>
                                    <td><?php echo $dados['avaliacao'];?></td>
                                    <td><?php echo date('d/m/Y', strtotime($dados['data_processo']));?></td>
                                    <td><a href="../model/upload/<?php echo $dados['arquivo'];?>" target="_blank"><?php echo $dados['arquivo'];?></a></td>   
                                    <td>
                                    <button type="button" class="fas fa-trash ml-1" title="Deletar" onclick="if(confirm('Tem certeza que deseja deletar o canditado: <?php echo $dados['candidato'];?> ?'))
		                            location.href='../model/delete_talentos.php?id_talento=<?php echo $dados['id_talento']; ?>';" ></button>
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
