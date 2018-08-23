<?php


function cadastro($nome,$email,$senha,$img,$home){
	$consulta=pg_connect("host=localhost port=5432 dbname=aulalpw2 user=postgres password=feijo62378");
	$sql = "INSERT INTO users (nome,email,senha,img,home) VALUES ('".$nome."','".$email."','".$senha."','".$img."','".$home."')";
	$res = pg_query($consulta, $sql);
	return $res;
}
function read($nome){
	$consulta=pg_connect("host=localhost port=5432 dbname=aulalpw2 user=postgres password=feijo62378");
	$sql = "SELECT * FROM users WHERE nome = '".$nome."'";
	$res = pg_query($consulta, $sql);
	return $res;
}
function verificar($email){
	$consulta=pg_connect("host=localhost port=5432 dbname=aulalpw2 user=postgres password=feijo62378");
	$sql = "SELECT * FROM users WHERE email = '".$email."'";
	$res = pg_query($consulta, $sql);
	return $res;
}
function verificarLogin($nome,$senha){
	$consulta=pg_connect("host=localhost port=5432 dbname=aulalpw2 user=postgres password=feijo62378");
	$sql = "SELECT * FROM users WHERE nome = '".$nome."'AND senha ='".$senha."'";
	$r = pg_query($consulta, $sql);
	return $r;
}
function exibe(){
	$consulta=pg_connect("host=localhost port=5432 dbname=aulalpw2 user=postgres password=feijo62378");
	$sql = "SELECT * FROM users";
	$r = pg_query($consulta, $sql);
	return $r;
}
function editar($var){
	$consulta=pg_connect("host=localhost port=5432 dbname=aulalpw2 user=postgres password=feijo62378");
	$sql = "UPDATE users SET nome = '".$var['nome']."',senha = '".$var['senha']."',email = '".$var['email']."',img = '".$var['img']."',home = '".$var['home']."' ";
	$r = pg_query($consulta, $sql);
	return $r;
}
function deletar($var){
	$consulta=pg_connect("host=localhost port=5432 dbname=aulalpw2 user=postgres password=feijo62378");
	$sql = "DELETE FROM users WHERE nome = '".$var."'";
	$r = pg_query($consulta, $sql);
}
?>