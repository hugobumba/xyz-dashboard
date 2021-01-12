<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>XYZ - Login</title>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="img/logo.jpg">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
		<style>
			.container{
				border: 1px solid grey;
				width: 50%;
				height: 80%;
				position: absolute;
				top: 10%;
				right: 25%;
				border-radius: 5px;
			}
			.row{
				position: relative;
				top: 20%;
			}
			html, body {height: 100%;}
			h1{text-align: center; position: relative; top: 10%;}
		</style>
	</head>
	<body style="background: linear-gradient(to right, #bbd2c5 0%, #536976 101%);">
		<div class="container" style="background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
			<h1>Iniciar sessão</h1>
			<div class="row justify-content-center align-items-center">
				<form method="post" action="process.php">
					<div class="form-group">
						<label>Utilizador:</label>
						<input type="text" class="form-control form-control-lg" placeholder="Utilizador" name="user" id="user">
					</div>
					<div class="form-group">
						<label>Palavra-passe:</label>
						<input type="password" class="form-control form-control-lg" placeholder="Palavra-passe" name="pass" id="pass">
					</div>
					<div style="text-align: center;">
						<button class="btn btn-outline-primary" style="cursor:pointer;" name="entrar" id="entrar">Entrar</button>
					</div>
					<h6 class="dropdown-header"  style="padding-top: 30px;"><ion-icon name="git-branch-outline"></ion-icon>Conexões: <a href="./team">Team</a>/<a href="./project">Project</a></h6>
				</form>
			</div>
		</div>
		<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
		<script src="node_modules/jquery/dist/jquery.js"></script>
		<script src="node_modules/popper.js/dist/popper.js"></script>
		<script src="node_modules/bootstrap/dist/bootstrap.js"></script>
	</body>
</html>