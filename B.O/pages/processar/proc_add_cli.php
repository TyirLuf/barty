<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $primeiro_nome = $_POST["prim_nome"];
    $password = sha1($_POST["pass"]); // Aplicar o SHA1 na senha
    $email = $_POST["email"];
    $anos_experiencia = $_POST["exp"];
    $ultimo_nome = $_POST["ult_nome"];
    $confirmar_password = sha1($_POST["confir_pass"]); // Aplicar o SHA1 na senha de confirmação

    $telefone = $_POST["telefone"];
    $especializacoes = $_POST["especilizacao"];
    $data_nascimento = $_POST["data_nasc"];
    $descricao = $_POST["desc"];

    // Processar a imagem (se enviada)
    if (isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0) {
        $imagem = $_FILES["pic"]["name"];
        $imagem_temp = $_FILES["pic"]["tmp_name"];
        move_uploaded_file($imagem_temp, "caminho/para/armazenar/imagem/" . $imagem);
    } else {
        $imagem = ""; // Definir um valor padrão caso nenhuma imagem tenha sido enviada
    }

    require("../php/connect.php");

    // Obter o ID da função com base no nome da função enviado pelo formulário
    $funcaoId = $_POST["funcao"];

    $sql = "INSERT INTO funcionarios (primeiro_nome, senha, email, anos_experiencia, ultimo_nome, confirmar_senha, telefone, especializacao, data_nascimento, descricao, imagem, funcao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $cad_usuario = $conn->prepare($sql);
    $cad_usuario->bind_param('ssssssisssss', $primeiro_nome, $password, $email, $anos_experiencia, $ultimo_nome, $confirmar_password, $telefone, $especializacoes, $data_nascimento, $descricao, $imagem, $funcaoId);

    if ($cad_usuario->execute()) {
        // header("Location: ../../?p=1"); // redirect
        exit;
    } else {
        echo "Erro ao adicionar o funcionário: " . $cad_usuario->error;
    }

    $cad_usuario->close();
    $conn->close();
}
?>
