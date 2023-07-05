<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Consulta para buscar as informações da tabela "funcionarios"
$sql = "SELECT * FROM funcionarios WHERE func_id = $id";
$result = $conn->query($sql);

// Verifica se a consulta retornou funcionários
if ($result->num_rows > 0) {
    // Exibe as informações
    $row = $result->fetch_assoc();
    $imagem = $row["imagem"];
    $primeiroNome = $row["primeiro_nome"];
    $ultimoNome = $row["ultimo_nome"];
    $descricao = $row["descricao"];
    $habilidades = $row["especializacao"];
    $genero = $row["genero"];
    $experiencia = $row["anos_experiencia"];
} else {
    // Caso nenhum funcionário seja encontrado
    $imagem = "caminho/para/uma/imagem/default.jpg";
    $primeiroNome = "Nome";
    $ultimoNome = "Sobrenome";
    $descricao = "Nenhuma descrição disponível.";
    $habilidades = "Nenhuma habilidade disponível.";
    $genero = "Nenhum cadrasto de gênero encontrado.";
    $experiencia = "Nenhuma experiência disponível.";
}

// Fecha a conexão com o banco de dados

?>

<!-- Start Product Details Section -->
<div class="product-details-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                    <!-- Start Large Image -->
                    <div class="product-large-image product-large-image-horaizontal swiper-container">
                        <div class="swiper-wrapper">
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="<?php echo $imagem; ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- End Large Image -->
                    <!-- Start Thumbnail Image -->
                    <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5"></div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="product-details-content-area product-details--golden" data-aos="fade-up" data-aos-delay="200">
                    <!-- Start  Product Details Text Area-->
                    <div class="product-details-text">
                        <h4 class="title"><?php echo $primeiroNome . ' ' . $ultimoNome; ?></h4>
                        <p><?php echo $descricao; ?></p>
                    </div> <!-- End  Product Details Text Area-->
                    <!-- Start Product Variable Area -->
                    <div class="product-details-variable">
                        <!-- Product Variable Single Item -->
                        <div class="d-flex align-items-center ">
                            <div class="product-add-to-cart-btn">
                                <a href="./?p=9" data-bs-toggle="modal" data-bs-target="#modalAddcart">Agendar</a>
                            </div>
                        </div>
                    </div> <!-- End Product Variable Area -->
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Details Section -->



<!-- Start Product Content Tab Section -->
<div class="product-details-content-tab-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">

                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                Descrição
                            </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#specification">
                                Especificação
                            </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                Avaliações
                            </a></li>
                    </ul> <!-- End Product Details Tab Button -->

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane active show" id="description">
                                <div class="single-tab-content-item">
                                    <p><?php echo $descricao; ?></p>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="specification">
                                <div class="single-tab-content-item">
                                    <table class="table table-bordered mb-20">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Gênero</th>
                                                <td><?php echo $genero; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Habilidades</th>
                                                <td><?php echo $habilidades; ?></td>
                                            <tr>
                                                <th scope="row">Experiência</th>
                                                <td><?php echo $experiencia; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="review">
                                <div class="single-tab-content-item">
                                    <!-- Start - Review Comment -->
                                    <ul class="comment">
                                        <!-- Start - Review Comment list-->
                                        <li class="comment-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="assets/images/user/image-1.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name">Kaedyn Fraser</h6>
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
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Tempora inventore dolorem a unde modi iste odio amet,
                                                            fugit fuga aliquam, voluptatem maiores animi dolor nulla
                                                            magnam ea! Dignissimos aspernatur cumque nam quod sint
                                                            provident modi alias culpa, inventore deserunt
                                                            accusantium amet earum soluta consequatur quasi eum eius
                                                            laboriosam, maiores praesentium explicabo enim dolores
                                                            quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam
                                                            officia, saepe repellat. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Start - Review Comment Reply-->
                                            <ul class="comment-reply">
                                                <li class="comment-reply-list">
                                                    <div class="comment-wrapper">
                                                        <div class="comment-img">
                                                            <img src="assets/images/user/image-2.png" alt="">
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-content-top">
                                                                <div class="comment-content-left">
                                                                    <h6 class="comment-name">Oaklee Odom</h6>
                                                                </div>
                                                                <div class="comment-content-right">
                                                                    <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                </div>
                                                            </div>

                                                            <div class="para-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur
                                                                    adipisicing elit. Tempora inventore dolorem a
                                                                    unde modi iste odio amet, fugit fuga aliquam,
                                                                    voluptatem maiores animi dolor nulla magnam ea!
                                                                    Dignissimos aspernatur cumque nam quod sint
                                                                    provident modi alias culpa, inventore deserunt
                                                                    accusantium amet earum soluta consequatur quasi
                                                                    eum eius laboriosam, maiores praesentium
                                                                    explicabo enim dolores quaerat! Voluptas ad
                                                                    ullam quia odio sint sunt. Ipsam officia, saepe
                                                                    repellat. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul> <!-- End - Review Comment Reply-->
                                        </li> <!-- End - Review Comment list-->
                                        <!-- Start - Review Comment list-->
                                        <li class="comment-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="assets/images/user/image-3.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name">Jaydin Jones</h6>
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
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Tempora inventore dolorem a unde modi iste odio amet,
                                                            fugit fuga aliquam, voluptatem maiores animi dolor nulla
                                                            magnam ea! Dignissimos aspernatur cumque nam quod sint
                                                            provident modi alias culpa, inventore deserunt
                                                            accusantium amet earum soluta consequatur quasi eum eius
                                                            laboriosam, maiores praesentium explicabo enim dolores
                                                            quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam
                                                            officia, saepe repellat. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> <!-- End - Review Comment list-->
                                    </ul> <!-- End - Review Comment -->
                                    <div class="review-form">
                                        <div class="review-form-text-top">
                                            <h5>ADD A REVIEW</h5>
                                            <p>Your email address will not be published. Required fields are marked
                                                *</p>
                                        </div>

                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-name">Your name <span>*</span></label>
                                                        <input id="comment-name" type="text" placeholder="Enter your name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-email">Your Email <span>*</span></label>
                                                        <input id="comment-email" type="email" placeholder="Enter your email" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="default-form-box">
                                                        <label for="comment-review-text">Your review
                                                            <span>*</span></label>
                                                        <textarea id="comment-review-text" placeholder="Write a review" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-black-default-hover" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                        </div>
                    </div> <!-- End Product Details Tab Content -->

                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Content Tab Section -->



<br /> <br /> <br /> <br /> <br /> <br /> <br><br /> <br /> <br /> <br /> <br /> <br /> <br>