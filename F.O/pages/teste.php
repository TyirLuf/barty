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
    }
    if (empty($dados['pri_nome'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo primeiro nome!</div>"];
    }
    if (empty($dados['ult_nome'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo ultimo nome!</div>"];
    } elseif (empty($dados['username'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo username!</div>"];
    } elseif (empty($dados['data_nasc'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo data de nascimento!</div>"];
    } elseif (empty($dados['email'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo email!</div>"];
    } elseif (empty($dados['nif'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo email!</div>"];
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
                        $mail->Password = 'uvbeaaqiddgpmtio';
                    
                        // Recipients
                        $mail->setFrom('inforbarty@gmail.com', 'Barty Barbearia');
                        $mail->addAddress($dados['email'], $dados['pri_nome'] . ' ' . $dados['ult_nome']);
                    
                        $mail->isHTML(true);
                    
                        $mail->Subject = 'Confirmação de E-mail';
                    
                        $mail->Body = "
                        <body style='margin:0px;'>
                        <table width='100%' border='0' cellspacing='0' cellpadding='50' style='background-color:#BCBCBC; margin:0px;'>
                            <tbody>
                                <tr>
                                    <td height='331' valign='top'>
                                        <table width='90%' border='0' align='center' cellpadding='50' style='background-color:#FFFFFF;'>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h2 style='text-align: center;'>Confirmação de E-mail</h2>
                                                        <p style='text-align: center;'>
                                                            Prezado(a) " . $dados['pri_nome'] . ' ' . $dados['ult_nome'] . ",<br><br>
                                                            Agradecemos a sua solicitação de cadastramento em nosso site!<br><br>
                                                            Para que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicando no link abaixo:<br><br>
                                                            <a href='" . $verification_code . "'>" . $verification_code . "</a><br><br>
                                                            Esta mensagem foi enviada a você pela empresa XXX.<br>
                                                            Você está recebendo porque está cadastrado no banco de dados da empresa XXX. Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </body>";
                    
                    
                        $mail->send();
                    
                        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso. Necessário acessar a caixa de e-mail para confirmar o e-mail!</div>"];
                    
                        // Redireciona para a página ?p=8
                        header('Location: ./?p=22');
                        exit;
                    } catch (Exception $e) {
                        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso.</div>"];
                    }
                    
                    echo json_encode($retorna);
                    ?>