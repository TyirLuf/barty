   <!-- Start Hero Slider Section-->
   <div class="hero-slider-section">
       <!-- Slider main container -->
       <div class="hero-slider-active swiper-container">
           <!-- Additional required wrapper -->
           <div class="swiper-wrapper">
               <!-- Start Hero Single Slider Item -->
               <div class="hero-single-slider-item swiper-slide">
                   <!-- Hero Slider Image -->
                   <div class="hero-slider-bg">
                       <img src="assets/images/hero-slider/home-1/sla.jpg" alt="">
                   </div>
                   <!-- Hero Slider Content -->
                   <div class="hero-slider-wrapper">
                       <div class="container">
                           <div class="row">
                               <div class="col-auto">
                                   <div class="hero-slider-content">
                                       <h4 class="subtitle">New collection</h4>
                                       <h2 class="title">Best Of NeoCon <br> Gold Award </h2>
                                       <a href="product-details-default.html" class="btn btn-lg btn-outline-golden">Make an appointment </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div> <!-- End Hero Single Slider Item -->
               <!-- Start Hero Single Slider Item -->
               <div class="hero-single-slider-item swiper-slide">
                   <!-- Hero Slider Image -->
                   <div class="hero-slider-bg">
                       <img src="assets/images/hero-slider/home-1/hero-slider-2.jpg" alt="">
                   </div>
                   <!-- Hero Slider Content -->
                   <div class="hero-slider-wrapper">
                       <div class="container">
                           <div class="row">
                               <div class="col-auto">
                                   <div class="hero-slider-content">
                                       <h4 class="subtitle">New collection</h4>
                                       <h2 class="title">Luxy Chairs <br> Design Award </h2>
                                       <a href="product-details-default.html" class="btn btn-lg btn-outline-golden">Make an appointment </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div> <!-- End Hero Single Slider Item -->
           </div>

           <!-- If we need pagination -->
           <div class="swiper-pagination active-color-golden"></div>

           <!-- If we need navigation buttons -->
           <div class="swiper-button-prev d-none d-lg-block"></div>
           <div class="swiper-button-next d-none d-lg-block"></div>
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
                    $resultado = mysqli_query($con, $sql);

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
   <!-- Fim de serviços oferecidos Section -->

   <!-- Start Banner Section -->
   <div class="banner-section section-top-gap-100 section-fluid">
       <div class="banner-wrapper">
           <div class="container-fluid">
               <div class="row mb-n6">

                   <div class="col-lg-6 col-12 mb-6">
                       <!-- Start Banner Single Item -->
                       <div class="banner-single-item banner-style-1 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="0">
                           <div class="image">
                               <img src="assets/images/banner/banner-style-1-img-1.jpg" alt="">
                           </div>
                           <div class="content">
                               <h4 class="title">Mini rechargeable
                                   Table Lamp - E216</h4>
                               <h5 class="sub-title">We design your home</h5>
                               <a href="product-details-default.html" class="btn btn-lg btn-outline-golden icon-space-left"><span class="d-flex align-items-center">discover now <i class="ion-ios-arrow-thin-right"></i></span></a>
                           </div>
                       </div>
                       <!-- End Banner Single Item -->
                   </div>

                   <div class="col-lg-6 col-12 mb-6">
                       <div class="row mb-n6">
                           <!-- Start Banner Single Item -->
                           <div class="col-lg-6 col-sm-6 mb-6">
                               <div class="banner-single-item banner-style-2 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="0">
                                   <div class="image">
                                       <img src="assets/images/banner/banner-style-2-img-1.jpg" alt="">
                                   </div>
                                   <div class="content">
                                       <h4 class="title">Kitchen <br>
                                           utensils</h4>
                                       <a href="product-details-default.html" class="link-text"><span>Shop
                                               now</span></a>
                                   </div>
                               </div>
                           </div>
                           <!-- End Banner Single Item -->
                           <!-- Start Banner Single Item -->
                           <div class="col-lg-6 col-sm-6 mb-6">
                               <div class="banner-single-item banner-style-2 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="200">
                                   <div class="image">
                                       <img src="assets/images/banner/banner-style-2-img-2.jpg" alt="">
                                   </div>
                                   <div class="content">
                                       <h4 class="title">Sofas and <br>
                                           Armchairs</h4>
                                       <a href="product-details-default.html" class="link-text"><span>Shop
                                               now</span></a>
                                   </div>
                               </div>
                           </div>
                           <!-- End Banner Single Item -->
                           <!-- Start Banner Single Item -->
                           <div class="col-lg-6 col-sm-6 mb-6">
                               <div class="banner-single-item banner-style-2 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="0">
                                   <div class="image">
                                       <img src="assets/images/banner/banner-style-2-img-3.jpg" alt="">
                                   </div>
                                   <div class="content">
                                       <h4 class="title">Chair & Bar<br>
                                           stools</h4>
                                       <a href="product-details-default.html" class="link-text"><span>Shop
                                               now</span></a>
                                   </div>
                               </div>
                           </div>
                           <!-- End Banner Single Item -->
                           <!-- Start Banner Single Item -->
                           <div class="col-lg-6 col-sm-6 mb-6">
                               <div class="banner-single-item banner-style-2 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="200">
                                   <div class="image">
                                       <img src="assets/images/banner/banner-style-2-img-4.jpg" alt="">
                                   </div>
                                   <div class="content">
                                       <h4>Interior <br>
                                           lighting</h4>
                                       <a href="product-details-default.html"><span>Shop now</span></a>
                                   </div>
                               </div>
                           </div>
                           <!-- End Banner Single Item -->
                       </div>
                   </div>
               </div>

           </div>
       </div>
   </div>
   <!-- End Banner Section -->

   <!-- Start Product Default Slider Section -->
   <div class="product-default-slider-section section-top-gap-100 section-fluid section-inner-bg">
       <!-- Start Section Content Text Area -->
       <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="section-content-gap">
                           <div class="secton-content">
                               <h3 class="section-title">Serviços</h3>
                               <p>Add our best sellers to your weekly lineup.</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Start Section Content Text Area -->
       <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="product-slider-default-1row default-slider-nav-arrow">
                           <!-- Slider main container -->
                           <div class="swiper-container product-default-slider-4grid-1row">
                               <!-- Additional required wrapper -->
                               <div class="swiper-wrapper">
                                   <!-- End Product Default Single Item -->
                                   <!-- Start Product Default Single Item -->
        
                                   <!-- End Product Default Single Item -->
                                   <!-- Start Product Default Single Item -->
                                   <?php
    $sql = "SELECT nome, link_img, preco FROM servicos";
    $result = $con->query($sql);

    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nome = $row["nome"];
            $imagem = $row["link_img"];
            $preco = $row["preco"];
?>
            <div class="product-default-single-item product-color--golden swiper-slide">
                <div class="image-box">
                    <a href="product-details-default.html" class="image-link">
                        <img src="<?php echo $imagem; ?>" alt="">
                        <!-- Adicione o segundo <img> caso necessário -->
                    </a>
                    <div class="action-link">
                        <div class="action-link-left">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add to Cart</a>
                        </div>
                        <div class="action-link-right">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>
                            <a href="wishlist.html"><i class="icon-heart"></i></a>
                            <a href="compare.html"><i class="icon-shuffle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="content-left">
                        <h6 class="title"><a href="product-details-default.html"><?php echo $nome; ?></a></h6>
                        <!-- Restante do código HTML com as informações atualizadas -->
                    </div>
                    <div class="content-right">
                        <span class="price"><?php echo $preco; ?></span>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "Nenhum resultado encontrado na tabela 'servicos'.";
    }
?>

                                       </div>
                                   </div> <!-- End Product Default Single Item -->
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
   </div>
   <!-- End Product Default Slider Section -->

   <!-- Start Banner Funcionarios Section -->
   <div class="banner-section">
       <div class="banner-wrapper clearfix">
           <!-- Start Banner Single Item -->
           <?php


            $consulta = $con->query("SELECT primeiro_nome, ultimo_nome, imagem FROM funcionarios LIMIT 4");

            while ($funcionario = $consulta->fetch_assoc()) {
                $primeiroNome = $funcionario['primeiro_nome'];
                $ultimoNome = $funcionario['ultimo_nome'];
                $imagem = $funcionario['imagem'];

                echo '
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive" data-aos="fade-up" data-aos-delay="0">
                <div class="image">
                    <img class="img-fluid" src="' . $imagem . '" alt="" width="1280" height="1920">
                </div>
                <a href="./?p=10" class="content">
                    <div class="inner">
                        <h4 class="title">' . $primeiroNome . ' ' . $ultimoNome . '</h4>
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
                </div>    ';
            }

            $con->close();
            ?>

          </div>
       </div>
       <!-- End Banner Section -->


       <!-- Start Instagramr Section -->
       <div class="instagram-section section-top-gap-100 section-inner-bg">
           <div class="instagram-wrapper" data-aos="fade-up" data-aos-delay="0">
               <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="instagram-box">
                               <div id="instagramFeed" class="instagram-grid clearfix">
                                   <a href="https://www.instagram.com/p/CCFOZKDDS6S/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-1.jpg" alt=""></a>
                                   <a href="https://www.instagram.com/p/CCFOYDNjWF5/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-2.jpg" alt=""></a>
                                   <a href="https://www.instagram.com/p/CCFOXH6D-zQ/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-3.jpg" alt=""></a>
                                   <a href="https://www.instagram.com/p/CCFOVcrDDOo/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-4.jpg" alt=""></a>
                                   <a href="https://www.instagram.com/p/CCFOUajjABP/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-5.jpg" alt=""></a>
                                   <a href="https://www.instagram.com/p/CCFOS2MDmjj/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-6.jpg" alt=""></a>
                               </div>
                               <div class="instagram-link">
                                   <h5><a href="https://www.instagram.com/myfurniturecom/" target="_blank" rel="noopener noreferrer">HONOTEMPLATE</a></h5>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- End Instagramr Section -->