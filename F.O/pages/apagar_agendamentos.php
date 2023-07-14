<?php
session_start();
require("../php/connect.php");

if (isset($_GET['id'])) {
        $idAgendamento = $_GET['id'];

        // Executa a consulta SQL para excluir o agendamento
        $query = "DELETE FROM agendamentos WHERE id = $idAgendamento";
        $result = mysqli_query($conn, $query);

        // Verifica se a exclusão foi bem-sucedida
        if ($result) {
            echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Agendamento apagado com sucesso!",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    // Redirecionar para a página dos agendamentos após 1 segundo
                    setTimeout(function() {
                        window.location.href = "../?p=18";
                    }, 1000);
                });
            </script>';
            exit();
        }
        
        
        } else {
            echo "Erro ao excluir o agendamento: " . mysqli_error($conn);
    
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
        header("Location: ../?p=18");
        exit();
    } else {
        echo "Erro ao limpar o histórico de agendamentos: " . mysqli_error($conn);
    }
}

?>
