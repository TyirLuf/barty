<!-- cabeçalho -->
<?php 
include './pages/includes/head.php';
include './pages/includes/navbar.php';
?>
    <!--- Mapeamento de Paginas-->
    <?php
    $pages = [
        0 => "./pages/principal/home.php",
        1 => "./pages/agendamento.php",
        2 => "./pages/servicos/servicos.php",
        3 => "./pages/servico_cortes.php",
        4 => "./pages/servico_barba.php",
        5 => "./pages/principal/sobre.php",
        6 => "./pages/principal/contact.php",
        7 => "./pages/calendar.php",
        8 => "./pages/cliente/login.php",
        9 => "./pages/cliente/registro.php",
        10 => "./pages/funcionario/perfil_func.php",
        21 => "./php/user-otp.php",
        12 => "./php/user-otp.php",
        13 => "./php/user-otp.php",
        14 => "./php/user-otp.php",
        15 => "./pages/principal/enviarmsgm.php",
        16 => "./pages/verificar_code.php",
        20 => "./pages/login/conteudo.php",
        21 => "./pages/login/conteudo_login.php",
        22 => "./pages/login/confirmar-email.php",
        23 => "./pages/login/processar_registro.php",
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



















