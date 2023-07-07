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
    } 
    elseif (empty($dados['username'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo username!</div>"];
    }elseif (empty($dados['data_nasc'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo data de nascimento!</div>"];
    }
    elseif (empty($dados['email'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo email!</div>"];
    }
    elseif (empty($dados['nif'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo email!</div>"];
    }
    elseif (empty($dados['pass'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Palavra Passe!</div>"];
    }
    elseif (empty($dados['confir_pass'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário confirmar a palavra passe!</div>"];
    } else {

        $query_usuario_pes = "SELECT cliente_id FROM clientes WHERE email=?";
        $result_usuario = $conn->prepare($query_usuario_pes);
        $result_usuario->bind_param('s', $dados['email']);
        $result_usuario->execute();
        $result_usuario->store_result();
        
        if ($result_usuario->num_rows != 0) {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: O e-mail já está cadastrado!</div>"];
        }else {
            if ($dados['pass'] !== $dados['confir_pass']) {
                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: As palavras-passe não correspondem!</div>"];
            }
         else {
            $query_usuario = "INSERT INTO clientes (primeiro_nome,ultimo_nome, email, password,data_nascimento,nif,username,genero,code) VALUES (?, ?, ?, ?,?,?,?,?, ?)";
            $cad_usuario = $conn->prepare($query_usuario);
            $cad_usuario->bind_param('ssssss', $dados['genero'], $dados['pri_nome'],  $dados['ult_nome'], $dados['username'], $dados['email'],$dados['nif'], $senha_cript, $chave);
        
            $senha_cript = password_hash($dados['pass'], PASSWORD_DEFAULT);
            $chave = password_hash($dados['email'] . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
        
            $cad_usuario->execute();
    
        if ($cad_usuario->affected_rows) {
            // Sucesso no cadastro
    

            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->CharSet = "UTF-8";
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Port = 587;
                $mail->Username = 'inforbarty@gmail.com';
                $mail->Password = 'uvbeaaqiddgpmtio';

                //Recipients
                $mail->setFrom('inforbarty@gmail.com', 'Barty Barbearia');
                $mail->addAddress($dados['email'], $dados['pri_nome'] . ' ' . $dados['ult_nome']);


                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Confirma o e-mail';
                $mail->Body    = "Prezado(a) " . $dados['pri_nome'] . ' ' . $dados['ult_nome']. ".<br><br>Agradecemos a sua solicitação de cadastramento em nosso site!<br><br>Para que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicanco no link abaixo: <br><br> <a href='http://localhost/pages/login/confirmar-email.php?code=$chave'>Clique aqui</a><br><br>Esta mensagem foi enviada a você pela empresa XXX.<br>Você está recebendo porque está cadastrado no banco de dados da empresa XXX. Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.<br><br>";
                $mail->AltBody = "Prezado(a) " . $dados['pri_nome'] . ' ' . $dados['ult_nome']. ".\n\nAgradecemos a sua solicitação de cadastramento em nosso site!\n\nPara que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicanco no link abaixo: \n\n http://localhost/pages/login/confirmar-email.php?code=$chave \n\nEsta mensagem foi enviada a você pela empresa XXX.\nVocê está recebendo porque está cadastrado no banco de dados da empresa XXX. Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.\n\n";
                $mail->send();

                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso. Necessário acessar a caixa de e-mail para confimar o e-mail!</div>"];
            } catch (Exception $e) {
                //$retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];

                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso.</div>"];
            }
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
        }
    }
}
}

echo json_encode($retorna);
