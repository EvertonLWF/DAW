<link rel="stylesheet" type="text/css" href="style.css">

<?php
session_start();
	require_once('conexao.php');
	require_once('function.php');
	if(isset($_POST['nome'])&&!empty($_POST['nome'])&&isset($_POST['senha'])&&!empty($_POST['senha'])){
		$nome = $_POST['nome'];
		$_SESSION['nome']=$nome;
		$senha = $_POST ['senha'];
		$var = verificarLogin($nome,$senha);
		$v = pg_fetch_array($var);
		if($v!= true){
			header("location:../index.html");
		}
		$img = $v['img'];
		$home = $v['home'];
		$email = $v['email'];
?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/navbar-fixed/navbar-top-fixed.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title>login</title>
	</head>
	<body>
		<div class="cabecalho">
			<h4>Sera bem vindo: <?php echo $nome;?></h4>
			<button id="btn1">Lista de usuarios</button>
			<button id="btn2">Editar perfil</button>
			<button id="btn3">Logout</button>
			<button id="btn4">Deletar seu perfil?</button>
		</div>
		<div class="corpo">
			<table class="table">
				<thead>
				<tr>
					<th scope="col">Foto</th>
					<th scope="col">Id</th>
					<th scope="col">Nome</th>
					<th scope="col">Email</th>
					<th scope="col">Cidade</th>
				</tr>
			</thead>
			<tbody class="tbody">
				<?php
					$u = exibe();
					$users = pg_fetch_all($u);
					if($users == true){
						foreach ($users as $key) {
							$html ='<tr>
										<td><img src =../img/'.$key['img'].'></td>
										<td>'.$key['id_user'].'</td>
										<td>'.$key['nome'].'</td>
										<td>'.$key['email'].'</td>
										<td>'.$key['home'].'</td>';
							echo $html;
						}
					}
				?>
			</tbody>
			</table>
		</div>
		<div class="editar">
			<form method="POST" action="editar.php">
				<center>
  	 			nome: <br><br>
  				<input type="text" name="nome" id="nome" value="<?php echo $nome;?>"><br>
  	            senha: <br><br>
		  	    <input type="password" name="senha" id="senha" value="<?php echo $senha;?>"><br>
		  	    email: <br><br>
		  	    <input type="text" name="email" id="email" value="<?php echo $email;?>"><br>
		  	    imagem: <br><br>
	            <input type="file" name="img" id="img" value="<?php echo $img;?>"><br>
  				endereço: <br><br>
  	 			<input type="text" name="home" id="home" value="<?php echo $home;?>"><br><br>
  	 			<input type="submit" value="Salvar">
  	 			</center>

  		</form>


		</div>
		<script type="text/javascript" src="../script/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../script/script.js"></script>
	</body>
	</html>
	<?php }else{
		header("location:../index.html");		
	}
	
	 ?>