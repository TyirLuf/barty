<?php
// Arquivo: excluir_funcionario.php

// Verifica se o ID do funcionário foi enviado via POST
if (isset($_POST['funcionario_id'])) {
    $funcionario_id = $_POST['funcionario_id'];


    // Query SQL para excluir o funcionário
    $sql = "DELETE FROM funcionarios WHERE func_id = $funcionario_id";

    // Executa a query
    if ($conn->query($sql) === TRUE) {
        echo "Funcionário excluído com sucesso!";
    } else {
        echo "Erro ao excluir o funcionário: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo "ID do funcionário não foi fornecido.";
}
?>
