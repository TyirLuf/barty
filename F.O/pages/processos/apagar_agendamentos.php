<?php
session_start();
require("../../php/connect.php");

if (isset($_GET['id'])) {
    $idAgendamento = $_GET['id'];

    // Executa a consulta SQL para excluir o agendamento
    $query = "DELETE FROM agendamentos WHERE id = $idAgendamento";
    $result = mysqli_query($conn, $query);

    // Verifica se a exclusão foi bem-sucedida
    if ($result) {
        $_SESSION['status'] = "Agendamento eliminado com sucesso";
        header('Location: ../../?p=18');
        exit();
    } else {
        $_SESSION['status'] = "Erro ao excluir o agendamento: " . mysqli_error($conn);
    header('Location: ../../?p=18');
    exit();
    }
}

if (isset($_POST['limpar'])) {
    // Obtém o ID do cliente
    $idCliente = $_SESSION['user']['cliente_id'];

    // Executa a consulta SQL para excluir todos os agendamentos do cliente
    $query = "DELETE FROM agendamentos WHERE id_cliente = $idCliente";
    $result = mysqli_query($conn, $query);

    // Verifica se a exclusão foi bem-sucedida
    if ($result) {
        // Redireciona de volta para a página dos agendamentos
        $_SESSION['status'] = "Histórico limpo com sucesso";
        header('Location: ../../?p=18');
        exit();
    } else {
        $_SESSION['status'] = "Erro ao limpar o histórico de agendamentos " . mysqli_error($conn);
    header('Location: ../../?p=18');
    exit();
    }
}


?>
