<?php
 require("../../php/connect.php");
// Verificar se o ID foi fornecido
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Verificar se o ID é válido
if (!empty($id)) {
    // Consulta SQL para verificar se o funcionário com o ID fornecido existe
    $sqlVerificarFuncionario = "SELECT * FROM clientes WHERE cliente_id = '$id'";
    $resultVerificarFuncionario = $conn->query($sqlVerificarFuncionario);

    if ($resultVerificarFuncionario->num_rows > 0) {


        $sqlEliminarAgendamentos = "DELETE FROM agendamentos WHERE id_cliente = '$id'";
if ($conn->query($sqlEliminarAgendamentos) === TRUE) {
    // Registros relacionados excluídos com sucesso
} else {
    echo "Erro ao eliminar os agendamentos relacionados: " . $conn->error;
    // Exibir uma mensagem de erro, redirecionar ou tratar o erro de alguma forma, se necessário
}
        // Funcionário encontrado, realizar a exclusão
        $sqlEliminarFuncionario = "DELETE FROM clientes WHERE cliente_id = '$id'";

        if ($conn->query($sqlEliminarFuncionario) === TRUE) {
            // Exclusão bem-sucedida
            echo "Funcionário eliminado com sucesso!";
            header('Location: ../../?p=10');
            // Redirecionar ou exibir uma mensagem de sucesso, se necessário
        } else {
            echo "Erro ao eliminar o funcionário: " . $conn->error;
            // Exibir uma mensagem de erro, redirecionar ou tratar o erro de alguma forma, se necessário
        }
    } else {
        echo 'O ID não corresponde a nenhum funcionário existente!';
        header('Location: ../../?p=3');
        // O ID não corresponde a nenhum funcionário existente, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
    }
} else {
    echo 'ID inválido!';
    header('Location: ../../?p=3');
    // O ID não foi fornecido ou é inválido, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
}
?>
