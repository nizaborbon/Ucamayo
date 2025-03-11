<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

$mail = new phpmailer();
$mail->isSMTP(); 
$mail->SMTPDebug = 2;
$mail->Host = "smtp-mail.outlook.com";
$mail->Port = 587; 
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

$mail->Username = "nyomi_inu16@hotmail.com"; 
$mail->Password = "Fl0r.De.Lot0";

$mail->From = $_POST['email'];
$mail->FromName = $_POST['name'];

$mail->Timeout=30;

//eligiendo correo destino
if(isset($_POST['btnContacto']))
{
   $mail->AddAddress("nizaborbon@hotmail.com");
}

if (isset($_POST['btnUnidadEsp'])) 
{
   $mail->AddAddress("kneesa_@hotmail.com");
}


$mail->Subject = $_POST['subject'];
// mensaje formato html
$mail->Body = $_POST['message'];
// mensaje formato texto por si  
$mail->AltBody = $_POST['message'];

//si se envia la variable $exito es true
$exito = $mail->Send();

$intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
	sleep(5);
     	//echo $mail->ErrorInfo;
     	$exito = $mail->Send();
     	$intentos=$intentos+1;	
	
   }

if(!$exito)
   {
      echo "Problemas enviando correo electrónico a ".$valor;
	   echo "<br/>".$mail->ErrorInfo;	
   }
   else
   {
	  echo "<script language='javascript'>
   alert('Mensaje enviado, muchas gracias.');
   window.location.href = 'index.html';
   </script>";
   } 
?>