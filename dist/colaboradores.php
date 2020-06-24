<?php
include "banco.php";
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
                        <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#editarModal" >Novo</button>&nbsp 		
                    </div>
                    
                    
                    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Novo colaborador</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="usuarios.php">
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Nome completo</label>
                                                <input type="text" class="form-control" name="nome" id="txtnome" placeholder="Insira seu nome">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Endereço</label>
                                                <input type="text" class="form-control" name="endereco" id="textendereco" placeholder="Insira seu endereço">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">CPF</label>
                                                <input type="text" class="form-control" name="cpf" id="exampleInputEmail1" placeholder="Insira seu CPF">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">RG</label>
                                                <input type="text" class="form-control" name="rg" id="exampleInputEmail1" placeholder="Insira seu RG">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select name="ativo" class="form-control">
                                                    <option value="">Selecione algo</option>
                                                    <option value=0>Ativo</option>
                                                    <option value=1>Desligado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Sexo</label>
                                                <select name="sexo" class="form-control">
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
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <select name="cargo" class="form-control">
                                                    <option value="">Selecione o cargo</option>
                                                    <option value=1>Opção 1</option>
                                                    <option value=2>Opção 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Telefone</label>
                                                <input type="text" class="form-control" name="telefone"id="exampleInputEmail1" maxlength="15" placeholder="Telefone com DDD" />
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Insira seu e-mail ">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Nascimento</label>
                                                <input type="date" class="form-control" name="nascimento" id="exampleInputEmail1">
                                            </div>
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
                   
                    <div class="modal fade" id="alterarModal" tabindex="-1" role="dialog" aria-labelledby="alterarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="alterarModalLabel">Editar colaborador</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form role="form" method="POST" action="edita.php">
                                    <fieldset>
                                    <div class="form-group">
				                    <input type="hidden"  class="form-control"name="modalId" id="modalId" />
				                    </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="">Nome Completo</label>
                                                <input type="text" class="form-control" name="modalnome" id="modalnome">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Endereço</label>
                                                <input type="text" class="form-control" name="modalendereco" id="modalendereco">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">CPF</label>
                                                <input type="text" class="form-control" name="modalcpf" id="modalcpf">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">RG</label>
                                                <input type="text" class="form-control" name="modalrg" id="modalrg">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select name="modalativo" id="modalativo" class="form-control">
                                                    <option value="">Selecione algo</option>
                                                    <option value=0>Ativo</option>
                                                    <option value=1>Desligado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Sexo</label>
                                                <select name="modalsexo" id="modalsexo"class="form-control">
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
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <select name="modalcargo" id="modalcargo" class="form-control">
                                                    <option value="">Selecione o cargo</option>
                                                    <option value=1>Opção 1</option>
                                                    <option value=2>Opção 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Telefone</label>
                                                <input type="text" class="form-control" name="modaltelefone"id="modaltelefone" />
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" class="form-control" name="modalemail" id="modalemail">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Nascimento</label>
                                                <input type="date" class="form-control" name="modalnascimento" id="modalnascimento">
                                            </div>
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
