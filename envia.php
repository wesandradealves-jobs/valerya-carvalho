<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mvaleriacarv@gmail.com';                 // SMTP username
$mail->Password = 'alice2530';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->SetFrom($_POST['txtEmail'], $_POST['txtNome']);
$mail->addAddress('mvaleriacarv@gmail.com');     // Add a recipient

$mail->addReplyTo($_POST['txtEmail'], $_POST['txtNome']);

/*
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');        
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
*/ 

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'E-mail do site Valerya Carvalho';
$mail->Body    = $_POST['txtTelefone']."<br/><br/>".$_POST['txtEmail']."<br/><br/>".$_POST['txtEmpresa']."<br/><br/>".$_POST['txtRamo']."<br/><br/>".$_POST['txtMensagem'];
$mail->AltBody = $_POST['txtTelefone']."<br/><br/>".$_POST['txtEmail']."<br/><br/>".$_POST['txtEmpresa']."<br/><br/>".$_POST['txtRamo']."<br/><br/>".$_POST['txtMensagem'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('Location: index.php');
}