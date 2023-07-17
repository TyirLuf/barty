<?php
session_start();

if (isset($_GET['message']) && isset($_GET['type'])) {
    $message = $_GET['message'];
    $type = $_GET['type'];
    
    // Verifica o tipo de mensagem (erro ou sucesso) e define o estilo correspondente
    $style = ($type === 'error') ? 'background-color: red; padding: 10px; color: white;' : 'background-color: green; padding: 10px; color: white;';
    
    // Exibe a mensagem com o estilo definido
    echo '<div style="' . $style . '">' . $message . '</div>';
}
?>
