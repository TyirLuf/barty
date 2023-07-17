<!-- cabeçalho -->
<?php 
include './pages/includes/head.php';
include './pages/includes/navbar.php';
?>
    <!--- Mapeamento de Paginas-->
    <?php
    $pages = [
        0 => "./pages/home.php",
        1 => "./pages/cliente/agendar.php",
        2 => "./pages/cliente/servicos.php",
        5 => "./pages/cliente/sobre.php",
        6 => "./pages/cliente/contact.php",
        7 => "./pages/cliente/perfil.php",
        8 => "./pages/cliente/login.php",
        9 => "./pages/cliente/registro.php",
        10 => "./pages/cliente/perfil_func.php",
        16 => "./pages/cliente/verificar_code.php",
        18 => "./pages/cliente/historico.php",
        21 => "./pages/login/conteudo_login.php",
        22 => "./pages/cliente/vereficar_code.php",
    ];
    if (isset($pages[$op])) {
        require($pages[$op]);
    } else {
        // Página de erro ou ação padrão em caso de opção inválida
        require("./php/error.php");
    }
    ?>
    <!--Fim do mapeamento -->

<!-- Rodape -->
<?php 
include './pages/includes/footer.php';
?>



















