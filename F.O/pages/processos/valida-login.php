<?php
session_start();
ob_start();
require("../../php/connect.php");

if (isset($_POST['entrar'])) {

    if (empty($_POST['email']) || empty($_POST['password'])) {
        exit();
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = sha1(mysqli_real_escape_string($conn, $_POST['password']));
        $query = " SELECT * FROM clientes WHERE email = '$email' and password = '$password' ";

        $result = mysqli_query($conn, $query);

        $dadoscliente = mysqli_fetch_assoc($result);

        $row = mysqli_num_rows($result);

        if ($row == 1) {

            if ($dadoscliente['estado_id'] == 1) {
                $_SESSION['user'] = $dadoscliente;
                header("Location: ../../");
                exit();
            } else {
                $_SESSION['status'] = "Erro ao fazer loginl!";
                header('Location: ../../?p=8');
                exit();
            }
            








        } else {
            $query = " SELECT * FROM funcionarios WHERE email = '$email' and senha = '$password' ";
            $result = mysqli_query($conn, $query);
            $dadosfuncionario = mysqli_fetch_assoc($result);
            $row = mysqli_num_rows($result);
            if ($row == 1) {
                $_SESSION['user'] = $dadosfuncionario;
                header("Location: ../../");
                exit();
            } else {
                $_SESSION['status'] = "Erro ao fazer loginl!";
                header('Location: ../../?p=8');
                exit();
            }
        }
    }
}
else
    echo "ERRRRRRROOOOOOOOOOOOOO";
?>