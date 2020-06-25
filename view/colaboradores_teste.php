<?php
include "../model/banco.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Colaboradores</title>
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
                        <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#grava_colaboradores_modal">Novo colaborador</button>&nbsp 		
                    </div>
                    <div class="modal fade" id="grava_colaboradores_modal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Novo colaborador</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="../model/grava_colaboradores.php">
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nome completo</label>
                                                <input type="text" class="form-control" name="grava_colaborador_nome" id="grava_colaborador_nome" placeholder="Insira seu nome">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">CPF</label>
                                                <input type="text" class="form-control" name="grava_colaborador_cpf" id="grava_colaborador_cpf" placeholder="Insira o CPF">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">RG</label>
                                                <input type="text" class="form-control" name="grava_colaborador_rg" id="grava_colaborador_rg" placeholder="Insira o RG">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Nascimento</label>
                                                <input type="date" class="form-control" name="grava_colaborador_nascimento" id="grava_colaborador_nascimento">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Admissão</label>
                                                <input type="date" class="form-control" name="grava_colaborador_admissao" id="grava_colaborador_admissao">
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Sexo</label>
                                                <select name="grava_colaborador_sexo" id="grava_colaborador_sexo" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_sexo ORDER BY sexo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_sexo'].'">'.$row_cat_post['sexo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="text" class="form-control" name="grava_colaborador_email" id="grava_colaborador_email" placeholder="Insira seu endereço">
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">CEP</label>
                                                <input type="text" class="form-control" name="grava_colaborador_cep"id="grava_colaborador_cep" maxlength="15" placeholder="CEP" />
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Rua</label>
                                                <input type="text" class="form-control" name="grava_colaborador_rua"id="grava_colaborador_rua" maxlength="15" placeholder="Rua" />
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Bairro</label>
                                                <input type="text" class="form-control" name="grava_colaborador_bairro"id="grava_colaborador_bairro" maxlength="15" placeholder="Bairro" />
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Nº</label>
                                                <input type="text" class="form-control" name="grava_colaborador_numero"id="grava_colaborador_numero" maxlength="4" placeholder="Número"/>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cidade</label>
                                                <input type="text" class="form-control" name="grava_colaborador_cidade"id="grava_colaborador_cidade" maxlength="15" placeholder="Cidade" />
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Setor</label>
                                                <select name="grava_colaborador_setor" name="grava_colaborador_setor" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_setores";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_setores'].'">'.$row_cat_post['nome'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <select name="grava_colaborador_cargo" name="grava_colaborador_cargo" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_cargo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_cargo'].'">'.$row_cat_post['cargo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Nível</label>
                                                <select name="grava_colaborador_nivel" name="grava_colaborador_nivel" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_categoria";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_categoria'].'">'.$row_cat_post['categoria'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select name="sexo" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_ativo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_ativo'].'">'.$row_cat_post['ativo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="box-actions teste">
                                            <button type="submit" class="btn btn-primary">Cadastrar colaborador</button>
                                        </div>
                                        
                                 
                                    </fieldset>
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>
                    <div class="card-header"></i>Colaboradores</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Nascimento</th>
                                        <th>Sexo</th>
                                        <th>CPF</th>
                                        <th>RG</th>
                                        <th>E-mail</th>
                                        <th>Endereço</th>
                                        <th>Telefone</th>
                                        <th>Cargo</th>
                                        <th>Status</th>
                                        <th>ID</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php 
                                $lista_colaboradores = "SELECT * FROM tb_colaboradores";
                                $con = $mysqli->query($lista_colaboradores) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                <tbody>
                                    <td><?php echo $dados['nome'];?></td>
                                    <td><?php echo $dados['nascimento'];?></td>
                                    <td><?php echo $dados['id_sexo'];?></td>
                                    <td><?php echo $dados['cpf'];?></td>
                                    <td><?php echo $dados['rg'];?></td>
                                    <td><?php echo $dados['email'];?></td>
                                    <td><?php echo $dados['endereco'];?></td>
                                    <td><?php echo $dados['telefone'];?></td>
                                    <td><?php echo $dados['id_cargo'];?></td>
                                    <td><?php echo $dados['ativo'];?></td> 
                                    <td><?php echo $dados['id_colaborador'];?></td> 
                                    <td>  
                                    <i class="fas fa-edit ml-1" title="Editar" data-toggle="modal" data-target="#alterarModal" class="btnEditar" onclick="editar(this)"></i>
                                    </td>
                                    <?php } ?>
                            </tbody>                            
                            </table>
                        </div>
                    </div>
                </div>
                   
                    <div class="modal fade" id="edita_colaboradores_modal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Novo colaborador</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="../model/grava_colaboradores.php">
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nome completo</label>
                                                <input type="text" class="form-control" name="edita_colaborador_nome" id="edita_colaborador_nome" placeholder="Insira seu nome">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">CPF</label>
                                                <input type="text" class="form-control" name="edita_colaborador_cpf" id="edita_colaborador_cpf" placeholder="Insira o CPF">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">RG</label>
                                                <input type="text" class="form-control" name="edita_colaborador_rg" id="edita_colaborador_rg" placeholder="Insira o RG">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Nascimento</label>
                                                <input type="date" class="form-control" name="edita_colaborador_nascimento" id="edita_colaborador_nascimento">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Admissão</label>
                                                <input type="date" class="form-control" name="edita_colaborador_admissao" id="edita_colaborador_admissao">
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Sexo</label>
                                                <select name="edita_colaborador_sexo" id="edita_colaborador_sexo" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_sexo ORDER BY sexo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_sexo'].'">'.$row_cat_post['sexo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="text" class="form-control" name="edita_colaborador_email" id="editacolaborador_email" placeholder="Insira seu endereço">
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">CEP</label>
                                                <input type="text" class="form-control" name="edita_colaborador_cep"id="edita_colaborador_cep" maxlength="15" placeholder="CEP" />
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Rua</label>
                                                <input type="text" class="form-control" name="edita_colaborador_rua"id="edita_colaborador_rua" maxlength="15" placeholder="Rua" />
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Bairro</label>
                                                <input type="text" class="form-control" name="edita_colaborador_bairro"id="edita_colaborador_bairro" maxlength="15" placeholder="Bairro" />
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Nº</label>
                                                <input type="text" class="form-control" name="edita_colaborador_numero"id="edita_colaborador_numero" maxlength="4" placeholder="Número"/>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cidade</label>
                                                <input type="text" class="form-control" name="edita_colaborador_cidade"id="edita_colaborador_cidade" maxlength="15" placeholder="Cidade" />
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Setor</label>
                                                <select name="edita_colaborador_setor" name="edita_colaborador_setor" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_setores";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_setores'].'">'.$row_cat_post['nome'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <select name="edita_colaborador_cargo" name="edita_colaborador_cargo" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_cargo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_cargo'].'">'.$row_cat_post['cargo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Nível</label>
                                                <select name="edita_colaborador_nivel" name="edita_colaborador_nivel" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_categoria";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_categoria'].'">'.$row_cat_post['categoria'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select name="edita_colaborador_status" name="edita_colaborador_status" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_ativo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['id_ativo'].'">'.$row_cat_post['ativo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
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
  var nome = linha.find("td:eq(0)").text().trim();
  var nascimento = linha.find("td:eq(1)").text().trim(); 
  var sexo1 = linha.find("td:eq(2)").text().trim(); 
  var cpf = linha.find("td:eq(3)").text().trim(); 
  var rg = linha.find("td:eq(4)").text().trim(); 
  var email = linha.find("td:eq(5)").text().trim(); 
  var endereco = linha.find("td:eq(6)").text().trim(); 
  var telefone = linha.find("td:eq(7)").text().trim(); 
  var cargo = linha.find("td:eq(8)").text().trim(); 
  var ativo = linha.find("td:eq(9)").text().trim(); 
  var id = linha.find("td:eq(10)").text().trim();

    
  $("#modalnome").val(nome);
  $("#modalendereco").val(endereco);
  $("#modalcpf").val(cpf);
  $("#modalrg").val(rg);
  $("#modalativo").val(ativo);
  $("#modalsexo").val(sexo1);
  $("#modalcargo").val(cargo);
  $("#modaltelefone").val(telefone);
  $("#modalemail").val(email);
  $("#modalnascimento").val(nascimento);
  $("#modalId").val(id);
}

</script>

    </body>
</html>