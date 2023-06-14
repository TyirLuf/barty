<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['btn_enviar'])){
    $name = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    try {
        $mail -> isSMTP();
        $mail -> SMTPAuth = true;
        $mail -> Host = "smtp.gmail.com";
        $mail -> Username = "yourmail@gmail.com";
        $mail -> Password = "iqyfgllrjpwbpuey";
        $mail -> SMTPSecure = "tls";
        $mail -> Port = '587';

        $mail -> setFrom('yourmail@gmail.com');
        $mail -> addAddress("inforbarty@gmail.com");

        $mail -> isHTML(true);
        $mail -> Subject = 'Message Received from Contact:'. $name;
        $mail -> Body = "Nome: $name <br> Email: $email <br> Assunto: $assunto <br>Messagem: $mensagem";

        $mail -> send();
        $alert = "<div class='alert-success'><span>Mensagem enviada! Obrigado por nos contatar.</span></div>";

    } catch (Exception $e) {
        
    }

}
?>



