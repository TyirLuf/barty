<?php
session_start();
include '../../php/connect.php';
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if (isset($_SESSION['user'])) {
    if (isset($_POST['servico_id']) && isset($_POST['funcionario']) && isset($_POST['data']) && isset($_POST['hora'])) {
        // Obtém os valores dos campos do formulário
        $servicoIds = $_POST['servico_id'];
        $funcionarioId = $_POST['funcionario'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $preco = $_POST['preco_servico'];
        $idCliente = $_SESSION['user']['cliente_id'];
        



        if ($_POST['funcionario'] == 'aleatorio') {
            // Selecionar aleatoriamente um funcionário da tabela funcionarios
            $funcionarioQuery = mysqli_query($conn, "SELECT func_id, primeiro_nome, ultimo_nome FROM funcionarios ORDER BY RAND() LIMIT 1");
            $funcionario = mysqli_fetch_assoc($funcionarioQuery);
            $funcionarioId = $funcionario['func_id'];
            $funcionarioNome = $funcionario['primeiro_nome'] . ' ' . $funcionario['ultimo_nome'];
        } else {
            // Obter o ID do funcionário selecionado
            $funcionarioId = $_POST['funcionario'];

            // Buscar o nome do funcionário no banco de dados
            $funcionarioQuery = mysqli_query($conn, "SELECT primeiro_nome, ultimo_nome FROM funcionarios WHERE func_id = $funcionarioId");
            $funcionario = mysqli_fetch_assoc($funcionarioQuery);
            $funcionarioNome = $funcionario['primeiro_nome'] . ' ' . $funcionario['ultimo_nome'];
        }

        $clienteQuery = mysqli_query($conn, "SELECT primeiro_nome, ultimo_nome FROM clientes WHERE cliente_id = $idCliente");
        $cliente = mysqli_fetch_assoc($clienteQuery);
        $clienteNome = $cliente['primeiro_nome'] . ' ' . $cliente['ultimo_nome'];

        $senha = rand(10, 99);
        // Insere o agendamento na tabela para cada serviço selecionado
        foreach ($servicoIds as $servicoId) {
            $servicoQuery = mysqli_query($conn, "SELECT nome FROM servicos WHERE servico_id = $servicoId");
            $servico = mysqli_fetch_assoc($servicoQuery);
            $servicoNomes[] = $servico['nome'];
            $sql = "INSERT INTO agendamentos (id_cliente, id_servico, id_funcionario,preco_total, data, hora, senha) 
                    VALUES ('$idCliente', '$servicoId', '$funcionarioId', '$preco','$data', '$hora', '$senha')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Erro ao inserir agendamento: " . mysqli_error($conn);
                exit;
            }
        }
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
            $mail->addAddress($_SESSION['user']['email'], $clienteNome);

            $mail->isHTML(true);

            $mail->Subject = 'Confirmação do Agendamento';

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
                                                Confirmação do Agendamento
                                            </h2>
                                        </td>
                                    </tr>
                                    <tr> 
            
                                        <td>                              
               <h4>Nome do Cliente:" . $clienteNome . "</h4>   
               <h4>Serviço:" . implode(', ', $servicoNomes) . "</h4>   
               <h4>Nome do Funcionário:" . $funcionarioNome . "</h4>  
                <h4>Data: " . $data . "</h4>   
                <h4>Hora: " . $hora . "</h4>
                  <h4>A pagar: " . $preco . "€</h4>
                  
                  <br>
                      <h4>A sua senha de agendamento é:</h4>
                  
                                            
                            <div style='display: flex;
                            justify-content: center;
                            align-items: center;
                            margin: 0 auto;
                                max-width: 30px;
                            padding: 10px;
                            border: 1px solid #b3b3b3;
                            border-radius: 5px;'>
                            <h2 style=' margin: 0;'>" . $senha . "</h2>
                            </div>
  
                                                          <h6>*Ao chegar na barbearia apresenta a sua senha de agendamento*</h6>
                                                
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
           $_SESSION['status'] = "Agendamento realizado com sucesso<br>Os dados do agendamentos foram enviados no seu email";
        header('Location: ../../?p=18');
        exit();
        } catch (Exception $e) {
            $_SESSION['status'] = "Erro ao enviar mensagem: {$mail->ErrorInfo}";
            header('Location: ../../?p=1');
            exit();
            
        }
    } else {
        $_SESSION['status'] = "Todos os campos são obrigatórios!";
        header('Location: ../../?p=8');
        exit();
    }
} else {
    $_SESSION['status'] = "Faça login ou cadastre-se para agendar um serviço!";
    header('Location: ../../?p=8');
    exit();
}

