<?php
session_start();
include ("verifica_login.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="view/css/bulma.min.css" />
		<link rel="stylesheet" type="text/css" href="view/css/login.css">
	</head>

	<body>
		<section class="hero is-success is-fullheight">
			<div class="hero-body">
				<div class="container has-text-centered">
					<div class="column is-4 is-offset-4">
					<?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
					<div class="box">
							<form method="POST" action="model/login.php" >
								<div class="field">
									<div class="control">
										<input name="usuario" id="usuario" class="input is-large" placeholder="Seu usuário" autofocus="" required>
									</div>
								</div>
								<div class="field">
									<div class="control">
										<input name="senha" id="senha" class="input is-large" type="password" placeholder="Sua senha" required>
									</div>
								</div>
								<button type="submit" class="button is-block is-link is-large is-fullwidth" name="entrar" id="entrar" >Entrar</button>
							</form>
						</div>
						<h7>Todos os direitos reservados | Cybernet Provedor © 2020</h7>
					</div>
				</div>
			</div>
</section>
	</body>
</html>