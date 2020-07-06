<?php include "../model/banco.php";?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cadastro de usuários</title>
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
                        <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#grava_usuarios_modal" >Novo usuário</button>&nbsp</div>
                    
                    <div class="modal fade" id="grava_usuarios_modal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Novo usuário</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                            <form method="POST" action="../model/grava_usuarios.php">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" name="grava_usuario_nome"  id="grava_usuario_nome" aria-describedby="nomeHelp" placeholder="Seu nome completo" />
				</div>
				<div class="form-group">
					<label for="usuario">Usuário</label>
					<input type="text" class="form-control"  name="grava_usuario_usuario" id="grava_usuario_usuario" placeholder="Seu usuário"/>
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" name="grava_usuario_senha" id="grava_usuario_senha" placeholder="Sua senha"/>
				</div>
				<button type="submit" class="btn btn-primary">Adicionar</button>
				</form>
                                 
                                    </fieldset>
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>
                    <div class="card-header"></i>Usuários</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="display:none;">ID</th>
                                        <th>Nome</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>                      
                                    </tr>
                                </thead>

                                <?php 
                                $lista_usuarios = "SELECT * FROM tb_usuarios";
                                $con = $mysqli->query($lista_usuarios) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                
                                <tbody>
                                    <td style="display:none;"><?php echo $dados['id_usuario'];?></td>
                                    <td><?php echo $dados['nome'];?></td>
                                    <td><?php echo $dados['usuario'];?></td>
                                    <td>  
                                    <i class="fas fa-edit ml-1" title="Editar" data-toggle="modal" data-target="#edita_usuarios_modal" class="btnEditar" onclick="editar(this)"></i>
                                    <button type="submit" class="fas fa-trash ml-1" title="Deletar" onclick="if(confirm('Tem certeza que deseja deletar o usuário: <?php echo $dados['nome'];?> ?'))
		                            location.href='../model/delete_usuarios.php?id_usuario=<?php echo $dados['id_usuario']; ?>';" ></button>
                                    </td>
                                    <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                 <div class="modal fade" id="edita_usuarios_modal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Editar usuário</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                            <form method="POST" action="../model/edita_usuarios.php">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" name="edita_usuario_nome"  id="edita_usuario_nome" aria-describedby="nomeHelp" placeholder="Seu nome completo" />
				</div>
				<div class="form-group">
					<label for="usuario">Usuário</label>
					<input type="text" class="form-control"  name="edita_usuario_usuario" id="edita_usuario_usuario" placeholder="Seu usuário"/>
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" name="edita_usuario_senha" id="edita_usuario_senha" placeholder="Sua senha"/>
				</div>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Adicionar</button>
				</form>
                                 
                                    </fieldset>
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
