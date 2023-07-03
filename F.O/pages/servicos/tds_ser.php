<?php

require './php/connect.php';

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para obter os tipos de serviço
$sqlTiposServico = "SELECT * FROM tipo_servico";
$resultTiposServico = $conn->query($sqlTiposServico);

// Consulta SQL para obter os serviços
$sqlServicos = "SELECT * FROM servicos";
$resultServicos = $conn->query($sqlServicos);

?>


<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-3">
                <!-- Start Sidebar Area -->
                <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                    <!-- Start TIPO SERVIÇO -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">TIPOS SERVIÇOS</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                <?php while ($row = $resultTiposServico->fetch_assoc()) : ?>
                                    <li><a href="#"><?php echo $row['nome']; ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>


                    <!-- Start FILTRO PREÇO -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">FILTRAR POR PREÇO</h6>
                        <div class="sidebar-content">
                            <div id="slider-range"></div>
                            <div class="filter-type-price">
                                <label for="amount">Price range:</label>
                                <input type="text" id="amount">
                            </div>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">Tag products</h6>
                        <div class="sidebar-content">
                            <div class="tag-link">
                                <a href="#">asian</a>
                                <a href="#">brown</a>
                                <a href="#">euro</a>
                                <a href="#">fashion</a>
                                <a href="#">hat</a>
                                <a href="#">t-shirt</a>
                                <a href="#">teen</a>
                                <a href="#">travel</a>
                                <a href="#">white</a>
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
                                            <select name="speed" id="speed">
                                                <option>Sort by average rating</option>
                                                <option>Sort by popularity</option>
                                                <option selected="selected">Sort by newness</option>
                                                <option>Sort by price: low to high</option>
                                                <option>Sort by price: high to low</option>
                                                <option>Product Name: Z</option>
                                            </select>
                                        </fieldset>
                                    </form>
                                </div> <!-- End Sort Select Option -->
                            </div> <!-- Start Sort Wrapper Box -->
                        </div>
                    </div>
                </div> <!-- End Section Content -->

                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content tab-animate-zoom">
                                    <!-- Start Grid View Product -->
                                    <div class="tab-pane sort-layout-single" id="layout-3-grid">
                                        <div class="row">
                                            <div class="col-xl-4 col-sm-6 col-12">
                                                <!-- Start Product Default Single Item -->
                                                <?php while ($row = $resultServicos->fetch_assoc()) : ?>
                                                <div class="product-default-single-item product-color--golden">
                                                    <div class="image-box">
                                                        <a href="product-details-default.html" class="image-link">
                                                            <img src="<?php echo $row['link_img']; ?>" alt="">
                                                            
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
                                                            <h6 class="title"><a href="product-details-default.html"><?php echo $row['nome']; ?></a></h6>
                                                            <ul class="review-star">
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="empty"><i class="ion-android-star"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="content-right">
                                                            <span class="price"><?php echo $row['preco']; ?></span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php endwhile; ?>
                                                <!-- End Product Default Single Item -->
                                            </div>
                                        </div>
                                    </div> <!-- End Grid View Product -->




                                    <!-- Start List View Product -->
                                    <div class="tab-pane active show sort-layout-single" id="layout-list">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <?php while ($row = $resultServicos->fetch_assoc()) : ?>
                                                <div class="product-list-single product-color--golden" data-aos="fade-up" data-aos-delay="0">
                                                    <a href="product-details-default.html" class="product-list-img-link">
                                                        <img class="img-fluid" src="<?php echo $row['link_img']; ?>" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.html"><?php echo $row['nome']; ?>
                                                                </a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price"><del><?php echo $row['preco']; ?>€</del></span>
                                                        <p><?php echo $row['descricao']; ?></p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                                <?php endwhile; ?>
                                            </div>
                                        </div>
                                    </div> <!-- End List View Product -->
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
</div>