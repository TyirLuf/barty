<?php

session_start(); // Iniciar a sessão

ob_start(); // Limpar o buffer de saída

// Destruir as sessões
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['usuario'], $_SESSION['codigo_autenticacao']);

// Acessar o IF quando o usuário não estão logado e redireciona para página de login
if((!isset($_SESSION['id'])) and (!isset($_SESSION['usuario'])) and (!isset($_SESSION['codigo_autenticacao']))){
    $_SESSION['msg'] = "<p style='color: green;'>Deslogado com sucesso!</p>";

    // Redirecionar o usuário
    header("Location: index.php");

    // Pausar o processamento
    exit();
}

?>