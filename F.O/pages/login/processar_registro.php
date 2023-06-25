<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['cadnome'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} elseif (empty($dados['cademail'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>"];
} elseif (empty($dados['cadsenha'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>"];
} else {
    $conn = new mysqli('localhost', 'usuario', 'senha', 'banco');

    if ($conn->connect_error) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro de conexão com o banco de dados: " . $conn->connect_error . "</div>"];
    } else {
        $query_usuario_pes = "SELECT cliente_id FROM clientes WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($query_usuario_pes);
        $stmt->bind_param('s', $dados['cademail']);
        $stmt->execute();
        $result_usuario = $stmt->get_result();

        if ($result_usuario->num_rows != 0) {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: O e-mail já está cadastrado!</div>"];
        } else {
            $query_usuario = "INSERT INTO clientes (username, email, password, code) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query_usuario);
            $senha_cript = password_hash($dados['cadsenha'], PASSWORD_DEFAULT);
            $chave = password_hash($dados['cademail'] . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
            $stmt->bind_param('ssss', $dados['cadnome'], $dados['cademail'], $senha_cript, $chave);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $mail = new PHPMailer(true);

                try {
                    // Configurações do servidor de e-mail

                    $mail->CharSet = "UTF-8";
                    $mail->isSMTP();
                    $mail->Host = 'sandbox.smtp.mailtrap.io';
                    $mail->SMTPAuth = true;
                    $mail->Port = 2525;
                    $mail->Username = '4fe49e09fde8ef';
                    $mail->Password = '76c07a5408be72';

                    // Configurações do e-mail

                    $mail->setFrom('inforbarty@barty.com', 'Barber - Barty');
                    $mail->addAddress($dados['cademail'], $dados['cadnome']);

                    $mail->isHTML(true);
                    $mail->Subject = 'Confirma o e-mail';
                    $mail->Body = "Prezado(a) " . $dados['cadnome'] . ".<br><br>Obrigado por se cadastrar em nosso site!<br><br>Para confirmar o seu cadastro, por favor, clique no link abaixo: <br><br> <a href='http://localhost/barty/F.O/?p=22?code=$chave'>Clique aqui</a><br><br>Para confirmar o seu cadastro, por favor, clique no link abaixo:.<br>Se você não realizou o cadastro em nosso site, por favor, ignore este e-mail.<br>Agradecemos pela sua confiança e estamos à disposição para qualquer dúvida ou assistência.<br><br>";
                    $mail->AltBody = "Prezado(a) " . $dados['cadnome'] . ".\n\nAgradecemos a sua solicitação de cadastramento em nosso site!\n\nPara confirmar o seu cadastro, por favor, clique no link abaixo: \n\n http://localhost/barty/F.O/?p=22?code=$chave \n\nPara confirmar o seu cadastro, por favor, clique no link abaixo:.\nSe você não realizou o cadastro em nosso site, por favor, ignore este e-mail. \n Agradecemos pela sua confiança e estamos à disposição para qualquer dúvida ou assistência.\n\n";

                    $mail->send();

                    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso. Necessário acessar a caixa de e-mail para confimar o e-mail!</div>"];

                } catch (Exception $e) {
                    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso.</div>"];
                }
            } else {
                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
            }
            $stmt->close();
        }
        $conn->close();
    }
}

echo json_encode($retorna);
?>