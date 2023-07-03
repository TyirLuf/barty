<!-- cabeçalho -->
<?php 
include './pages/includes/head.php';
include './pages/includes/navbar.php';
?>
    <!--- Mapeamento de Paginas-->
    <?php
    $pages = [
        0 => "./pages/home.php",
        1 => "./pages/funcionario/todosfunc.php",
        2 => "./pages/clientes/todoscli.php",
        3 => "./pages/servicos/todosserv.php",
        4 => "./pages/funcionario/editar.php",
        5 => "./pages/funcionario/excluir.php",
        6 => "./pages/funcionario/add.php",
        7 => "./pages/funcionario/lista.php",
        8 => "./pages/funcionario/processa_add.php",
    ];
    if (isset($pages[$op])) {
        require($pages[$op]);
    } else {
        // Página de erro ou ação padrão em caso de opção inválida
        require("./pages/error-404.php");
    }
    ?>
    <!--Fim do mapeamento -->

<!-- Rodape -->
<?php 
include './pages/includes/footer.php';
?>



















