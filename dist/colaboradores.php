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
                        <button type="button" class="btn btn-success">Alterar</button>
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
                                                    <option value=0>Masculino</option>
                                                    <option value=1>Feminino</option>
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
                                    </tr>
                                </thead>
                                <?php 
                                $lista_colaboradores = "SELECT * FROM tb_colaboradores";
                                $con = $mysqli->query($lista_colaboradores) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                <tbody>
                                    <td><?php echo $dados['nome'];?></td>
                                    <td><?php echo $dados['nascimento'];?></td>
                                    <td><?php
	                                switch ($dados['id_sexo']) {
                                    case 0:
                                    echo "Masculino";
                                    break;
                                    case 1:
                                    echo "Feminino";
                                    break;};?>
		                            </td>
                                    <td><?php echo $dados['cpf'];?></td>
                                    <td><?php echo $dados['rg'];?></td>
                                    <td><?php echo $dados['email'];?></td>
                                    <td><?php echo $dados['endereco'];?></td>
                                    <td><?php echo $dados['telefone'];?></td>
                                    <td><?php echo $dados['id_cargo'];?></td>
                                    <td><?php echo $dados['ativo'];?></td> 
                            </tbody> <?php } ?>                               
                            </table>
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
    </body>
</html>
