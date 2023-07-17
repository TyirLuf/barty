<?php

session_start();
ob_start();
require("../../php/connect.php");

$chave = filter_input(INPUT_GET, "chave", FILTER_SANITIZE_STRING);

if (!empty($chave)) {
    //echo "Chave: $chave <br>";

    $query_usuario = "SELECT cliente_id FROM clientes WHERE code=?";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bind_param("s", $chave);
    $result_usuario->execute();
    $result_usuario->store_result();

    if ($result_usuario->num_rows != 0) {
        $result_usuario->bind_result($id);
        $result_usuario->fetch();

        $query_up_usuario = "UPDATE clientes SET estado_id = 1, code=? WHERE cliente_id=?";
        $up_usuario = $conn->prepare($query_up_usuario);
        $chave = NULL;
        $up_usuario->bind_param("si", $chave, $id);

        if ($up_usuario->execute()) {
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>E-mail confirmado.</div>";
            header("Location: ./?p=8");
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: E-mail confirmado.</div>";
            header("Location: ./?p=8");
        }
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Endereço inválido.</div>";
        header("Location: ./?p=9");
    }
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Endereço inválido.</div>";
    header("Location: ./?p=9");
}
