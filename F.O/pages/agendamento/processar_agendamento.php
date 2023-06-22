<?php
//Sessao
session_start();
// Connection

require_once 'php/connect.php';

if(isset($_POST['btn-agendar'])) {
    $idUsuario = mysqli_escape_string($con, $_POST['id_cliente']);
    $data = mysqli_escape_string($con, $_POST['data']);
    $horas = mysqli_escape_string($con, $_POST['hora']);
    $servicos = mysqli_escape_string($con, $_POST['servico']);
    $dataformat = date("Y-m-d", strtotime($data));
    $horaformatada = date("H:i",strtotime($horas));

/*  insert na tabela agendar servicos    */
$sql = "INSERT INTO agendamento( start_time, data, horas , usuario, servicos) VALUES (now(),'$dataformat','$horaformatada','$idUsuario','$servicos')";
$sql = mysqli_query($con, $sql); 

$result = mysqli_query($con, "SELECT MAX(idagendar_servicos) as 'id' FROM agendar_servicos");
$result = mysqli_fetch_array($result);

$idagendar = mysqli_escape_string($con, $result['id']);

/*  insert na tabela historico de  servicos    */
$sql = "INSERT INTO historico_servicos(idagendar_servicos, data_solicitacao, data_servico, servicos, status) VALUES ('$idagendar',now(), '$dataformat','$servicos','1')";
  $sql = mysqli_query($con, $sql);   
    }

    if(mysqli_query($con, $sql)):
        $_SESSION['mensagem'] = "Agendado com sucesso!";
        header('Location: ../home.php?');
    else: 
        $_SESSION['mensagem'] = "Erro ao Agendar!";
        header('Location: ../home.php?');
    endif;

?>