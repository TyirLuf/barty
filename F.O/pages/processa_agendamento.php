<?php
require("../php/connect.php");
session_start(); // Iniciar a sessão (caso ainda não esteja iniciada)

// Verificar se o usuário está logado
if (!isset($_SESSION['user'])) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Faça login para agendar um horário!');
        window.location.href = './?p=8';
    </script>";
    exit; // Encerrar a execução do código
}

require("../php/connect.php");
$data = $_POST["data"];
$hora = $_POST["hora"];
$servicos = $_POST['servicos'];

// Verificar se pelo menos um serviço foi selecionado
if (empty($servicos)) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Selecione ao menos uma opção!');
        window.location.href='agendamento1.php';
    </script>";
    exit; // Encerrar a execução do código
}

// Receber o ID do cliente
$query = mysqli_query($conn, "SELECT cliente_id FROM clientes LIMIT 1");
$cliente_id = mysqli_fetch_assoc($query)['cliente_id'];

// Verificar se foi selecionada a opção "Aleatório"
if ($_POST['funcionario'] == 'Aleatório') {
    // Selecionar aleatoriamente um funcionário da tabela funcionarios
    $funcionarioQuery = mysqli_query($conn, "SELECT func_id FROM funcionarios ORDER BY RAND() LIMIT 1");
    $funcionario_id = mysqli_fetch_assoc($funcionarioQuery)['func_id'];
} else {
    // Obter o ID do funcionário selecionado
    $funcionario_id = $_POST['funcionario'];
}

// Calcular o total com base nos serviços selecionados
$total = 0;
foreach ($servicos as $servico) {
    // Obter o preço do serviço no banco de dados
    $precoQuery = mysqli_query($conn, "SELECT preco FROM servicos WHERE nome = '$servico'");
    $preco = mysqli_fetch_assoc($precoQuery)['preco'];
    
    // Somar o preço ao total
    $total += $preco;
}

// Transformar o array de serviços em uma string separada por vírgulas
$servicosString = implode(", ", $servicos);

// Inserir os dados no banco de dados
$sql = "INSERT INTO agendamentos(id_cliente, id_funcionario, servicos, preco_total, data, hora) 
        VALUES ('$cliente_id', '$funcionario_id', '$servicosString', '$total', '$data', '$hora')";

if (mysqli_query($conn, $sql)) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Agendamento cadastrado!');
        window.location.href='agendamento1.php';
    </script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
        alert('Agendamento não cadastrado!');
        window.location.href='agendamento1.php';
    </script>";
}
?>
