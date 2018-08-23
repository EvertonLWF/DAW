<?php
	include_once('config.php');
	$nome_arquivo = $_FILES['foto']['name'];
	$tamanho_arquivo = $_FILES['foto']['size'];
	$tipo_arquivo = $_FILES['foto']['type'];
	$arquivo_temp = $_FILES['foto']['tmp_name'];
	$local_img ="../img/$nome_arquivo";
	echo '<pre>';
	print_r($_FILES);
	echo '</pre>';



	if($sobrescrever=="nao" && file_exists($caminho."/".$nome_arquivo)){
		die("Arquivo ja existe");
	}
	if($limitar_tam == "sim" && ($tamanho_arquivo > $tamanho)){
		die("Arquivo deve ter no maximo".$tamanho."bits");
	}
	$ext = strrchr($nome_arquivo,".");

	if (($limitar_ext == "sim") && !in_array($ext,$exten_arq)){
		die("Extensão de arquivo inválida para upload");
	}

	move_uploaded_file($_FILES['foto']['tmp_name'],$local_img);
	$var = $_FILES;
	foreach ($var as $key) {
		# code...
?>
<br><br>
<img width="200" src="../img/<?php echo $key['name']; ?> ">

<?php } ?>