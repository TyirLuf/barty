<?php
session_start();

$op = 0;
if (isset($_GET['p']))
    $op = $_GET['p'];

require("./php/connect.php");
include "./php/functions.php";
include "./php/cliente.php";
include "./php/controllerUserData.php";


require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
?>

<!DOCTYPE html>
<html lang="pt-pt">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Barty - BarberShop</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/ionicons.css">
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/venobox.min.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/sass/style.css">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
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
                                    <a href="./"><img src="assets/images/logo/logo_black.png" alt=""></a>
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
                                                <li><a href="./?p=3">Cortes de Cabelo</a></li>
                                                <li><a href="./?p=4">Barba</a></li>
                                                <hr>
                                                <li><a href="404.html">Todos</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="./?p=">Blog</a>
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
                                <a href="#">
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
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="index.html"><img src="assets/images/logo/logo_white.png" alt=""></a>
            </div>

            <address class="address">
                <span>Address: R. de Soares dos Reis 191, 4430-315 Vila Nova de Gaia</span>
                <span>Call Us: 918 306 594</span>
                <span>Email: danielsilvareis87@hotmail.com</span>
            </address>

            <ul class="social-link">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
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
                                <li><a href="./?p=3">Haircut</a></li>
                                <li><a href="./?p=4">Barba</a></li>
                                <hr>
                                <li><a href="404.html">Todos</a></li>
                            </ul>
                        </li>
                        <li><a href="./?p=5">Blog</a></li>
                        <li><a href="./?p=5">Sobre Nós</a></li>
                        <li><a href="./?p=6">Contate-nos</a></li>
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="./"><img src="assets/images/logo/logo_white.png" alt=""></a>
                </div>

                <address class="address">
                    <span>Address: R. de Soares dos Reis 191, 4430-315 Vila Nova de Gaia</span>
                    <span>Call Us: 918 306 594</span>
                    <span>Email: danielsilvareis87@hotmail.com</span>
                </address>

                <ul class="social-link">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>

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
            echo '
        <div class="offcanvas-user">
            <h4 class="offcanvas-title">User</h4>
            <ul class="offcanvas-cart-action-button">
                <li><a href="perfil.html" class="btn btn-block btn-golden">Ver Perfil</a></li>
                <li><a href="notificacoes.html" class="btn btn-block btn-golden mt-5">Notificações</a></li>
                <li><a href="logout.html" class="btn btn-block btn-golden mt-5">Logout</a></li>
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
                <li><a href="compare.html" class="btn btn-block btn-golden mt-5">Registrar</a></li>
            </ul>
        </div>
    ';
        }
        ?>

    </div> <!-- End  Offcanvas Addcart Section -->





    <?php


    switch ($op) {
            // Página inicial
        case 0:
            require("./pages/home.php");
            break;
            // Página agendamento
        case 1:
            require("./pages/agendamento.php");
            break;
            //Página todos Serviços
        case 2:
            require("./pages/servicos.php");
            break;
            //Página serviços - cortes
        case 3:
            require("./pages/servico_cortes.php");
            break;
            //Página serviços - barba 
        case 4:
            require("./pages/servico_barba.php");
            break;
            //Página sobre nós
        case 5:
            require("./pages/sobre.php");
            break;
            //Página contato 
        case 6:
            require("./pages/contact.php");
            break;
        case 7:
            require("./pages/calendar.php");
            break;
        case 8:
            require("./pages/login.php");
            break;
        case 9:
            require("./pages/signup.php");
            break;
        case 10:
            require("./pages/perfil_func.php");
            break;
            //php functions require//
        case 21:
            require("./php/user-otp.php");
            break;
        case 12:
            require("./php/user-otp.php");
            break;
        case 13:
            require("./php/user-otp.php");
            break;
        case 14:
            require("./php/user-otp.php");
            break;
        case 15:
            require("./pages/enviarmsgm.php");
            break;
    }







    ?>







    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg">
        <div class="footer-wrapper">
            <!-- Start Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="0">
                                <h5 class="title">INFORMATION</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="./?p=6">Contact</a></li>
                                    <li><a href="#">Returns</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="200">
                                <h5 class="title">Endereço</h5>
                                <ul class="footer-nav">
                                    <li><a href="my-account.html">R. de Soares dos Reis 191, 4430-315 Vila Nova de Gaia</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="400">
                                <h5 class="title">Contate-nos</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">+351 924736082</a></li>
                                    <li><a href="#">info@barty.com</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="600">
                                <h5 class="title">WORKING HOURS</h5>
                                <div class="footer-about">
                                    <p>Seg – Sext 09:00 – 19:00</p>
                                    <p>WEEKEND --- Closed</p>
                                </div>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Top -->

            <!-- Start Footer Center -->
            <div class="footer-center">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-6">
                            <div class="footer-social" data-aos="fade-up" data-aos-delay="0">
                                <h4 class="title">FOLLOW US</h4>
                                <ul class="footer-social-link">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-6 mb-6">
                            <div class="footer-newsletter" data-aos="fade-up" data-aos-delay="200">
                                <h4 class="title">DON'T MISS OUT ON THE LATEST</h4>
                                <div class="form-newsletter">
                                    <form action="#" method="post">
                                        <div class="form-fild-newsletter-single-item input-color--golden">
                                            <input type="email" placeholder="Your email address..." required>
                                            <button type="submit">SUBSCRIBE!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Center -->

            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                        <div class="col-auto mb-6">
                            <div class="footer-copyright">
                                <p class="copyright-text"> <a href="index.html"></a><a href="https://therankme.com/" target="_blank"></a> </p>
                                <p class="copyright-text"><a>Todos os direitos reservados a Gucivani Emanuel &copy; 2023</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Bottom -->
        </div>
    </footer>
    <!-- End Footer Section -->


    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>



</html>