<?php

session_start();
require("../../php/connect.php");
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo de e-mail foi preenchido
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Verifica se o email já está registrado
        $checkEmailQuery = "SELECT * FROM newsletter_inscritos WHERE email = '$email'";
        $checkEmailResult = $conn->query($checkEmailQuery);

        if ($checkEmailResult->num_rows > 0) {
            // Se o email já estiver registrado, exibe uma mensagem informando
            $_SESSION['status'] = "Este email já está registrado na newsletter.";
            header('Location: ../../');
            exit();
        } else {
            // Caso contrário, insere o email no banco de dados
            $sql = "INSERT INTO newsletter_inscritos (email) VALUES ('$email')";
            if ($conn->query($sql) === TRUE) {
                // Configuração do envio de e-mail
                $mail = new PHPMailer(true);
                try {
                // Configurações do servidor SMTP
                $mail->CharSet = "UTF-8";
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Port = 587;
                $mail->Username = 'inforbarty@gmail.com';
                $mail->Password = 'vripjgbzuchuaztv';

                // Remetente e destinatário
                $mail->setFrom('inforbarty@gmail.com', 'Barty Barbearia');
                $mail->addAddress($email);

                // Conteúdo do e-mail
                $mail->isHTML(true);
                $mail->Subject = 'Confirmação de Assinatura da Newsletter';
                $mail->Body = "  <body style='margin: 0px;'>
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
                                                 Confirmação de assinatura da Newsletter
                                                </h2>
                                            </td>
                                        </tr>
                                        <tr> 
  
                                            <td>                              
                   <h4 style='text-align: center; margin: 0;'>Você se inscreveu com sucesso na nossa Newsletter!</h4>
  
                      <br>
  
  
  
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

                // Envia o e-mail de confirmação
                $mail->send();

                // Redireciona o usuário para uma página de sucesso
                $_SESSION['status'] = "Sucesso na assinatura da Newletter<br>Pode ver a confirmação que foi enviada no seu email no seu email";
                header('Location: ../../');
                exit();
            } catch (Exception $e) {
                // Se ocorrer um erro no envio do e-mail, redireciona o usuário para uma página de erro
                $_SESSION['status'] = "Erro ao assinar a Newsletter: {$mail->ErrorInfo}";
                header('Location: ../../?p=1');
                exit();
            }
        }
    }
}
}
?>
