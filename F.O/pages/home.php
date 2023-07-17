<!-- Start Hero Slider Section-->
<div class="hero-slider-section">
    <?php
    if (isset($_SESSION['status'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php

        unset($_SESSION['status']);
    }
    ?>
    <!-- Slider main container -->
    <div class="hero-slider-active swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">

            <!-- Start Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="assets/images/hero-slider/home-1/banner.png" alt="">
                </div>
                <!-- Hero Slider Content -->
                <div class="hero-slider-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <div class="hero-slider-content">
                                    <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
                                    <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
                                    <a href="./?p=1" class="btn btn-lg btn-outline-golden">Fazer Agendamento</a>
                                    <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
                                    <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Single Slider Item -->
        </div>


    </div>
</div>
<!-- End Hero Slider Section-->

<!-- Serviços oferecidos na barbearia -->
<div class="service-promo-section section-top-gap-100">
    <div class="service-wrapper">
        <div class="container">
            <div class="row">
                <?php
                // Consulta SQL para buscar as informações da tabela tipo_servico (limitado a 4 registros)
                $sql = "SELECT nome, imagem, descricao FROM tipo_servico LIMIT 4";
                $resultado = mysqli_query($conn, $sql);

                // Verifica se há registros retornados pela consulta
                if (mysqli_num_rows($resultado) > 0) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $nome = $row['nome'];
                        $imagem = $row['imagem'];
                        $descricao = $row['descricao'];
                ?>

                        <!-- Start Service Promo Single Item -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                                <div class="image">
                                    <img src="<?php echo $imagem; ?>" alt="<?php echo $nome; ?>">
                                </div>
                                <div class="content">
                                    <h6 class="title"><?php echo $nome; ?></h6>
                                    <p><?php echo $descricao; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Service Promo Single Item -->

                <?php
                    }
                } else {
                    echo "Nenhum registro encontrado na tabela tipo_servico.";
                }
                ?>
                <!-- End Service Promo Single Item -->
            </div>
        </div>
    </div>
</div>
<br /> <br /> <br />
<!-- Fim de serviços oferecidos Section -->



<!-- Mini Galeria de serviços prestados na barbearia -->
<div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-content-gap">
                    <div class="secton-content">
                        <h3 class="section-title">Mini Galeria</h3>
                    </div>
                </div>
                <div class="product-slider-default-1row default-slider-nav-arrow">
                    <!-- Slider main container -->
                    <div class="swiper-container product-default-slider-4grid-1row">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper d-flex justify-content-between">
                            <?php
                            $sql = "SELECT servico_id,nome, link_img, preco FROM servicos ORDER BY RAND() Limit 9 ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    $nome = $row["nome"];
                                    $imagem = $row["link_img"];
                                    $preco = $row["preco"];

                                    // Exibindo as informações do produto
                                    echo '<div class="product-default-single-item product-color--golden swiper-slide">';
                                    echo '<div class="image-box">';
                                    echo '<a class="image-link">';
                                    echo '<img src="' . $imagem . '" alt="" class="img-fluid" > ';
                                    echo '</a>';
                                    echo '<div class="action-link">';
                                    echo '<div class="action-link-left">';
                                    echo '<a href="./?p=1&' . $row['servico_id'] . '" data-bs-toggle="modal" >Fazer Agendamento</a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="content">';
                                    echo '<div class="content-left">';
                                    echo '<h6 class="title"><a href="./?p=1&id=' . $row['servico_id'] . '">' . $nome . '</a></h6>';

                                    echo '</div>';
                                    echo '<div class="content-right">';
                                    echo '<span class="price">' . $preco . ' €</span>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo "Nenhum serviço encontrado.";
                            }
                            ?>

                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fim da Mini Galeria de serviços prestados na barbearia -->


<br /> <br /> <br /> <br />

<!-- Start Banner Funcionarios Section -->
<div class="blog-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">Funcionários</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="blog-wrapper" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-default-slider default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container blog-slider">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php
                                $consulta = $conn->query("SELECT func_id, primeiro_nome, ultimo_nome, imagem FROM funcionarios ORDER BY primeiro_nome ASC");

                                while ($funcionario = $consulta->fetch_assoc()) {
                                    $idFuncionario = $funcionario['func_id'];
                                    $primeiroNome = $funcionario['primeiro_nome'];
                                    $ultimoNome = $funcionario['ultimo_nome'];
                                    $imagem = $funcionario['imagem'];

                                    echo '<div class="blog-default-single-item blog-color--golden swiper-slide">
                                    <div class="image-box">';

                                    if (!empty($imagem)) {
                                        echo '<a href="./?p=10&id=' . $idFuncionario . '" class="image-link">
                                        <img class="img-fluid" src="' . $imagem . '" alt="">
                                    </a>';
                                    }

                                    echo '</div>
                                    <div class="content">
                                        <h6 class="title">
                                            <a href="./?p=10&id=' . $idFuncionario . '">' . $primeiroNome . ' ' . $ultimoNome . '</a>
                                        </h6>
                                        <div class="inner">
                                            <a href="./?p=10&id=' . $idFuncionario . '" class="read-more-btn icon-space-left">Ver Perfil <span><i class="ion-ios-arrow-thin-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br><br><br><br><br><br>
<!-- End Funcionarios Banner Section -->




<!-- Start Instagramr Section -->

<!-- End Instagramr Section -->