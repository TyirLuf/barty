<?php

ob_start();

$chave = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRING);

if(!empty($chave)){
    //echo "Chave: $chave <br>";

    $query_usuario = "SELECT cliente_id FROM clientes WHERE code=:chave LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':chave', $chave, PDO::PARAM_STR);
    $result_usuario->execute();

    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        extract($row_usuario);

        $query_up_usuario = "UPDATE clientes SET sits_cliente_cliente_id = 1, code=:chave WHERE cliente_id=$id";
        $up_usuario = $conn->prepare($query_up_usuario);
        $chave = NULL;
        $up_usuario->bindParam(':chave', $chave, PDO::PARAM_STR);

        if($up_usuario->execute()){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>E-mail confirmado.</div>";
            header("Location: ./");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: E-mail confirmado.</div>";
            header("Location: ./");
        }

        
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Endereço inválido.</div>";
        header("Location: ./");
    }

}else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Endereço inválido.</div>";
    header("Location: ./");
}