<?php
session_start();
	require_once('conexao.php');
	require_once('function.php');
	$var = $_SESSION['nome'];
	deletar($var);
	header("location:login.php");
?>