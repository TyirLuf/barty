<?php

require("../../php/connect.php");
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

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
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = 'inforbarty@gmail.com';
    $mail->Password = 'vripjgbzuchuaztv';

    // Remetente
    $mail->setFrom($email, $name);

    // Destinatario
    $mail->addAddress('inforbarty@gmail.com', 'Barty Barbearia');

    $mail->isHTML(true);
    $mail->Subject = 'Mensagem Recebida do formulario de contato';
    $mail->Body = "
    <body style='margin: 0px;'>
    <div style='background-color: #FFFFFF; margin: 0px; padding: 50px;'>
    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tbody>
            <tr>
                <td>
                    <table width='100%' border='0' align='center' cellpadding='50' style='background-color:  #f2f2f2;'>
                        <tbody>
                            <tr>
                                <td style='background-color: #e6dccc; padding: 30px 0;'>
                                    <h2 style='text-align: center; margin: 0;'>
                                        Mensagem Recebida do formulário de contato
                                    </h2>
                                </td>
                            </tr>
                            <tr> 
    
                                <td>                              
       <h4>Nome do Cliente:" . $name . "</h4>   
       <h4>Email:" . $email . "</h4>   
        <h4>Assunto: " . $data . "</h4>   
        <h4>Mensagem: " . $mensagem . "</h4>

          

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    </body>";

    $mail->send();
    $_SESSION['status'] = "Mensagem enviada com sucesso!";
    header('Location: ../../?p=6');
    exit();
} catch (Exception $e) {
    $_SESSION['status'] = "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    header('Location: ../../?p=6');
    exit();
}
