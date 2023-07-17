<?php
session_start();
require("../../php/connect.php");

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores dos campos do formulário
    $primeiro_nome = $_POST['first-name'];
    $ultimo_nome = $_POST['last-name'];
    $username = $_POST['username'];
    $genero = $_POST['genero'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confir_pass'];
    $nif = $_POST['nif'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email-name'];
    $data_nascimento = $_POST['birthday'];

    // Verifica se as senhas correspondem
    if ($password !== $confirm_password) {
        echo "As senhas não correspondem.";
        exit();
    }

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conn) {
        // Cria a consulta SQL para atualizar os dados na tabela clientes
        $query = "UPDATE clientes SET primeiro_nome='$primeiro_nome', ultimo_nome='$ultimo_nome', username='$username', genero='$genero', password='$password', nif='$nif', telefone='$telefone', data_nascimento='$data_nascimento' WHERE email='$email'";

        // Executa a consulta SQL
        $result = mysqli_query($conn, $query);

        // Verifica se a atualização foi bem-sucedida
        if ($result) {
            // Atualiza a sessão do usuário com os novos valores
            $_SESSION['user']['primeiro_nome'] = $primeiro_nome;
            $_SESSION['user']['ultimo_nome'] = $ultimo_nome;
            $_SESSION['user']['username'] = $username;
            $_SESSION['user']['genero'] = $genero;
            $_SESSION['user']['nif'] = $nif;
            $_SESSION['user']['telefone'] = $telefone;
            $_SESSION['user']['data_nascimento'] = $data_nascimento;

          
            $_SESSION['status'] = "Perfil atualizado com sucesso!";
            header('Location: ../../?p=7');
            exit();
        } else {
            $_SESSION['status'] = "Erro ao atualizar o perfil: " . mysqli_error($conn);
            header('Location: ../../?p=7');
            exit();
            
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conn);
    } else {
        echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
    }
} else {
    echo "Método inválido. Por favor, envie os dados através do formulário.";
}
?>