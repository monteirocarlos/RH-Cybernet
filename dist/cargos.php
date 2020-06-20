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
                        <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#editarModal" >Novo</button>&nbsp 		
                        <button type="button" class="btn btn-success">Alterar</button>
                    </div>
                    
                    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel">Novo cargo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <form role="form" method="POST">
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <input type="text" class="form-control" name="nome" id="txtnome" placeholder="Insira seu nome">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Nível</label>
                                                <select  name="nivel" class="form-control">
                                                    <option value="">Selecione algo</option>
                                                    <option value="0">Júnior</option>
                                                    <option value="1">Pleno</option>
                                                    <option value="1">Sênior</option>
                                                    <option value="1">Master</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Setor</label>
                                                <select name="setor" class="form-control">
                                                    <option value="">Selecione algo</option>
                                                    <option value="0">NOC</option>
                                                    <option value="1">Ativação</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="exampleInputEmail1">Descrição</label>
                                                <textarea type="textarea" class="form-control" name="nome" id="txtnome" placeholder="Insira seu nome"></textarea>
                                            </div>
                                        <div class="box-actions">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                            <button class="btn btn-danger">Editar</button>
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
                                        <th>Cargo</th>
                                        <th>Nível</th>
                                        <th>Setor</th>
                                        <th>Descrição</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>Edinburgh</td>
                                    </tr>
                      
                                </tbody>
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
