    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg section-top-gap-100">
        <div class="footer-wrapper">
            <!-- Start Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="0">
                                <h5 class="title">Endereço</h5>
                                <ul class="footer-nav">
                                    <li><a href="https://goo.gl/maps/113BTLpBm8dQrjti7">Av. Nuno Álvares, 4400-233 Vila Nova de Gaia</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="200">
                                <h5 class="title">Email</h5>
                                <ul class="footer-nav">
                                    <li><a a href="mailto:inforbarty@gmail.com">inforbarty@gmail.com</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="400">
                                <h5 class="title">Telefone</h5>
                                <ul class="footer-nav">
                                    <li><a href="./?p=6">+351 924736082</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="600">
                                <h5 class="title">Hora de trabalho</h5>
                                <div class="footer-about">
                                    <address class="address">
                                        <span>Segunda a sexta: 8:00 &rarr; 19:00</span>
                                        <br>
                                        <span>Sábado: 8:00 &rarr; 12:00</span>
                                    </address>
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
                            <?php
                            $sqlEmpresa = "SELECT * FROM empresa";
                            $resultEmpresa = $conn->query($sqlEmpresa);

                            if ($resultEmpresa->num_rows > 0) {
                                $rowEmpresa = $resultEmpresa->fetch_assoc();
                                $facebook = $rowEmpresa["facebook"];
                                $instagram = $rowEmpresa["instagram"];
                                $twitter = $rowEmpresa["twitter"];

                                echo '
    <div class="footer-social" data-aos="fade-up" data-aos-delay="0">
        <h4 class="title">Segue-nos</h4>
        <ul class="footer-social-link">
            <li><a href="' . $facebook . '"><i class="fa fa-facebook"></i></a></li>
            <li><a href="' . $twitter . '"><i class="fa fa-twitter"></i></a></li>
            <li><a href="' . $instagram . '"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>';
                            } else {
                                echo "Nenhum dado encontrado.";
                            }
                            ?>

                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-6 mb-6">
                            <div class="footer-newsletter" data-aos="fade-up" data-aos-delay="200">
                                <h4 class="title">Mantêm-tem atualizado</h4>
                                <div class="form-newsletter">
                                    <form action="./pages/processos/newletterprocesso.php" method="post">
                                        <div class="form-fild-newsletter-single-item input-color--golden">
                                            <input type="email" name="email" placeholder="Indroduza o seu email..." required>
                                            <button type="submit">Seja Membro!</button>
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
                                <p class="copyright-text">&copy; 2023 <a href="index.html">Barty Barber</a>. Made with <i class="fa fa-heart text-danger"></i> by <a href="https://therankme.com/" target="_blank">Jucivani Emanuel</a> </p>

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
    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <!-- <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>  -->

    <!--Plugins JS-->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script> -->


    <script src="js/mobiscroll.javascript.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Ionic Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.js"></script>
    <!-- JS -->
    <script src="assets/js/login/alerts_login.js"></script>
    <script src="assets/js/login/validacao_login.js"></script>
    <script type="module" src="assets/js/login/animacao_login.js"></script>
    <!-- JQUERY MASK -->
    <script src="assets/js/jquery.mask.min.js"></script>
    <!-- ARQUIVO DE MASKS PARA INPUTS -->
    <script src="assets/js/mask_forms.js"></script>
    <!-- SWEET ALERT -->
    <script src="assets/js/sweetalert2.js"></script>


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/agendamento.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    </body>

    </html>