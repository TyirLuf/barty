<?php

// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Carregar o Composer
require 'vendor/autoload.php';

// Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//var_dump($dados);

if (!empty($dados['btn-gerar'])) {
    $conteudo_pdf = "<!DOCTYPE html>";
    $conteudo_pdf .= "<html lang='pt-br'>";
    $conteudo_pdf .= "<head>";
    $conteudo_pdf .= "<meta charset='UTF-8'>";
    $conteudo_pdf .= "</head>";
    $conteudo_pdf .= "<body>";
    $conteudo_pdf .= "Nome: " . $dados['nome'] . "<br>";
    $conteudo_pdf .= "E-mail: " . $dados['email'] . "<br>";
    $conteudo_pdf .= "Descrição: " . $dados['descricao'] . "<br>";
    $conteudo_pdf .= "</body>";
    $conteudo_pdf .= "</html>";

    // Instanciar e usar a classe dompdf
    $dompdf = new Dompdf();

    // Chamar o metodo loadHtml e enviar o conteudo do PDF
    $dompdf->loadHtml($conteudo_pdf);

    // Configurar o tamanho e a orientacao do papel
    // landscape - Imprimir no formato paisagem
    // $dompdf->setPaper('A4', 'landscape');
    // portrait - Imprimir no formato retrato
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar o HTML como PDF
    $dompdf->render();

    // Gerar o PDF
    $dompdf->stream();

} else {
    header("Location: index.php");
}
