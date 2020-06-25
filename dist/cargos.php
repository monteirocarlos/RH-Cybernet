<?php include "banco.php" ?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cargos</title>
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
                        <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#setorModal" >Novo cargo</button>&nbsp 		
                    </div>
                    
                    <div class="modal fade" id="setorModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Novo cargo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="grvcargos.php">
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <input type="text" class="form-control" name="id_cargo" id="id_cargo" placeholder="Insira o cargo">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Setor</label>
                                                <select name="id_setor" id="id_setor" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_setores";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_setor'].'">'.$row_cat_post['nome'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nível</label>
                                                <select name="id_nivel" id="id_nivel" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_categoria";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_categoria'].'">'.$row_cat_post['categoria'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">CBO</label>
                                                <input type="text" class="form-control" name="id_cbo" id="id_cbo" placeholder="Insira o CBO">
                                            </div>

                                            
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Salário</label>
                                                <input type="text" class="form-control" name="id_salario" id="id_salario" placeholder="Insira o salário">
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="exampleInputEmail1">Descrição</label>
                                                <textarea type="textarea" class="form-control" name="id_descricao" id="id_descricao" placeholder="Insira a descrição de cargo"></textarea>
                                            </div>
                                        <div class="box-actions">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                 
                                    </fieldset>
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>
                    <div class="card-header"></i>Cargos</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cargo</th>
                                        <th>Setor</th>
                                        <th>Nível</th>
                                        <th>CBO</th>
                                        <th>Salário</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>                      
                                    </tr>
                                </thead>

                                <?php 
                                $lista_cargos = "SELECT * FROM tb_cargo";
                                $con = $mysqli->query($lista_cargos) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                <tbody>
                                    <td><?php echo $dados['id_cargo'];?></td>
                                    <td><?php echo $dados['cargo'];?></td>
                                    <td><?php echo $dados['setor'];?></td>
                                    <td><?php echo $dados['nivel'];?></td>
                                    <td><?php echo $dados['cbo'];?></td>
                                    <td><?php echo $dados['salario'];?></td>
                                    <td><?php echo $dados['descricao'];?></td>
                                    <td>  
                                    <i class="fas fa-edit ml-1" title="Editar" data-toggle="modal" data-target="#edtsetorModal" class="btnEditar" onclick="editar(this)"></i>
                                    </td>
                                    <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="edtsetorModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Editar cargo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="grv_edt_cargos.php">
                                    <fieldset>
                                    <div class="form-group">
				                    <input type="hidden"  class="form-control"name="modalId" id="modalId" />
				                    </div>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <input type="text" class="form-control" name="id_edt_cargo" id="id_edt_cargo" placeholder="Insira o cargo">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Setor</label>
                                                <select name="id_edt_setor" id="id_edt_setor" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_setores";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_setor'].'">'.$row_cat_post['nome'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nível</label>
                                                <select name="id_edt_nivel" id="id_edt_nivel" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_categoria";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_categoria'].'">'.$row_cat_post['categoria'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">CBO</label>
                                                <input type="text" class="form-control" name="id_edt_cbo" id="id_edt_cbo">
                                            </div>

                                            
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Salário</label>
                                                <input type="text" class="form-control" name="id_edt_salario" id="id_edt_salario">
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="exampleInputEmail1">Descrição</label>
                                                <textarea type="textarea" class="form-control" name="id_edt_descricao" id="id_edt_descricao"></textarea>
                                            </div>
                                        <div class="box-actions">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                 
                                    </fieldset>
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>                    

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    
            <script>
            function editar(e) {
            var linha = $(e).closest("tr");
            var id = linha.find("td:eq(0)").text().trim();
            var cargo = linha.find("td:eq(1)").text().trim();
            var setor = linha.find("td:eq(2)").text().trim(); 
            var nivel = linha.find("td:eq(3)").text().trim(); 
            var cbo = linha.find("td:eq(4)").text().trim(); 
            var salario = linha.find("td:eq(5)").text().trim(); 
            var descricao = linha.find("td:eq(6)").text().trim(); 
        
            $("#modalId").val(id);    
            $("#id_edt_cargo").val(cargo);
            $("#id_edt_setor").val(setor);
            $("#id_edt_nivel").val(nivel);
            $("#id_edt_cbo").val(cbo);
            $("#id_edt_salario").val(salario);
            $("#id_edt_descricao").val(descricao);
            }
            </script>
    </body>
</html>
