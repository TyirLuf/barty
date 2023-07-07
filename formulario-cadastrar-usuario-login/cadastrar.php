<?php

session_start(); // Iniciar a sessão

ob_start(); // Limpar o buffer de saída

// Definir um fuso horario padrao
date_default_timezone_set('America/Sao_Paulo');

// Incluir o arquivo com a conexão com banco de dados
include_once "./conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Celke - Cadastrar</title>
</head>
<body>
    
    <h2>Cadastrar Usuário</h2>

    <?php
    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Acessa o IF quando o usuário clicar no botão cadastrar
    if(!empty($dados['SendCaduser'])){
        var_dump($dados);

        // Criptografar a senha
        $senha_cripto = password_hash($dados['senha_usuario'], PASSWORD_DEFAULT);

        // Criar a QUERY para cadastrar no banco de dados
        $query_usuario = "INSERT INTO usuarios (nome, usuario, senha_usuario) VALUES (:nome, :usuario, :senha_usuario)";

        // Preparar a QUERY 
        $cad_usuario = $conn->prepare($query_usuario);

        // Substituir o link pelo valor que vem do formulário
        $cad_usuario->bindParam(':nome', $dados['nome']);
        $cad_usuario->bindParam(':usuario', $dados['usuario']);
        $cad_usuario->bindParam(':senha_usuario', $senha_cripto);

        // Executar a QUERY
        $cad_usuario->execute();

        // Acessa o IF quando cadastrar o registro no banco de dados
        if($cad_usuario->rowCount()){

            // Criar a mensagem e atribuir para variável global
            $_SESSION['msg'] = "<p style='color: green'>Usuário cadastrado com sucesso!</p>";

            // Redirecionar o usuário para a página de login
            header("Location: index.php");
            exit();
        }else{

            // Criar a mensagem e atribuir para variável global
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Usuário não cadastrado com sucesso!</p>";

        }
    }

    // Imprimir a mensagem da sessão
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    
    <!-- Início do formulário cadastrar usuário -->
    <form method="POST" action="">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome Completo"><br><br>

        <label>E-mail: </label>
        <input type="text" name="usuario" placeholder="Seu melhor e-mail"><br><br>

        <label>Senha: </label>     
        <input type="password" name="senha_usuario" placeholder="Senha com mínimo 6 caracteres"><br><br>

        <input type="submit" name="SendCaduser" value="Cadastrar"><br><br>

    </form>
    <!-- Fim do formulário cadastrar usuário -->

    <a href="index.php">Login</a><br><br>

</body>
</html>