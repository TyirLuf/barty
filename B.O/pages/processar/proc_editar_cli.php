<?php
require("../../php/connect.php");

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se o ID foi fornecido
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    // Verificar se o ID é válido
    if (!empty($id)) {
        // Consulta SQL para obter os dados do funcionário com base no ID
        $sqlcliente = "SELECT * FROM clientes WHERE cliente_id = '$id'";
        $resultcliente = $conn->query($sqlcliente);

        if ($resultcliente->num_rows > 0) {
            $rowcliente = $resultcliente->fetch_assoc();

            // Obter os valores do formulário
            $primeiro_nome = $_POST["prim_nome"];
            $email = $_POST["email"];
            $nif = $_POST["nif"];
            $genero = $_POST["genero"];
            $ultimo_nome = $_POST["ult_nome"];
            $username = $_POST["username"];
            $telefone = $_POST["telefone"];
            $data_nascimento = $_POST["data_nasc"];

            // Atualizar os dados do funcionário no banco de dados
            $sqlAtualizar = "INSERT INTO clientes (primeiro_nome, email, nif, genero, ultimo_nome, username, telefone, data_nascimento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $cad_usuario = $conn->prepare($sqlAtualizar);
            $cad_usuario->bind_param(
                'ssssssss',
                $primeiro_nome,
                $email,
                $nif,
                $genero,
                $ultimo_nome,
                $username,
                $telefone,
                $data_nascimento
            );

            if ($cad_usuario->execute()) {
                header("Location: ../../?p=10");
                exit();
                // Redirecionar ou exibir uma mensagem de sucesso, se necessário
            } else {
                echo "Erro ao atualizar o funcionário: " . $cad_usuario->error;
                // Exibir uma mensagem de erro, redirecionar ou tratar o erro de alguma forma, se necessário
            }
        } else {
            echo 'O ID não corresponde a nenhum funcionário existente!';
            // O ID não corresponde a nenhum funcionário existente, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
        }
    } else {
        echo 'ID inválido!';
        // O ID não foi fornecido ou é inválido, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
    }
} else {
    echo 'O formulário não foi submetido!';
    // O formulário não foi submetido, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
}
?>
