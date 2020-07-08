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
        <title>Promoções de usuários</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/teste.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <?php
    session_start();
    include('menu.php');
    ?>

            <div id="layoutSidenav_content">
                <div class="card mb-4">
                    <div class="teste">
                        <h1>PROMOÇÕES</h1><br>
                        <div class="container">
                        <div class="md-form mt-0">
                        <input class="form-control" type="text" placeholder="Insira o nome do colaborador" aria-label="Search"><br>
                        <button type="button" class="btn btn-primary margin-top" data-toggle="modal">Pesquisar</button>&nbsp
                        </div>			
                        </div>
                        </div>
                    </div>


        <?php include "footer.php" ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    
            <script>
            function editar(e) {
            var linha = $(e).closest("tr");
            var id = linha.find("td:eq(0)").text().trim();
            var nome = linha.find("td:eq(1)").text().trim();
            var usuario = linha.find("td:eq(2)").text().trim();
            var senha = linha.find("td:eq(3)").text().trim();  
            
        
            $("#modalId").val(id);    
            $("#edita_usuario_nome").val(nome);
            $("#edita_usuario_usuario").val(usuario);
            $("#edita_usuario_senha").val(senha);
            }
            </script>
    </body>
</html>
