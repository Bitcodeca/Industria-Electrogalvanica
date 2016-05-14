<?php

require("/home2/paginasw/public_html/indelectrogalvanica.com.ve/phpmailer/PHPMailer_5.2.0/class.phpmailer.php");

$telefono = $_POST['telefono'];
$message = $_POST['message'];
$email = $_POST['email'];
$name = $_POST['name'];

////////////////////////////////////////compra//////////////////////////////////////////

$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "localhost";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "contacto@bitcode.com.ve";  // SMTP username
$mail->Password = "bitcode0508"; // SMTP password

$mail->From = $email;
$mail->FromName = $name;
$mail->AddAddress("indelectrogalvanica@cantv.net");
$mail->WordWrap = 1000;                                 // set word wrap to 1000 characters
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = $name;
$mail->Body    = 'De: '. $name .'<br> Teléfono: '.$telefono . '<br> Email: '.$email . '<br> Mensaje: '.$message;
$mail->AltBody = 'De: '. $name .'<br> Teléfono: '.$telefono . '<br> Email: '.$email . '<br> Mensaje: '.$message;

if(!$mail->Send())
{
   echo "Intente nuevamente mas tarde. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}


echo "Message has been sent";
echo "<script>window.close();</script>";

?>