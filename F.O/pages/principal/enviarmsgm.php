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
    $mail ->Host = 'smtp.gmail.com';
    $mail ->SMTPAuth = true;
    $mail ->Port = 587;
    $mail ->Username = 'inforbarty@gmail.com';
    $mail ->Password = 'uvbeaaqiddgpmtio';

    // Remetente
    $mail->setFrom($email, $name);
   
    // Destinatario
    $mail->addAddress('inforbarty@gmail.com', 'Barty Barbearia');

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
