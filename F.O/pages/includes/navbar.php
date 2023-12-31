<?php
$sql = "SELECT id,nome FROM tipo_servico";
$result = $conn->query($sql);
?>
<!-- Navbar -->
<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div class="logo">
                                <a href="./"><img src="assets/images/logo/barty_logo.png" alt=""></a>
                            </div>
                        </div>
                        <!-- End Header Logo -->

                        <!-- Barra de navegação -->
                        <div class="main-menu menu-color--black menu-hover-color--golden">
                            <nav>
                                <ul>
                                    <li class="has-dropdown">
                                        <a class="active main-menu-link" href="./">Home</a>
                                        <!-- Sub Menu -->
                                    </li>

                                    <li class="has-dropdown">
                                        <a href="#">Serviços<i class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            <?php
                                            $sql = "SELECT id, nome FROM tipo_servico";
                                            $resultado = $conn->query($sql);

                                            if (mysqli_num_rows($resultado) > 0) {
                                                while ($row = mysqli_fetch_assoc($resultado)) {
                                                    $id = $row['id'];
                                                    $nome = $row['nome'];
                                                    echo '<li><a href="./?p=2&id=' . $id . '">' . $nome . '</a></li>';
                                                }
                                                echo '<hr>';
                                            } else {
                                                echo '<li><a href="#">Nenhum tipo encontrado</a></li>';
                                            }
                                            ?>
                                            <li><a href="./?p=2">Todos</a></li>
                                        </ul>
                                    </li>

                                  
                                    <li>
                                        <a href="./?p=5">Sobre Nós</a>
                                    </li>
                                    <li>
                                        <a href="./?p=6">Contate-nos</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <!-- Fim  da Barra de navegação -->

                        <!-- Barra de navegação botões -->

                        <ul class="header-action-link action-color--black action-hover-color--golden">

                            <li>
                                <a href="./?p=1">
                                    <i class="icon-calendar"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-user" class="offcanvas-toggle">
                                    <i class="icon-user"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Fim dos botões da barra de navegação -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Fim da navbar-->
<!-- Navbar telefone -->
<div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!-- Start Mobile Left Side -->
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li>
                            <a href="./">
                                <div class="logo">
                                    <img src="assets/images/logo/logo_black.png" alt="">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Left Side -->

                <!-- Start Mobile Right Side -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--black action-hover-color--golden">
                        <li>
                            <a href="./?p=1">
                                <i class="icon-calendar"></i>
                            </a>
                        </li>
                        <li>
                        <a href="#offcanvas-user" class="offcanvas-toggle">
                                <i class="icon-user"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Right Side -->
            </div>
        </div>
    </div>
</div>
<!-- Fim da navbar para telefone -->
<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <!-- Start Mobile contact Info -->
    <?php
$sqlEmpresa = "SELECT * FROM empresa";
$resultEmpresa = $conn->query($sqlEmpresa);

if ($resultEmpresa->num_rows > 0) {
    $rowEmpresa = $resultEmpresa->fetch_assoc();
    $logo = $rowEmpresa["logo"];
    $endereco = $rowEmpresa["endereco"];
    $telefone = $rowEmpresa["telefone"];
    $email = $rowEmpresa["email"];
    $facebook = $rowEmpresa["facebook"];
    $instagram = $rowEmpresa["instagram"];
    $twitter = $rowEmpresa["twitter"];

    echo '
    <div class="mobile-contact-info">
        <div class="logo">
            <a href="./"><img src="' . $rowEmpresa["logo"] . '" alt=""></a>
        </div>

        <address class="address">
            <span>Endereço: ' . $endereco . '</span>
            <span>Call Us: ' . $telefone . '</span>
            <span>Email: ' . $email . '</span>
        </address>

        <ul class="social-link">
            <li><a href="' . $facebook . '"><i class="fa fa-facebook"></i></a></li>
            <li><a href="' . $twitter . '"><i class="fa fa-twitter"></i></a></li>
            <li><a href="' . $instagram . '"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>';
} else {
    echo "Nenhum dado encontrado.";
}
?>

    <!-- End Mobile contact Info -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->














<!--  Start Offcanvas Mobile Menu Section -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-mobile-menu-wrapper">
        <!-- Start Mobile Menu  -->
        <div class="mobile-menu-bottom">
            <!-- Start Mobile Menu Nav -->
            <div class="offcanvas-menu">
                <ul>
                    <li>
                        <a href="#"><span>Home</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Serviços</span></a>
                        <ul class="mobile-sub-menu">
                                            <?php
                                            $sql = "SELECT id, nome FROM tipo_servico";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $id = $row["id"];
                                                    $nome = $row["nome"];
                                                    echo '<li><a href="./?p=' . $id . '">' . $nome . '</a></li>';
                                                }
                                                echo '<hr>';
                                            }
                                            ?>
                                            <li><a href="./?p=2">Todos</a></li>
                                        </ul>
                    </li>
                    
                    <li><a href="./?p=5">Sobre Nós</a></li>
                    <li><a href="./?p=6">Contate-nos</a></li>
                </ul>
            </div> <!-- End Mobile Menu Nav -->
        </div> <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <?php
$sqlEmpresa = "SELECT * FROM empresa";
$resultEmpresa = $conn->query($sqlEmpresa);

if ($resultEmpresa->num_rows > 0) {
    $rowEmpresa = $resultEmpresa->fetch_assoc();
    $logo = $rowEmpresa["logo"];
    $endereco = $rowEmpresa["endereco"];
    $telefone = $rowEmpresa["telefone"];
    $email = $rowEmpresa["email"];
    $facebook = $rowEmpresa["facebook"];
    $instagram = $rowEmpresa["instagram"];
    $twitter = $rowEmpresa["twitter"];

    echo '
    <div class="mobile-contact-info">
        <div class="logo">
            <a href="./"><img src="' . $rowEmpresa["logo"] . '" alt=""></a>
        </div>

        <address class="address">
            <span>Endereço: ' . $endereco . '</span>
            <span>Call Us: ' . $telefone . '</span>
            <span>Email: ' . $email . '</span>
        </address>

        <ul class="social-link">
            <li><a href="' . $facebook . '"><i class="fa fa-facebook"></i></a></li>
            <li><a href="' . $twitter . '"><i class="fa fa-twitter"></i></a></li>
            <li><a href="' . $instagram . '"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>';
} else {
    echo "Nenhum dado encontrado.";
}
?>

        <!-- End Mobile contact Info -->

    </div> <!-- End Offcanvas Mobile Menu Wrapper -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
<!-- Start  Offcanvas Addcart Wrapper -->
<div id="offcanvas-user" class="offcanvas offcanvas-rightside offcanvas-user-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->

    <?php
    if (isset($_SESSION['user'])) {
        // Usuário logado
       
        $user = $_SESSION['user'];
        $firstName = $user['primeiro_nome'];
        $lastName = $user['ultimo_nome'];
    
        echo '
        <div class="offcanvas-user">
            <h4 class="offcanvas-title">'. $firstName .' '. $lastName .'</h4>
            <ul class="offcanvas-cart-action-button">
                <li><a href="./?p=7" class="btn btn-block btn-golden">Ver Perfil</a></li>
                <li><a href="./?p=18" class="btn btn-block btn-golden mt-5">Histórico</a></li>
                <li><a href="./pages/login/logout.php" class="btn btn-block btn-golden mt-5">Logout</a></li>
            </ul>
        </div>
    ';
    } else {
        // Usuário não logado
        echo '
        <div class="offcanvas-user">
            <h4 class="offcanvas-title">User</h4>
            <ul class="offcanvas-cart-action-button">
                <li><a href="./?p=8" class="btn btn-block btn-golden">Login</a></li>
                <li><a href="./?p=9" class="btn btn-block btn-golden mt-5">Registrar</a></li>
            </ul>
        </div>
    ';
    }
    ?>

</div> <!-- End  Offcanvas Addcart Section -->