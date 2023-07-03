<?php
// Realize a conexão com o banco de dados e execute a consulta para obter os valores mínimo e máximo

// Exemplo de consulta SQL para obter o valor mínimo e máximo do campo "preco" na tabela "servicos"
$sql = "SELECT MIN(preco) AS minimo, MAX(preco) AS maximo FROM servicos";
$result = $conn->query($sql);

// Verifique se a consulta foi bem-sucedida
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $minimo = $row['minimo'];
    $maximo = $row['maximo'];

    // Crie um array associativo com os valores mínimo e máximo
    $valores = array(
        'minimo' => $minimo,
        'maximo' => $maximo
    );

    // Converta o array em JSON e retorne como resposta para a requisição AJAX
    echo json_encode($valores);
} else {
    // Caso não haja resultados na consulta, retorne um valor padrão ou uma mensagem de erro
    $valores = array(
        'minimo' => 0,
        'maximo' => 0
    );

    echo json_encode($valores);
}
?>
