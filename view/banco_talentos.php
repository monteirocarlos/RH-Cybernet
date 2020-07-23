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
        <title>Banco de talentos</title>
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
                    <h1>BANCO DE TALENTOS</h1>
                    </div>
                    <br>
                    <form role="form" method="POST" action="../model/grava_ferias.php">
                                    <fieldset>
                                    
                                    <div class="row">
                                    
                                    <div class="form-group col-lg-12">
                                                <label for="exampleInputEmail1">Nome do canditado</label>
                                                <input type="text" class="form-control" name="grava_ferias_cargo" id="grava_ferias_cargo">
                                    </div>
      
                                    <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Setor correspondente</label>
                                                <select name="id_setor" id="id_setor" class="form-control" required>
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
                                                <label for="exampleInputEmail1">Avaliação do canditado</label>
                                                <select name="grava_ferias_adiantamento" id="grava_ferias_adiantamento" class="form-control" >
                                                    <option value="">Selecione...</option>
                                                    <option value="Sim">Ótimo</option>
                                                    <option value="Não">Bom</option>
                                                    <option value="Não">Regular</option>
                                                    <option value="Não">Ruim</option>
                                                    <option value="Não">Péssimo</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Data avaliativa</label>
                                                <input type="date" class="form-control" name="grava_ferias_data" id="grava_ferias_data" placeholder="dd/mm/aaaa" maxlength="10" OnKeyPress="formatar('##/##/####', this)">
                                            </div>
                                            
                                            <div class="form-group col-lg-12">
                                                <input type="file"  name="grava_ferias_cargo" id="grava_ferias_cargo">
                                             </div>
                                            
                                            </fieldset>

                                            <div class="teste">
                                            <button type="submit" class="btn btn-primary">Inserir no banco</button>
                                            </div>
                                 
                                </form>
                    </div>

                </main>
               
            <?php include "footer.php" ?>
            </div>
            </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    </body>
</html>
