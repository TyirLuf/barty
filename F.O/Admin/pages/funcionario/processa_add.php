<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todos os campos obrigatórios foram preenchidos
    if (isset($_POST["prim_nome"]) && isset($_POST["pass"]) && isset($_POST["email"]) && isset($_POST["exp"]) && isset($_POST["ult_nome"]) && isset($_POST["conf_pass"]) && isset($_POST["telefone"]) && isset($_POST["espec"]) && isset($_POST["data_nascimento"]) && isset($_POST["desc"])) {
        // Obter os dados do formulário
        $primeiro_nome = $_POST["prim_nome"];
        $password = sha1($_POST["pass"]); // Aplicar o SHA1 na senha
        $email = $_POST["email"];
        $anos_experiencia = $_POST["exp"];
        $ultimo_nome = $_POST["ult_nome"];
        $confirmar_password = sha1($_POST["conf_pass"]); // Aplicar o SHA1 na senha confirmada
        $telefone = $_POST["telefone"];
        $especializacoes = $_POST["espec"];
        $data_nascimento = $_POST["data_nascimento"];
        $descricao = $_POST["desc"];

        // Processar a imagem (se enviada)
        if (isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0) {
            $imagem = $_FILES["pic"]["name"];
            $imagem_temp = $_FILES["pic"]["tmp_name"];
            move_uploaded_file($imagem_temp, "caminho/para/armazenar/imagem/" . $imagem);
        } else {
            $imagem = ""; // Definir um valor padrão caso nenhuma imagem tenha sido enviada
        }

        require("../../php/connect.php");

        
        $sql = "INSERT INTO funcionarios (primeiro_nome, senha, email, anos_experiencia, ultimo_nome, confirmar_senha, telefone, especializacoes, data_nascimento, descricao, imagem) VALUES ('$primeiro_nome', '$password', '$email', '$anos_experiencia', '$ultimo_nome', '$confirmar_password', '$telefone', '$especializacoes', '$data_nascimento', '$descricao', '$imagem')";
        
        if ($conn->query($sql) === TRUE) {
//            header("Location: ../../?p=1"); // redirect
            exit;
        } else {
            echo "Erro ao adicionar o funcionário: " . $conn->error;
        }
        
        $conn->close();
    } else {
        // Campos obrigatórios não preenchidos, exiba uma mensagem de erro ou redirecione para uma página de erro
        echo "Por favor, preencha todos os campos obrigatórios!";
    }
}


?>
