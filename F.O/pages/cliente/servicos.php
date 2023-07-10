<?php
$idTipoServico = isset($_GET['id']) ? $_GET['id'] : '';

// Consulta SQL para obter o número total de serviços
$sqlTotalServicos = "SELECT COUNT(*) AS total FROM servicos WHERE tipo = '$idTipoServico'";
$resultTotalServicos = $conn->query($sqlTotalServicos);
$rowTotalServicos = $resultTotalServicos->fetch_assoc();
$totalServicos = $rowTotalServicos['total'];

// Define o número de resultados por página
$resultadosPorPagina = 9;

// Calcula o número total de páginas
$totalPaginas = ceil($totalServicos / $resultadosPorPagina);

// Obtém o número da página atual
if (isset($_GET['pagina'])) {
    $paginaAtual = $_GET['pagina'];
} else {
    $paginaAtual = 1;
}

// Calcula o índice de início e fim dos resultados para a página atual
$indiceInicio = ($paginaAtual - 1) * $resultadosPorPagina;
$indiceFim = $indiceInicio + $resultadosPorPagina - 1;

// Obtém o parâmetro de ordenação da URL
$ordenacao = isset($_GET['sort']) ? $_GET['sort'] : '';

// Consulta SQL para obter os serviços com base no tipo de serviço selecionado e na ordenação
$sqlServicos = "SELECT * FROM servicos WHERE tipo = '$idTipoServico'";

if ($ordenacao == 'name_z') {
    $sqlServicos .= " ORDER BY nome DESC";
} elseif ($ordenacao == 'price_low_high') {
    $sqlServicos .= " ORDER BY preco ASC";
} elseif ($ordenacao == 'price_high_low') {
    $sqlServicos .= " ORDER BY preco DESC";
} else {
    $sqlServicos .= " ORDER BY nome ASC";
}

$resultServicos = $conn->query($sqlServicos);

?>




<!-- ...:::: Start Shop Section:::... -->
<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row-reverse">
            <div class="col-lg-3">
                <!-- Start Sidebar Area -->
                <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                    <!-- Tipos -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">Tipo de Serviços</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                <?php
                                // Faça a conexão com o banco de dados antes de executar esta parte do código
                                $conn = mysqli_connect("localhost", "root", "", "barty_teste");
                                // Consulta SQL para buscar os nomes dos tipos de serviço da tabela tipo_servico
                                $sql = "SELECT * FROM tipo_servico Order by nome ASC";
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
                        <h6 class="sidebar-title">FILTRAR POR PREÇO</h6>
                        <div class="sidebar-content">
                            <div id="slider-range"></div>
                            <div class="filter-type-price">
                                <label for="amount">Preço:</label>
                                <input type="text" id="amount">
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
                            <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                data-aos="fade-up" data-aos-delay="0">
                                <!-- Start Sort tab Button -->
                                <div class="sort-tablist d-flex align-items-center">
                                    <ul class="tablist nav sort-tab-btn">
                                        <li><a class="nav-link" data-bs-toggle="tab" href="#layout-3-grid"><img
                                                    src="assets/images/icons/bkg_grid.png" alt=""></a></li>
                                        <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-list"><img
                                                    src="assets/images/icons/bkg_list.png" alt=""></a></li>
                                    </ul>

                                    <!-- Start Page Amount -->
                                    <div class="page-amount ml-2">
                                        <span>Mostrar
                                            <?php echo $indiceInicio + 1; ?>-
                                            <?php echo min($indiceFim + 1, $totalServicos); ?> de
                                            <?php echo $totalServicos; ?> resultados
                                        </span>
                                    </div> <!-- End Page Amount -->
                                </div> <!-- End Sort tab Button -->

                                <!-- Start Sort Select Option -->
                                <div class="sort-select-list d-flex align-items-center">
                                    <label class="mr-2">Ordenar:</label>
                                    <form action="./" method="GET">
                                        <fieldset>
                                            <input type="text" name="p" value="2" hidden>
                                            <select name="sort" id="sort" onchange="this.form.submit()">
                                                <option value="name_a" <?php if ($ordenacao == 'name_a')
                                                    echo 'selected'; ?>>Ordenar por Nome: A</option>
                                                <option value="name_z" <?php if ($ordenacao == 'name_z')
                                                    echo 'selected'; ?>>Ordenar por Nome: Z</option>
                                                <option value="price_low_high" <?php if ($ordenacao == 'price_low_high')
                                                    echo 'selected'; ?>>Ordenar por Preço: baixo para alto</option>
                                                <option value="price_high_low" <?php if ($ordenacao == 'price_high_low')
                                                    echo 'selected'; ?>>Ordenar por Preço: alto para baixo</option>
                                            </select>
                                        </fieldset>
                                    </form>
                                </div>
                                <!-- End Sort Select Option -->
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
                                            $sql = "SELECT * FROM servicos";
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
                                                                                <img src="' . $link_img . '" alt=""   style="width: 230px; height: 250px; margin-right: 20px;" >
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
                                                    <div class="product-list-single product-color--golden"
                                                        data-aos="fade-up" data-aos-delay="0">
                                                        <a href="product-details-default.html"
                                                            class="product-list-img-link">
                                                            <img class="img-fluid" src="<?php echo $servico['link_img']; ?>"
                                                                alt=""
                                                                style="width: 295px; height: 250px; margin-right: 20px;">
                                                        </a>
                                                        <div class="product-list-content">
                                                            <h5 class="product-list-link"><a
                                                                    href="product-details-default.html">
                                                                    <?php echo $servico['nome']; ?>
                                                                </a></h5>
                                                            <ul class="review-star">
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="empty"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                            <span class="product-list-price">
                                                                <?php echo $servico['preco']; ?>
                                                            </span>
                                                            <p>
                                                                <?php echo $servico['descricao']; ?>
                                                            </p>
                                                            <div class="product-action-icon-link-list">
                                                                <a href="./?p=1" data-bs-toggle="modal"
                                                                    class="btn btn-lg btn-black-default-hover">Fazer
                                                                    Agendamento</a>
                                                                <a href="wishlist.html"
                                                                    class="btn btn-lg btn-black-default-hover"><i
                                                                        class="icon-heart"></i></a>
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