<?php
 require("../php/connect.php");
// Verificar se o ID foi fornecido
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Verificar se o ID é válido
if (!empty($id)) {
    // Consulta SQL para verificar se o funcionário com o ID fornecido existe
    $sqlVerificarFuncionario = "SELECT * FROM funcionarios WHERE func_id = '$id'";
    $resultVerificarFuncionario = $conn->query($sqlVerificarFuncionario);

    if ($resultVerificarFuncionario->num_rows > 0) {
        // Funcionário encontrado, realizar a exclusão
        $sqlEliminarFuncionario = "DELETE FROM funcionarios WHERE func_id = '$id'";

        if ($conn->query($sqlEliminarFuncionario) === TRUE) {
            // Exclusão bem-sucedida
            echo "Funcionário eliminado com sucesso!";
            // Redirecionar ou exibir uma mensagem de sucesso, se necessário
        } else {
            echo "Erro ao eliminar o funcionário: " . $conn->error;
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
?>
