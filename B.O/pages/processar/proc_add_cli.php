<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("../../php/connect.php");
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $primeiro_nome = $_POST["prim_nome"];
    $email = $_POST["email"];
    $password = sha1($_POST["pass"]); // Aplicar o SHA1 na senha
    $nif = $_POST["nif"];
    $genero = $_POST["genero"];
    $ultimo_nome = $_POST["ult_nome"];
    $username = $_POST["username"];
    $confirmar_password = sha1($_POST["confir_pass"]); // Aplicar o SHA1 na senha de confirmação
    $telefone = $_POST["telefone"];
    $data_nascimento = $_POST["data_nasc"];




    //gerar codigo de verficação
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $chave = $verification_code;

    $sql = "INSERT INTO clientes (primeiro_nome, email, password, nif, genero, ultimo_nome, username, telefone, data_nascimento, code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $cad_usuario = $conn->prepare($sql);
    $cad_usuario->bind_param(
        'ssssssssss',
        $primeiro_nome,
        $email,
        $password,
        $nif,
        $genero,
        $ultimo_nome,
        $username,
        $telefone,
        $data_nascimento,
        $verification_code
    );
    

    if ($cad_usuario->execute()) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = "UTF-8";
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->Username = 'inforbarty@gmail.com';
            $mail->Password = 'vripjgbzuchuaztv';

            // Recipients
            $mail->setFrom('inforbarty@gmail.com', 'Barty Barbearia');
            $mail->addAddress($email, $pri_nome . ' ' . $ult_nome);

            $mail->isHTML(true);

            $mail->Subject = 'Confirmação de E-mail';

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
                                    Confirme o seu endereço de e-mail
                                </h2>
                            </td>
                        </tr>
                        <tr> 

                            <td>                                <h4  style='text-align: center'>" . $dados['pri_nome'] . ' ' . $dados['ult_nome'] . ",</h4><br>
                                <p style='text-align: center ;'>
                                    Obrigado por se cadastrar em nosso site! <br>Para concluir o processo de registro, solicitamos que você confirme o seu endereço de e-mail utilizando o código de verificação abaixo::<br><br></p>
                                    <h2 style='text-align: center;'>" . $verification_code . "</h2><br>
                                    <button style='display: block;
                                    margin: 0 auto;
                                    text-align: center;
                                    padding: 10px 20px;
                                    background-color: #b19361;
                                    color: white;
                                    border: none;
                                    border-radius: 5px;
                                    font-size: 16px;
                                    cursor: pointer;'>
                                <a href='http://localhost/barty/f.o/?p=22' style='text-decoration: none; color: inherit;'>Verificar Código</a>
                            </button><br><br>
                            
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

            $_SESSION['status'] = "Cadastrado com sucesso. Necessário acessar a caixa de e-mail para confirmar o e-mail!";
            header('Location: ../../?p=10');
            exit();
            // Redireciona para a página ?p=8

        } catch (Exception $e) {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso.</div>"];
        }

        echo json_encode($retorna);

        // header("Location: ../../?p=1"); // redirect
        exit;
    } else {
        echo "Erro ao adicionar o funcionário: " . $cad_usuario->error;
    }

    $cad_usuario->close();
    $conn->close();
}
