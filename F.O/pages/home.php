
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
                        <img src="assets/images/hero-slider/home-1/hero-slider-2.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                          <a href="product-details-default.html"
                                            class="btn btn-lg btn-outline-golden">Fazer Agendamento</a>
                                      <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>
                                      <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/> 
                                      
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



   <!-- Mini Galeria de serviços prestados na barbearia -->
   <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
   <div class="container">
       <div class="row">
           <div class="col-12">
               <div class="product-slider-default-1row default-slider-nav-arrow">
                   <!-- Slider main container -->
                   <div class="swiper-container product-default-slider-4grid-1row">
                       <!-- Additional required wrapper -->
                       <div class="swiper-wrapper d-flex justify-content-between">
                           <?php
                           $sql = "SELECT nome, link_img, preco FROM servicos";
                           $result = $con->query($sql);

                           if ($result->num_rows > 0) {
                               while ($row = $result->fetch_assoc()) {
                                   $nome = $row["nome"];
                                   $imagem = $row["link_img"];
                                   $preco = $row["preco"];

                                   // Exibindo as informações do produto
                                   echo '<div class="product-default-single-item product-color--golden swiper-slide">';
                                   echo '<div class="image-box">';
                                   echo '<a class="image-link">';
                                   echo '<img src="' . $imagem . '" alt="" class="img-fluid">';
                                   echo '</a>';
                                   echo '<div class="action-link">';
                                   echo '<div class="action-link-left">';
                                   echo '<a href="./?p=2" data-bs-toggle="modal" >Add to Cart</a>';
                                   echo '</div>';
                                   echo '<div class="action-link-right">';
                                   echo '<a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>';
                                   echo '<a href="wishlist.html"><i class="icon-heart"></i></a>';
                                   echo '<a href="compare.html"><i class="icon-shuffle"></i></a>';
                                   echo '</div>';
                                   echo '</div>';
                                   echo '</div>';
                                   echo '<div class="content">';
                                   echo '<div class="content-left">';
                                   echo '<h6 class="title"><a href="product-details-default.html">' . $nome . '</a></h6>';
                                   echo '<ul class="review-star">';
                                   echo '<li class="fill"><i class="ion-android-star"></i></li>';
                                   echo '<li class="fill"><i class="ion-android-star"></i></li>';
                                   echo '<li class="fill"><i class="ion-android-star"></i></li>';
                                   echo '<li class="fill"><i class="ion-android-star"></i></li>';
                                   echo '<li class="empty"><i class="ion-android-star"></i></li>';
                                   echo '</ul>';
                                   echo '</div>';
                                   echo '<div class="content-right">';
                                   echo '<span class="price">' . $preco . '</span>';
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




   <!-- Start Banner Funcionarios Section -->
   <div class="banner-section">
       <div class="banner-wrapper clearfix">
           <!-- Start Banner Single Item -->
           <?php
            $consulta = $con->query("SELECT func_id, primeiro_nome, ultimo_nome, imagem FROM funcionarios LIMIT 4");

            while ($funcionario = $consulta->fetch_assoc()) {
                $idFuncionario = $funcionario['func_id'];
                $primeiroNome = $funcionario['primeiro_nome'];
                $ultimoNome = $funcionario['ultimo_nome'];
                $imagem = $funcionario['imagem'];

                echo '
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive" data-aos="fade-up" data-aos-delay="0">
                <div class="image">
                    <img class="img-fluid" src="' . $imagem . '" alt="" width="1280" height="1920">
                </div>
                <a href="./?p=10&id=' . $idFuncionario . '" class="content">
                    <div class="inner">
                        <h4 class="title">' . $primeiroNome . ' ' . $ultimoNome . '</h4>
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>';
            }

            $con->close();
            ?>
       </div>
   </div>

   <!-- End Funcionarios Banner Section -->




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