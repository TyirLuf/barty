
   <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row-reverse">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Tipo de Serviços</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    <?php
                                    // Faça a conexão com o banco de dados antes de executar esta parte do código
                                    $conn = mysqli_connect("localhost", "root", "", "barty_teste");
                                    // Consulta SQL para buscar os nomes dos tipos de serviço da tabela tipo_servico
                                    $sql = "SELECT nome FROM tipo_servico";
                                    $resultado = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $nome = $row['nome'];
                                            echo '<li><a href="#">' . $nome . '</a></li>';
                                        }
                                    } else {
                                        echo '<li><a href="#">Nenhum tipo encontrado</a></li>';
                                    }

                                    // Feche a conexão com o banco de dados após usar

                                    ?>
                                </ul>
                            </div>

                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">FILTER BY PRICE</h6>
                            <div class="sidebar-content">
                                <div id="slider-range"></div>
                                <div class="filter-type-price">
                                    <label for="amount">Price range:</label>
                                    <input type="text" id="amount">
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->


                        <!--  <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">MANUFACTURER</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                <input type="checkbox" id="brakeParts">
                                                <span>Brake Parts(6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="accessories">
                                                <input type="checkbox" id="accessories">
                                                <span>Accessories (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="EngineParts">
                                                <input type="checkbox" id="EngineParts">
                                                <span>Engine Parts (4)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="hermes">
                                                <input type="checkbox" id="hermes">
                                                <span>hermes (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="tommyHilfiger">
                                                <input type="checkbox" id="tommyHilfiger">
                                                <span>Tommy Hilfiger(7)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>    
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SELECT BY COLOR</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="black">
                                                <input type="checkbox" id="black">
                                                <span>Black (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="blue">
                                                <input type="checkbox" id="blue">
                                                <span>Blue (8)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brown">
                                                <input type="checkbox" id="brown">
                                                <span>Brown (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="Green">
                                                <input type="checkbox" id="Green">
                                                <span>Green (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="pink">
                                                <input type="checkbox" id="pink">
                                                <span>Pink (4)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>  -->








                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Tag products</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    <?php
                                    // Faça a conexão com o banco de dados antes de executar esta parte do código
                                    $conn = mysqli_connect("localhost", "root", "", "barty_teste");
                                    // Consulta SQL para buscar os nomes dos tipos de serviço da tabela tipo_servico
                                    $sql = "SELECT nome FROM tipo_servico";
                                    $resultado = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $nome = $row['nome'];
                                            echo '<a href="#">' . $nome . '</a>';
                                        }
                                    } else {
                                        echo '<li><a href="#">Nenhum tipo encontrado</a></li>';
                                    }

                                    // Feche a conexão com o banco de dados após usar

                                    ?>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->



                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column" data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist d-flex align-items-center">
                                        <ul class="tablist nav sort-tab-btn">
                                            <li><a class="nav-link" data-bs-toggle="tab" href="#layout-3-grid"><img src="assets/images/icons/bkg_grid.png" alt=""></a></li>
                                            <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-list"><img src="assets/images/icons/bkg_list.png" alt=""></a></li>
                                        </ul>

                                        <!-- Start Page Amount -->
                                        <div class="page-amount ml-2">
                                            <span>Showing 1–9 of 21 results</span>
                                        </div> <!-- End Page Amount -->
                                    </div> <!-- End Sort tab Button -->

                                    <!-- Start Sort Select Option -->
                                    <div class="sort-select-list d-flex align-items-center">
                                        <label class="mr-2">Sort By:</label>
                                        <form action="#">
                                            <fieldset>
                                                <select name="order_by" id="order-by" onchange="sortBy(this)">
                                                    <option value="rating">Sort by average rating</option>
                                                    <option value="popularity">Sort by popularity</option>
                                                    <option value="newness" selected="selected">Sort by newness</option>
                                                    <option value="preco">Sort by price: low to high</option>
                                                    <option value="preco_desc">Sort by price: high to low</option>
                                                    <option value="nome">Product Name: A to Z</option>
                                                </select>
                                            </fieldset>
                                        </form>
                                    </div> <!-- End Sort Select Option -->
                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div>

                    <!-- End Section Content -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                <?php
                                                // Faça a conexão com o banco de dados antes de executar esta parte do código

                                                // Consulta SQL para buscar os dados da tabela servicos
                                                $sql = "SELECT nome, link_img, preco FROM servicos";
                                                $resultado = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($resultado) > 0) {
                                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                                        $nome = $row['nome'];
                                                        $link_img = $row['link_img'];
                                                        $preco = $row['preco'];

                                                        echo '
                                                                <div class="col-xl-4 col-sm-6 col-12">
                                                                    <div class="product-default-single-item product-color--golden">
                                                                        <div class="image-box">
                                                                            <a href="product-details-default.html" class="image-link">
                                                                                <img src="' . $link_img . '" alt=""  alt="" width="1000" height="1500">
                                                                            </a>
                                                                            <div class="action-link">
                                                                                <div class="action-link-left">
                                                                                    <a href="./?p=1" data-bs-toggle="modal">Fazer Agendamento</a>
                                                                                </div>
                                                                                <div class="action-link-right">
                                                                                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="content">
                                                                            <div class="content-left">
                                                                                <h6 class="title"><a href="product-details-default.html">' . $nome . '</a></h6>
                                                                                <ul class="review-star">
                                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="content-right">
                                                                                <span class="price">' . $preco . '€</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                    }
                                                } else {
                                                    echo 'Nenhum serviço encontrado.';
                                                }


                                                ?>
                                            </div>
                                        </div>
                                        <!-- End Grid View Product -->
                                        <!-- Start List View Product -->
                                        <?php

                                        // Query para obter os dados dos serviços
                                        $sql = "SELECT nome, link_img, preco, descricao FROM servicos";

                                        // Executa a query
                                        $resultado = mysqli_query($conn, $sql);

                                        // Verifica se a query foi executada com sucesso
                                        if ($resultado) {
                                            // Obtém os dados da consulta
                                            $dadosServicos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                                        } else {
                                            echo "Erro na execução da consulta: " . mysqli_error($conn);
                                            exit();
                                        }


                                        ?>

                                        <div class="tab-pane active show sort-layout-single" id="layout-list">
                                            <div class="row">
                                                <?php foreach ($dadosServicos as $servico) { ?>
                                                    <div class="col-12">
                                                        <!-- Start Product Defautlt Single -->
                                                        <div class="product-list-single product-color--golden" data-aos="fade-up" data-aos-delay="0">
                                                            <a href="product-details-default.html" class="product-list-img-link">
                                                                <img class="img-fluid" src="<?php echo $servico['link_img']; ?>" alt="">
                                                            </a>
                                                            <div class="product-list-content">
                                                                <h5 class="product-list-link"><a href="product-details-default.html"><?php echo $servico['nome']; ?></a></h5>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                                </ul>
                                                                <span class="product-list-price"><?php echo $servico['preco']; ?>€</span>
                                                                <p><?php echo $servico['descricao']; ?></p>
                                                                <div class="product-action-icon-link-list">
                                                                    <a href="./?p=1" data-bs-toggle="modal" class="btn btn-lg btn-black-default-hover">Fazer Agendamento</a>
                                                                    <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div> <!-- End Product Defautlt Single -->
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div> <!-- End List View Product -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                    <ul>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                    </ul>
                </div> <!-- End Pagination -->
            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
    </div> <!-- ...:::: End Shop Section:::... -->

