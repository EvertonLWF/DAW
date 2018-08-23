<?php 
	require_once('conexao.php');
	require_once('function.php');
	$var = $_POST;
	editar($var);
	header("location:login.php");
?>