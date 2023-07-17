<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("../../php/connect.php");
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (empty($dados['genero'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo primeiro nome!</div>"];
}

if (empty($dados['pri_nome'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo primeiro nome!</div>"];
}

if (empty($dados['ult_nome'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo último nome!</div>"];
} elseif (empty($dados['username'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo username!</div>"];
} elseif (empty($dados['data_nasc'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo data de nascimento!</div>"];
} elseif (empty($dados['email'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo email!</div>"];
} elseif (empty($dados['nif'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo NIF!</div>"];
} elseif (empty($dados['pass'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Palavra Passe!</div>"];
} elseif (empty($dados['confir_pass'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário confirmar a palavra passe!</div>"];
} else {
    $query_usuario_pes = "SELECT cliente_id FROM clientes WHERE email=?";
    $result_usuario = $conn->prepare($query_usuario_pes);
    $result_usuario->bind_param('s', $dados['email']);
    $result_usuario->execute();
    $result_usuario->store_result();

    if ($result_usuario->num_rows != 0) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: O e-mail já está cadastrado!</div>"];
    } else {
        if ($dados['pass'] !== $dados['confir_pass']) {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: As palavras-passe não correspondem!</div>"];
        } else {

            $senha_cript = sha1($dados['pass']);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $chave = $verification_code;

            $query_usuario = "INSERT INTO clientes (primeiro_nome,ultimo_nome, email, password,data_nascimento,nif,username,genero,code) VALUES (?, ?, ?, ?,?,?,?,?, ?)";
            $cad_usuario = $conn->prepare($query_usuario);
            $cad_usuario->bind_param('ssssssssi', $dados['pri_nome'],  $dados['ult_nome'],  $dados['email'], $senha_cript, $dados['data_nasc'], $dados['nif'], $dados['username'], $dados['genero'],  $verification_code);

            $cad_usuario->execute();
            if ($cad_usuario->affected_rows) {
                // Sucesso no cadastro
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
                    $mail->addAddress($dados['email'], $dados['pri_nome'] . ' ' . $dados['ult_nome']);

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
                    header('Location: ../../?p=22');
                    exit();
                    // Redireciona para a página ?p=8
                  
                } catch (Exception $e) {
                    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso.</div>"];
                }

                echo json_encode($retorna);
            }
        }
    }
}

?>

<?php if ($retorna['erro']): ?>
    <div class='alert alert-danger' role='alert'><?= $retorna['msg'] ?></div>
<?php else: ?>
    <div class='alert alert-success' role='alert'><?= $retorna['msg'] ?></div>
<?php endif; ?>
