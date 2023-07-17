
<?php 
include './pages/includes/head.php';
include './pages/includes/header.php';
include './pages/includes/sidebar.php';
?>


    <!--- Mapeamento de Paginas-->
    <?php
    $pages = [
        0 => "./pages/home.php",
        1 => "./pages/funcionario/add_func.php",
        3 => "./pages/funcionario/all_func.php",
        4 => "./pages/funcionario/listar_func.php",
        5 => "./pages/funcionario/editar_func.php",
        6 => "./pages/funcionario/deletar_func.php",
        10 => "./pages/clientes/todos_cli.php",
        11 => "./pages/clientes/lista_cli.php",
        12 => "./pages/clientes/editar_cli.php",
        13 => "./pages/clientes/eliminar_cli.php",
        14 => "./pages/clientes/add_cli.php",
        20 => "./pages/agendamento/todos_agendamento.php",

    ];
    if (isset($pages[$op])) {
        require($pages[$op]);
    } else {
        // Página de erro ou ação padrão em caso de opção inválida
        require("./pages/error-404.php");
    }
    ?>
    <!--Fim do mapeamento -->
	
<?php include './pages/includes/footer.php';?>