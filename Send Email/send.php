<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;


	require_once('PHP_mailer/SMTP.php');
	require_once('PHP_mailer/PHPMailer.php');
	require_once('PHP_mailer/Exception.php');

	$dest = $_POST['Destino'];
	$rem = $_POST['Email'];
	$assunto = $_POST['Assunto'];
	$msn = $_POST['Mensagem'];
	$senha =$_POST['senha'];

	$mail = new PHPMailer(true);
	try{
		$mail->SMTPDebug = 3;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $rem;
		$mail->Password = $senha;
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->CharSet = "utf-8";
		$mail->SetFrom($rem,'Administrador');
		$mail->addAddress($dest);
		$mail->addReplyTo($rem,'Administrador');
		$mail->isHTML(true);
		$mail->Subject = $assunto;
		$mail->Body = $msn;
		$mail->send();
	}catch(Exception $e){
		echo "erro",$mail->ErrorInfo;
	}
	header("location:index.html");

  ?>