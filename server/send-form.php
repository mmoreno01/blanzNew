<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Mexico_City");
?>

<?php
	// require 'connect.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.phpmailer.php';
	require 'phpmailer/class.smtp.php';

	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$message=$_POST['message'];

	print_r($_POST);

	$template = file_get_contents('server/bilanz.html');
	$template = str_replace('%name%', $name, $template);
	$template = str_replace('%email%', $email, $template);
	$template = str_replace('%phone%', $phone, $template);
	$template = str_replace('%message%', $message, $template);
	

	
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
	
		$mail->Username = 'migue.moreno01@gmail.com';
		$mail->Password = 'Mibyker.23';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->From = 'migue.moreno01@gmail.com';
		$mail->FromName = 'Bilanz | Nuevo registro';
		$mail->addAddress('byker.23@gmail.com'); 
		$mail->isHTML(true);
	    $mail->CharSet = 'UTF-8';
		$mail->Subject = 'Nuevo registro de contacto'; 
		$mail->Body = $template;

	 if(!$mail->Send()) {
	 	echo "regostro exito";
		//  header('Location: ../failure.html');
		/*echo 'Mailer Error: ' . $mail->ErrorInfo;*/
	} else{
		//  header('Location: ../thankyou.html');
		//  $sql = "INSERT INTO contacto (`id`,`nombre`,`email`, `telefono`, `comentarios`) VALUES ('', '$name','$email','$phone', '$message');";
		//  $saveDB = mysqli_query($db, $sql);
	 	echo "error al registrar";
	 }
?>
