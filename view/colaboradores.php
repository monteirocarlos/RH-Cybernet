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
                                                <input type="text" class="form-control" name="grava_colaborador_nome" id="grava_colaborador_nome" placeholder="Insira seu nome" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">CPF</label>
                                                <input type="text" class="form-control " name="grava_colaborador_cpf" id="grava_colaborador_cpf" placeholder="Insira o CPF" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">RG</label>
                                                <input type="text" class="form-control" name="grava_colaborador_rg" id="grava_colaborador_rg" maxlength="12" OnKeyPress="formatar('##.###.###-#', this)" placeholder="Insira o RG" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nascimento</label>
                                                <input type="date" class="form-control" name="grava_colaborador_nascimento" id="grava_colaborador_nascimento" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Admiss??o</label>
                                                <input type="date" class="form-control" name="grava_colaborador_admissao" id="grava_colaborador_admissao" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Sexo</label>
                                                <select name="grava_colaborador_sexo" id="grava_colaborador_sexo" class="form-control" required>
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_sexo ORDER BY sexo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['sexo'].'">'.$row_cat_post['sexo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Telefone</label>
                                                <input type="text" class="form-control" name="grava_colaborador_telefone"id="grava_colaborador_telefone" maxlength="12" OnKeyPress="formatar('## ####-####', this)" placeholder="N??mero residencial" required/>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Celular</label>
                                                <input type="text" class="form-control" name="grava_colaborador_celular"id="grava_colaborador_celular" maxlength="13" OnKeyPress="formatar('## #####-####', this)" placeholder="Insira o celular" required/>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" class="form-control" name="grava_colaborador_email"id="grava_colaborador_email" maxlength="15" placeholder="Insira o e-mail" required/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">CEP</label>
                                                <input type="text" class="form-control" name="grava_colaborador_cep"id="grava_colaborador_cep"  placeholder="CEP" maxlength="9" OnKeyPress="formatar('#####-###', this)" onblur="pesquisacep(this.value);" required/>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Rua</label>
                                                <input type="text" class="form-control" name="grava_colaborador_rua"id="grava_colaborador_rua" maxlength="15" placeholder="Rua" required/>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Bairro</label>
                                                <input type="text" class="form-control" name="grava_colaborador_bairro"id="grava_colaborador_bairro" maxlength="15" placeholder="Bairro" required/>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">N??</label>
                                                <input type="text" class="form-control" name="grava_colaborador_numero"id="grava_colaborador_numero" maxlength="4" placeholder="N??mero" required/>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cidade</label>
                                                <input type="text" class="form-control" name="grava_colaborador_cidade"id="grava_colaborador_cidade" maxlength="15" placeholder="Cidade" required/>
                                            </div>
                                        </div>

                                        <div class="row">
                                        
                                        <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <select name="grava_colaborador_cargo" id="grava_colaborador_cargo" class="form-control" required>  
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_cargo ORDER BY cargo";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['cargo'].'">'.$row_cat_post['cargo'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                                
                                            </div>
                                                              
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Setor</label>
                                                <input type="text" class="form-control" name="grava_colaborador_setor"id="grava_colaborador_setor" readonly=???true???/>
                                            </div>
                                            
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Sal??rio</label>
                                                <input type="text" class="form-control" name="grava_colaborador_salario"id="grava_colaborador_salario" readonly=???true???/>
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Condi????o</label>
                                                <select name="grava_colaborador_condicao" id="grava_colaborador_condicao" class="form-control" required>
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_condicao";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['condicao'].'">'.$row_cat_post['condicao'].'</option>';
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
                                        <th style="display:none;">ID</th>
                                        <th>Nome</th>
                                        <th>Celular</th>
                                        <th>E-mail</th>
                                        <th>Cargo</th>
                                        <th>Condi????o</th>
                                        <th>A????es</th>
                                    </tr>
                                </thead>
                                <?php 
                                $lista_colaboradores = "SELECT * FROM tb_colaboradores";
                                $con = $mysqli->query($lista_colaboradores) or die ($mysqli->error);
                                while($dados = $con->fetch_array()){ ?>
                                <tbody>
                            
                                    <td style="display:none;"><?php echo $dados['id_colaborador'];?></td>
                                    <td><?php echo $dados['nome'];?></td>
                                    <td><?php echo $dados['celular'];?></td>
                                    <td><?php echo $dados['email'];?></td>
                                    <td><?php echo $dados['cargo'];?></td>
                                    <td><?php echo $dados['condicao'];?></td>
                                    <td>  
                                    <i class="fas fa-eye ml-1" title="Visualizar" data-toggle="modal" data-target="#view_colaboradores_modal" class="btnEditar" onclick="editar(this)"></i>
                                    <i class="fas fa-edit ml-1" title="Editar" data-toggle="modal" data-target="#edita_colaboradores_modal" class="btnEditar" onclick="editar(this)"></i>
                                    <button type="submit" class="fas fa-trash ml-1" title="Deletar" onclick="if(confirm('Tem certeza que deseja deletar o usu??rio: <?php echo $dados['nome'];?> ?'))
		                            location.href='../model/delete_colaboradores.php?id_colaborador=<?php echo $dados['id_colaborador']; ?>';" ></button>
                                    </td>
                                    <td style="display:none;"><?php echo $dados['cpf'];?></td>
                                    <td style="display:none;"><?php echo $dados['rg'];?></td>
                                    <td style="display:none;"><?php echo date('d/m/Y', strtotime($dados['nascimento']));?></td>
                                    <td style="display:none;"><?php echo date('d/m/Y', strtotime($dados['admissao']));?></td>
                                    <td style="display:none;"><?php echo $dados['sexo'];?></td>
                                    <td style="display:none;"><?php echo $dados['telefone'];?></td>
                                    <td style="display:none;"><?php echo $dados['cep'];?></td>
                                    <td style="display:none;"><?php echo $dados['rua'];?></td>
                                    <td style="display:none;"><?php echo $dados['bairro'];?></td>
                                    <td style="display:none;"><?php echo $dados['numero'];?></td>
                                    <td style="display:none;"><?php echo $dados['cidade'];?></td>
                                    <td style="display:none;"><?php echo $dados['setor'];?></td>
                                    <td style="display:none;"><?php echo $dados['salario'];?></td>                                     
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
                                    <h5 class="modal-title" id="editarModalLabel">Editar colaborador</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                            <form role="form" method="POST" action="../model/edita_colaboradores.php">
                                    <fieldset>
                                        <div class="row">

                                        <input type="hidden"  class="form-control"name="modalId" id="modalId" />

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nome completo</label>
                                                <input type="text" class="form-control" name="edita_colaborador_nome" id="edita_colaborador_nome" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">CPF</label>
                                                <input type="text" class="form-control " name="edita_colaborador_cpf" id="edita_colaborador_cpf" placeholder="Insira o CPF" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">RG</label>
                                                <input type="text" class="form-control" name="edita_colaborador_rg" id="edita_colaborador_rg" maxlength="12" OnKeyPress="formatar('##.###.###-#', this)" placeholder="Insira o RG"required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nascimento</label>
                                                <input type="text" class="form-control" name="edita_colaborador_nascimento" id="edita_colaborador_nascimento" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Admiss??o</label>
                                                <input type="text" class="form-control" name="edita_colaborador_admissao" id="edita_colaborador_admissao" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Sexo</label>
                                                <select name="edita_colaborador_sexo" id="edita_colaborador_sexo" class="form-control" required>
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
                                            
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Telefone</label>
                                                <input type="text" class="form-control" name="edita_colaborador_telefone"id="edita_colaborador_telefone" maxlength="12" OnKeyPress="formatar('## ####-####', this)" placeholder="N??mero residencial" required/>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Celular</label>
                                                <input type="text" class="form-control" name="edita_colaborador_celular"id="edita_colaborador_celular" maxlength="13" OnKeyPress="formatar('## #####-####', this)" placeholder="Insira o celular" required/>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" class="form-control" name="edita_colaborador_email"id="edita_colaborador_email" maxlength="30" placeholder="Insira o e-mail" required/>
                                            </div>
                                            
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Condi????o</label>
                                                <select name="edita_colaborador_condicao" id="edita_colaborador_condicao" class="form-control" required>
                                                    <option value="">Selecione</option>
                                                    <?php
					                                $result_cat_post = "SELECT * FROM tb_condicao";
					                                $resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					                                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						                            echo '<option value="'.$row_cat_post['condicao'].'">'.$row_cat_post['condicao'].'</option>';
					                                }
				                                    ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">CEP</label>
                                                <input type="text" class="form-control" name="edita_colaborador_cep"id="edita_colaborador_cep"  placeholder="CEP" maxlength="9" OnKeyPress="formatar('#####-###', this)" required/>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Rua</label>
                                                <input type="text" class="form-control" name="edita_colaborador_rua"id="edita_colaborador_rua" maxlength="15" placeholder="Rua" required/>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Bairro</label>
                                                <input type="text" class="form-control" name="edita_colaborador_bairro"id="edita_colaborador_bairro" maxlength="15" placeholder="Bairro" required/>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">N??</label>
                                                <input type="text" class="form-control" name="edita_colaborador_numero"id="edita_colaborador_numero" maxlength="4" placeholder="N??mero" required/>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cidade</label>
                                                <input type="text" class="form-control" name="edita_colaborador_cidade"id="edita_colaborador_cidade" maxlength="15" placeholder="Cidade" required/>
                                            </div>
                                        </div> 
                                        <div class="box-actions teste">
                                            <button type="submit" class="btn btn-primary">Editar colaborador</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>		
                        </div>
                        </div>
                        </div>


                        <div class="modal fade" id="view_colaboradores_modal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Visualizar dados</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form">
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nome completo</label>
                                                <input type="text" class="form-control" name="view_colaborador_nome" id="view_colaborador_nome" placeholder="Insira seu nome" disabled="">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">CPF</label>
                                                <input type="text" class="form-control " name="view_colaborador_cpf" id="view_colaborador_cpf" placeholder="Insira o CPF" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" disabled="">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">RG</label>
                                                <input type="text" class="form-control" name="view_colaborador_rg" id="view_colaborador_rg" maxlength="12" OnKeyPress="formatar('##.###.###-#', this)" placeholder="Insira o RG" disabled="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nascimento</label>
                                                <input type="text" class="form-control" name="view_colaborador_nascimento" id="view_colaborador_nascimento" value="  /  /  " placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)" disabled="">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Admiss??o</label>
                                                <input type="text" class="form-control" name="view_colaborador_admissao" id="view_colaborador_admissao" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)" disabled="">
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Sexo</label>
                                                <input type="text" class="form-control" name="view_colaborador_sexo" id="view_colaborador_sexo" disabled="">
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Telefone</label>
                                                <input type="text" class="form-control" name="view_colaborador_telefone"id="view_colaborador_telefone" maxlength="12" OnKeyPress="formatar('## ####-####', this)" placeholder="N??mero residencial" disabled="" />
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Celular</label>
                                                <input type="text" class="form-control" name="view_colaborador_celular"id="view_colaborador_celular" maxlength="13" OnKeyPress="formatar('## #####-####', this)" placeholder="Insira o celular" disabled="" />
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" class="form-control" name="view_colaborador_email"id="view_colaborador_email" maxlength="30" placeholder="Insira o e-mail" disabled=""/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">CEP</label>
                                                <input type="text" class="form-control" name="view_colaborador_cep"id="view_colaborador_cep"  placeholder="CEP" maxlength="9" OnKeyPress="formatar('#####-###', this)" disabled="" />
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">Rua</label>
                                                <input type="text" class="form-control" name="view_colaborador_rua"id="view_colaborador_rua" maxlength="15" placeholder="Rua" disabled="" />
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Bairro</label>
                                                <input type="text" class="form-control" name="view_colaborador_bairro"id="view_colaborador_bairro" maxlength="15" placeholder="Bairro" disabled="" />
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="exampleInputEmail1">N??</label>
                                                <input type="text" class="form-control" name="view_colaborador_numero"id="view_colaborador_numero" maxlength="4" placeholder="N??mero" disabled="" />
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cidade</label>
                                                <input type="text" class="form-control" name="view_colaborador_cidade"id="view_colaborador_cidade" maxlength="15" placeholder="Cidade" disabled="" />
                                            </div>
                                        </div>

                                        <div class="row">
                                        
                                        <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <input type="text" class="form-control" name="view_colaborador_cargo"id="view_colaborador_cargo"  disabled=""/>
                                            </div>
                                        
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Setor</label>
                                                <input type="text" class="form-control" name="view_colaborador_setor"id="view_colaborador_setor"  disabled=""/>
                                            </div>
                                           
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Sal??rio</label>
                                                <input type="text" class="form-control" name="view_colaborador_salario"id="view_colaborador_salario"  disabled=""/>
                                            </div>
                                            
                                            <div class="form-group col-lg-3">
                                                <label for="exampleInputEmail1">Condi????o</label>
                                                <input type="text" class="form-control" name="view_colaborador_condicao"id="view_colaborador_condicao"  disabled=""/>
                                            </div>

                                            


                                        </div>
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

    function formatar(mascara, documento){
        var i = documento.value.length;
        var saida = mascara.substring(0,1);
        var texto = mascara.substring(i)
        
        if (texto.substring(0,1) != saida){
                    documento.value += texto.substring(0,1);
        }
    }
    </script>

<script>

function editar(e) {
  var linha = $(e).closest("tr");
  var id = linha.find("td:eq(0)").text().trim();
  var nome = linha.find("td:eq(1)").text().trim();
  var cpf = linha.find("td:eq(7)").text().trim();
  var rg = linha.find("td:eq(8)").text().trim();
  var nascimento = linha.find("td:eq(9)").text().trim();
  var admissao = linha.find("td:eq(10)").text().trim();
  var sexo = linha.find("td:eq(11)").text().trim();
  var telefone = linha.find("td:eq(12)").text().trim();
  var celular = linha.find("td:eq(2)").text().trim();
  var email = linha.find("td:eq(3)").text().trim();
  var condicao = linha.find("td:eq(5)").text().trim();
  var cep = linha.find("td:eq(13)").text().trim();
  var rua = linha.find("td:eq(14)").text().trim();
  var bairro = linha.find("td:eq(15)").text().trim();
  var numero = linha.find("td:eq(16)").text().trim();
  var cidade = linha.find("td:eq(17)").text().trim();
  var setor = linha.find("td:eq(18)").text().trim();
  var cargo = linha.find("td:eq(4)").text().trim();
  var salario = linha.find("td:eq(19)").text().trim();
  
  
  $("#modalId").val(id);
  $("#edita_colaborador_nome").val(nome);
  $("#edita_colaborador_cpf").val(cpf);
  $("#edita_colaborador_rg").val(rg);
  $("#edita_colaborador_nascimento").val(nascimento);
  $("#edita_colaborador_admissao").val(admissao);
  $("#edita_colaborador_sexo").val(sexo);
  $("#edita_colaborador_telefone").val(telefone);
  $("#edita_colaborador_celular").val(celular);
  $("#edita_colaborador_email").val(email);
  $("#edita_colaborador_condicao").val(condicao);
  $("#edita_colaborador_cep").val(cep);
  $("#edita_colaborador_rua").val(rua);
  $("#edita_colaborador_bairro").val(bairro);
  $("#edita_colaborador_numero").val(numero);
  $("#edita_colaborador_cidade").val(cidade);
  
  $("#view_colaborador_nome").val(nome);
  $("#view_colaborador_cpf").val(cpf);
  $("#view_colaborador_rg").val(rg);
  $("#view_colaborador_nascimento").val(nascimento);
  $("#view_colaborador_admissao").val(admissao);
  $("#view_colaborador_sexo").val(sexo);
  $("#view_colaborador_telefone").val(telefone);
  $("#view_colaborador_celular").val(celular);
  $("#view_colaborador_email").val(email);
  $("#view_colaborador_condicao").val(condicao);
  $("#view_colaborador_cep").val(cep);
  $("#view_colaborador_rua").val(rua);
  $("#view_colaborador_bairro").val(bairro);
  $("#view_colaborador_numero").val(numero);
  $("#view_colaborador_cidade").val(cidade);
  $("#view_colaborador_setor").val(setor);
  $("#view_colaborador_cargo").val(cargo);
  $("#view_colaborador_salario").val(salario); }
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

<script type="text/javascript" >
    function limpa_formul??rio_cep() {
            document.getElementById('grava_colaborador_rua').value=("");
            document.getElementById('grava_colaborador_bairro').value=("");
            document.getElementById('grava_colaborador_cidade').value=("");
    }
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('grava_colaborador_rua').value=(conteudo.logradouro);
            document.getElementById('grava_colaborador_bairro').value=(conteudo.bairro);
            document.getElementById('grava_colaborador_cidade').value=(conteudo.localidade);
        }
        else {
            limpa_formul??rio_cep();
            alert("CEP n??o encontrado.");
        }
    }
    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                document.getElementById('grava_colaborador_rua').value="...";
                document.getElementById('grava_colaborador_bairro').value="...";
                document.getElementById('grava_colaborador_cidade').value="...";
                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } 
            else {
                limpa_formul??rio_cep();
                alert("Formato de CEP inv??lido.");
            }
        }
        else {
            limpa_formul??rio_cep();
        }
    };
    </script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
            <script type='text/javascript'>
                $(document).ready(function(){
                    $("select[name='grava_colaborador_cargo']").blur(function(){
                        var $colaborador_setor = $("input[name='grava_colaborador_setor']");
                        var $colaborador_salario = $("input[name='grava_colaborador_salario']");
                        $.getJSON('../model/pesquisa_cargo.php',{ 
                            codigo: $( this ).val() 
                        },function( json ){
                            $colaborador_setor.val( json.colaborador_setor );
                            $colaborador_salario.val( json.colaborador_salario );
                        });
                    });
                });
            </script>

</body>
</html>