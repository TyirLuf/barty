<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Recupera os dados do formulário
$name = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

$mail = new PHPMailer(true); // Criação do objeto PHPMailer

try {
    $mail ->isSMTP();
    $mail ->Host = 'sandbox.smtp.mailtrap.io';
    $mail ->SMTPAuth = true;
    $mail ->Port = 2525;
    $mail ->Username = 'f0a7cd2f6e510d';
    $mail ->Password = '2a42ed87cf339e';

    // Remetente
    $mail->setFrom($email, $name);
   
    // Destinatario
    $mail->addAddress(' inforbarty@gmail.com', 'Barty Barbearia');

    $mail->isHTML(true);
    $mail->Subject = 'Mensagem Recebida do formulario de contato';
    $mail->Body = 'Nome:'.$name. ',<br>
    Email: '.$email.'<br><br>
Assunto: '.$assunto.'<br>
Mensagem: '.$mensagem.'';
    

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
