<?php
require("../../php/connect.php");
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $codigoInserido = $_POST['codigo'];
    // Consultar o banco de dados para obter o código correspondente ao email
    $sql = "SELECT code FROM clientes WHERE email = '$email' and estado_id = 3";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $codigoArmazenado = $row['code'];
        // Verificar se o código inserido corresponde ao código armazenado no banco de dados
        if ($codigoInserido == $codigoArmazenado) {
            // Atualizar o estado da conta do usuário no banco de dados
            $sql = "UPDATE clientes SET estado_id = 1, code = 0 WHERE email = '$email'";
            $resultado = mysqli_query($conn, $sql);
            if ($resultado) {
                $_SESSION['status'] = "Código verificado com sucesso!";
                header('Location: ../../?p=8');
                exit();
            } else {
                $_SESSION['status'] = "<p style='color: #f00;'>Erro: enail inválido!</p>";
                header('Location: ../../?p=22');
                exit();

                
            }
        } else {
            $_SESSION['status'] = "<p style='color: #f00;'>Erro: Código inválido!</p>";
            header('Location: ../../?p=22');
            exit();

           
        }
    } else {
        $_SESSION['msgerro'] = "Erro ao buscar o código. Por favor, tente novamente.";
        header('location: ../?p=22&email=' . urlencode($email));
        exit();
    }
}
?>
