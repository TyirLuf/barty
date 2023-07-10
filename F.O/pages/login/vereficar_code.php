
    <h2>Digite o código enviado no e-mail cadastrado</h2>

    <?php
    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Acessar o IF quando o usuário clicar no botão acessar do formulário
    if (isset($dados['validar'])) {
        // Recuperar os dados do usuário no banco de dados
        $query_usuario = "SELECT cliente_id,primeiro_nome,ultimo_nome, email, password,data_nascimento,nif,username
                    FROM clientes 
                    Where email = ?
                    AND code = ? 
                    and estado_id = 3 ";

        // Preparar a QUERY
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bind_param('si', $dados['email'], $dados['codigo']);

        // Executar a QUERY
        $result_usuario->execute();

        // Acessar o IF quando encontrar usuário no banco de dados
        if ($result_usuario->num_rows > 0) {

            // Ler os registros retornados do banco de dados
            $row_usuario = $result_usuario->fetch_assoc();

            // QUERY para salvar no banco de dados o código e a data gerada
            $query_up_usuario = "UPDATE clientes SET estado_id = 1 WHERE cliente_id = ? ";

            // Preparar a QUERY
            $result_up_usuario = $conn->prepare($query_up_usuario);
            $result_up_usuario->bind_param('i', $row_usuario['cliente_id']);

            // Executar a QUERY
            $result_up_usuario->execute();
          

            // Redirecionar o usuário
            header('Location: ./?p=8');
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
    <form id="cad-usuario-form" action="#" method="POST">
                <span id="msgAlertErroCad"></span>
                <br>
                <div class="form-group">
                    <div class="default-form-box">
                        <label>Email<span>*</span></label>
                        <input type="text" name="email" required>
                    </div>
                    <div class="default-form-box">
                        <label>Código de Ativação<span>*</span></label>
                        <input type="text" name="codigo" required>
                    </div>
                </div>

        <div class="login_submit">
                    <button class="btn btn-md btn-black-default-hover" type="submit" name="validar">Validar</button>
                </div>

    </form><br>
    <!-- Fim do formulário validar código -->
</body>

</html>
