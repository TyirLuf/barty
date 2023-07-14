<?php
  require("../php/connect.php");

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se o ID foi fornecido
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    // Verificar se o ID é válido
    if (!empty($id)) {
        // Consulta SQL para obter os dados do funcionário com base no ID
        $sqlFuncionario = "SELECT * FROM funcionarios WHERE func_id = '$id'";
        $resultFuncionario = $conn->query($sqlFuncionario);

        if ($resultFuncionario->num_rows > 0) {
            $rowFuncionario = $resultFuncionario->fetch_assoc();

            // Obter os valores do formulário
            $primeiro_nome = $_POST["prim_nome"];
            $password = sha1($_POST["pass"]); // Aplicar o SHA1 na senha
            $email = $_POST["email"];
            $anos_experiencia = $_POST["exp"];
            $genero = $_POST["genero"];
            $ultimo_nome = $_POST["ult_nome"];
            $username = $_POST["username"]; 
            $telefone = $_POST["telefone"];
            $especializacoes = $_POST["especilizacao"];
            $data_nascimento = $_POST["data_nasc"];
            $descricao = $_POST["desc"];
            $funcaoId = $_POST["funcao"];

            // Verificar se uma imagem foi enviada
            if (isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0) {
                $imagem = $_FILES["pic"]["name"];
                $imagem_temp = $_FILES["pic"]["tmp_name"];
                move_uploaded_file($imagem_temp, "caminho/para/armazenar/imagem/" . $imagem);
            } else {
                $imagem = ""; // Definir um valor padrão caso nenhuma imagem tenha sido enviada
            }

            // Atualizar os dados do funcionário no banco de dados
            $sqlAtualizar = "UPDATE funcionarios SET primeiro_nome='$primeiro_nome', senha='$password', email='$email', anos_experiencia='$anos_experiencia', genero='$genero', ultimo_nome='$ultimo_nome', username='$username', telefone='$telefone', especializacao='$especializacoes', data_nascimento='$data_nascimento', descricao='$descricao', funcao='$funcaoId', imagem='$imagem' WHERE func_id='$id'";

            if ($conn->query($sqlAtualizar) === TRUE) {
                header("Location: ./");
                exit();
                // Redirecionar ou exibir uma mensagem de sucesso, se necessário
            } else {
                echo "Erro ao atualizar o funcionário: " . $conn->error;
                // Exibir uma mensagem de erro, redirecionar ou tratar o erro de alguma forma, se necessário
            }
        } else {
            echo 'O ID não corresponde a nenhum funcionário existente!';
            // O ID não corresponde a nenhum funcionário existente, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
        }
    } else {
        echo 'ID inválido!';
        // O ID não foi fornecido ou é inválido, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
    }
} else {
    echo 'O formulário não foi submetido!';
    // O formulário não foi submetido, faça o tratamento adequado (exibir mensagem de erro, redirecionar, etc.)
}
?>
