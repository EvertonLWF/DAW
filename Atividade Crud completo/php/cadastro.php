<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('conexao.php');
require_once('function.php');

if(isset($_POST['nome'])&&!empty($_POST['nome'])&&isset($_POST['senha'])&&!empty($_POST['senha'])&&isset($_POST['email'])&&!empty($_POST['email'])&&isset($_POST['img'])&&!empty($_POST['img'])&&isset($_POST['home'])&&!empty($_POST['home'])){

	$nome = $_POST['nome'];
	$senha = $_POST ['senha'];
	$email = $_POST ['email'];
	$img = $_POST ['img'];
	$home = $_POST ['home'];
	$var = verificar($email);
	if(pg_num_rows($var)>0){
		
		?><!DOCTYPE html>
		<html>
		<head>
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<meta charset="utf-8">
			<title>Pagina inicial</title>
		</head>
		<body onload="jaExiste();">
			<form action="login.php" method="POST">
				Nome:<br>
				<input type="text" name="nome"><br>
				Senha:<br>
				<input type="password" name="senha">
				<input type="submit" value="login"><br><br>
			</form>
			<button id="cadastro">Cadastro</button>
			<form method="POST" action="cadastro.php" class="cadastroB">
				<center>
					CADASTRO<br><br>
					nome:
					<input type="text" name="nome" id="nome"><br>
					senha:
					<input type="password" name="senha" id="senha"><br>
					email:
					<input type="text" name="email" id="email"><br>
					endereço:
					<input type="text" name="home" id="home"><br><br>
					imagem:
					<input type="file" name="img" id="img"><br><br><br>

				</center>
				<input type="submit" value="Salvar">
			</form>

			<script type="text/javascript" src="../script/jquery-3.3.1.min.js"></script>
			<script type="text/javascript" src="../script/script.js"></script>

		</body>
		</html>
		<?php
	}else{
		cadastro($nome,$email,$senha,$img,$home);
		header("location:../index.html");
	}
}else{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<meta charset="utf-8">
		<title>Pagina inicial</title>
	</head>
	<body onload="load();">
		<form action="login.php" method="POST">
			Nome:<br>
			<input type="text" name="nome"><br>
			Senha:<br>
			<input type="password" name="senha">
			<input type="submit" value="login"><br><br>
		</form>
		<button id="cadastro">Cadastro</button>
		<form method="POST" action="cadastro.php" class="cadastroC">
			<center>
				CADASTRO<br><br>
				nome:
				<input type="text" name="nome" id="nome"><br>
				senha:
				<input type="password" name="senha" id="senha"><br>
				email:
				<input type="text" name="email" id="email"><br>
				endereço:
				<input type="text" name="home" id="home"><br><br>
				imagem:
				<input type="file" name="img" id="img"><br><br><br>

			</center>
			<input type="submit" value="Salvar">
		</form>

		<script type="text/javascript" src="../script/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../script/script.js"></script>

	</body>
	</html>
	<?php
}

?>