<?php

// Consulta SQL para obter os dados da tabela empresa
$sqlEmpresa = "SELECT nome, logo, descricao, telefone, email, horario_trabalho, endereco, loc FROM empresa";
$resultEmpresa = mysqli_query($conn, $sqlEmpresa);

// Verifica se a consulta da tabela empresa foi executada com sucesso
if ($resultEmpresa) {
    // Obtém os dados da empresa
    $empresa = mysqli_fetch_assoc($resultEmpresa);

    // Armazene os valores das colunas em variáveis
    $nomeEmpresa = $empresa['nome'];
    $logoEmpresa = $empresa['logo'];
    $descricaoEmpresa = $empresa['descricao'];
    $telefoneEmpresa = $empresa['telefone'];
    $emailEmpresa = $empresa['email'];
    $horarioTrabalhoEmpresa = $empresa['horario_trabalho'];
    $enderecoEmpresa = $empresa['endereco'];
    $locEmpresa = $empresa['loc'];
} else {
    echo "Erro na consulta da tabela empresa: " . mysqli_error($conn);
}

// Consulta SQL para obter os dados da tabela funcionario
$sqlFuncionario = "SELECT primeiro_nome, ultimo_nome, rede_social, imagem, funcao FROM funcionarios";
$resultFuncionario = mysqli_query($conn, $sqlFuncionario);

// Verifica se a consulta da tabela funcionario foi executada com sucesso
if ($resultFuncionario) {
    // Obtém os dados do funcionario
    $funcionario = mysqli_fetch_assoc($resultFuncionario);

    // Armazene os valores das colunas em variáveis
    $primeiroNomeFuncionario = $funcionario['primeiro_nome'];
    $ultimoNomeFuncionario = $funcionario['ultimo_nome'];
    $redeSocialFuncionario = $funcionario['rede_social'];
    $imagemFuncionario = $funcionario['imagem'];
    $funcaoFuncionario = $funcionario['funcao'];
} else {
    echo "Erro na consulta da tabela funcionario: " . mysqli_error($conn);
}

// Consulta SQL para obter os dados da tabela tipo_servicos
$sqlTipoServicos = "SELECT nome, descricao, imagem FROM tipo_servico";
$resultTipoServicos = mysqli_query($conn, $sqlTipoServicos);

// Verifica se a consulta da tabela tipo_servicos foi executada com sucesso
if ($resultTipoServicos) {
    // Obtém os dados do tipo de servicos
    $tipoServicos = mysqli_fetch_assoc($resultTipoServicos);

    // Armazene os valores das colunas em variáveis
    $nomeTipoServicos = $tipoServicos['nome'];
    $descricaoTipoServicos = $tipoServicos['descricao'];
    $imagemTipoServicos = $tipoServicos['imagem'];
} else {
    echo "Erro na consulta da tabela tipo_servicos: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados


?>



<div class="about-top">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between d-sm-column">
                <div class="col-md-6">
                    <div class="about-img" data-aos="fade-up" data-aos-delay="0">
                        <div class="img-responsive">
                            <img src="assets/images/about/img-about.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="title">SOBRE A BARBEARIA BARTY</h3>
                        <p><?php echo $descricao; ?>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Top -->

    <!-- Start Slill Progress -->
    <div class="progressbar-section section-top-gap-100 section-inner-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="content" data-aos="fade-up" data-aos-delay="0">
                        <h4 class="title">Functionality meets perfection</h4>
                        <p>In today’s day and age, one cannot underestimate the importance of design, the art of
                            creating striking visuals to move and captivate your audience. And as the world becomes more
                            and more digitized with each passing second, the importance of graphic design has been
                            rocketed to the top.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-progress m-t-40">
                        <div class="skill-progressbar" data-aos="fade-up" data-aos-delay="0">
                            <h6 class="font--semi-bold m-b-15">UI/UX</h6>
                            <div class="line-progressbar" data-percentage="75" data-progress-color="#b19361"></div>
                        </div>
                        <div class="skill-progressbar" data-aos="fade-up" data-aos-delay="200">
                            <h6 class="font--semi-bold m-b-15">Ideas</h6>
                            <div class="line-progressbar" data-percentage="86" data-progress-color="#b19361"></div>
                        </div>
                        <div class="skill-progressbar" data-aos="fade-up" data-aos-delay="400">
                            <h6 class="font--semi-bold m-b-15">Design</h6>
                            <div class="line-progressbar" data-percentage="97" data-progress-color="#b19361"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slill Progress -->

    <!-- Start Service Section -->
    <div class="service-promo-section section-top-gap-100">
        <div class="service-wrapper">
            <div class="container">
            <div class="row">
    <?php
    $resultTipoServicos = mysqli_query($conn, $sqlTipoServicos);

    // Verifica se a consulta da tabela tipo_servicos foi executada com sucesso
    if ($resultTipoServicos && mysqli_num_rows($resultTipoServicos) > 0) {
        while ($tipoServicos = mysqli_fetch_assoc($resultTipoServicos)) {
            $nomeTipoServicos = $tipoServicos['nome'];
            $descricaoTipoServicos = $tipoServicos['descricao'];
            $imagemTipoServicos = $tipoServicos['imagem'];
    ?>
            <!-- Start Service Promo Single Item -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img src="<?php echo $imagemTipoServicos; ?>" alt="">
                    </div>
                    <div class="content">
                        <h6 class="title"><?php echo $nomeTipoServicos; ?></h6>
                        <p><?php echo $descricaoTipoServicos; ?></p>
                    </div>
                </div>
            </div>
            <!-- End Service Promo Single Item -->
    <?php
        }
    } else {
        echo "Nenhum serviço encontrado.";
    }
    ?>
</div>

            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!--  Start  Team Section    -->
    <div class="team-section section-top-gap-100 secton-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content text-center">
                                <h3 class="section-title">Meet Our Team</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Section Content Text Area -->
        <div class="team-wrapper">
            <div class="container">
                <div class="row mb-n6">
                    <div class="col-xl-3 mb-5">
                        <div class="team-single" data-aos="fade-up" data-aos-delay="0">
                            <div class="team-img">
                                <img class="img-fluid" src="assets/images/team/leader1.png" alt="">
                            </div>
                            <div class="team-content">
                                <h6 class="team-name font--bold mt-5">Ms. Veronica</h6>
                                <span class="team-title">Web Designer</span>
                                <ul class="team-social pos-absolute">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ion-social-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 mb-5">
                        <div class="team-single" data-aos="fade-up" data-aos-delay="200">
                            <div class="team-img">
                                <img class="img-fluid" src="assets/images/team/leader2.png" alt="">
                            </div>
                            <div class="team-content">
                                <h6 class="team-name font--bold mt-5">Missa Santos</h6>
                                <span class="team-title">CEO Founder</span>
                                <ul class="team-social pos-absolute">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ion-social-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 mb-5">
                        <div class="team-single" data-aos="fade-up" data-aos-delay="400">
                            <div class="team-img">
                                <img class="img-fluid" src="assets/images/team/leader3.png" alt="">
                            </div>
                            <div class="team-content">
                                <h6 class="team-name font--bold mt-5">Missa Santos</h6>
                                <span class="team-title">Chief Officer</span>
                                <ul class="team-social pos-absolute">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ion-social-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 mb-5">
                        <div class="team-single" data-aos="fade-up" data-aos-delay="600">
                            <div class="team-img">
                                <img class="img-fluid" src="assets/images/team/leader4.png" alt="">
                            </div>
                            <div class="team-content">
                                <h6 class="team-name font--bold mt-5">Lisa Antonia</h6>
                                <span class="team-title">CTO</span>
                                <ul class="team-social pos-absolute">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ion-social-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   End  Team Section   -->

    <!-- Start Company Logo Section -->
    <div class="company-logo-section section-top-gap-100 section-fluid">
        <div class="company-logo-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="company-logo-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container company-logo-slider">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="assets/images/company-logo/company-logo-1.png" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="assets/images/company-logo/company-logo-2.png" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="assets/images/company-logo/company-logo-3.png" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="assets/images/company-logo/company-logo-4.png" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="assets/images/company-logo/company-logo-5.png" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="assets/images/company-logo/company-logo-6.png" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="assets/images/company-logo/company-logo-7.png" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="assets/images/company-logo/company-logo-8.png" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev d-none d-md-block"></div>
                            <div class="swiper-button-next d-none d-md-block"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>