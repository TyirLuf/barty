
    <h2>Digite o código enviado no e-mail cadastrado</h2>

    <?php
    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Acessar o IF quando o usuário clicar no botão acessar do formulário
    if (!empty($dados['ValCodigo'])) {
        // Recuperar os dados do usuário no banco de dados
        $query_usuario = "SELECT cliente_id,primeiro_nome,ultimo_nome, email, password,data_nascimento,nif,username
                    FROM clientes
                    WHERE cliente_id = ?
                    AND username = ?
                    AND code = ?
                    LIMIT 1";

        // Preparar a QUERY
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bind_param('iss', $_SESSION['cliente_id'], $_SESSION['username'], $dados['code']);

        // Executar a QUERY
        $result_usuario->execute();

        // Acessar o IF quando encontrar usuário no banco de dados
        if ($result_usuario->num_rows > 0) {

            // Ler os registros retornados do banco de dados
            $row_usuario = $result_usuario->fetch_assoc();

            // QUERY para salvar no banco de dados o código e a data gerada
            $query_up_usuario = "UPDATE usuarios SET
                    code= NULL,
                    data_code = NULL
                    WHERE id = ?
                    LIMIT 1";

            // Preparar a QUERY
            $result_up_usuario = $conn->prepare($query_up_usuario);
            $result_up_usuario->bind_param('i', $_SESSION['cliente_id']);

            // Executar a QUERY
            $result_up_usuario->execute();

            // Salvar os dados do usuário na sessão
            $_SESSION['primeiro_nome'] = $row_usuario['primeiro_nome'];
            $_SESSION['ultimo_nome'] = $row_usuario['ultimo_nome'];
            $_SESSION['code'] = true;            

            // Redirecionar o usuário
            header('Location: ./');
            exit();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Código inválido!</p>";
        }
    }

    // Imprimir a mensagem da sessão
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <!-- Inicio do formulário validar código -->
    <form method="POST" action="">
        <label>Código: </label>
        <input type="text" name="codigo_autenticacao" placeholder="Digite o código"><br><br>

        <input type="submit" name="ValCodigo" value="Validar"><br><br>

    </form><br>
    <!-- Fim do formulário validar código -->
</body>

</html>
