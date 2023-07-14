<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar PDF</title>
</head>

<body>
    <h2>Gerar PDF com PHP</h2>

    <form method="POST" action="gerar_pdf.php">

        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome complento"><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Melhor e-mail"><br><br>

        <label>Descrição</label>
        <textarea name="descricao" placeholder="Descrição completa"></textarea><br><br>

        <input type="submit" name="btn-gerar" value="Gerar PDF"><br><br>
        
    </form>

</body>

</html>