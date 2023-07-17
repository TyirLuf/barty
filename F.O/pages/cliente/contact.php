<?php
// Consulta SQL para obter as informações da tabela empresa
$sqlEmpresa = "SELECT loc,instagram,facebook,twitter, telefone, email, endereco FROM empresa WHERE id = 1";
$resultEmpresa = $conn->query($sqlEmpresa);

if ($resultEmpresa->num_rows > 0) {
    $rowEmpresa = $resultEmpresa->fetch_assoc();
    $loc = $rowEmpresa["loc"];
    $insta = $rowEmpresa["instagram"];
    $face = $rowEmpresa["facebook"];
    $twitter = $rowEmpresa["twitter"];
    $phone = $rowEmpresa["telefone"];
    $email = $rowEmpresa["email"];
    $address = $rowEmpresa["endereco"];

    if (isset($_SESSION['user'])) {
        // Obtém os dados do cliente logado
        $nomeCliente = $_SESSION['user']['primeiro_nome'] . ' ' . $_SESSION['user']['ultimo_nome'];
        $emailCliente = $_SESSION['user']['email'];
    } else {
        // Caso o cliente não esteja logado, define os valores padrão para os campos de nome e email
        $nomeCliente = "";
        $emailCliente = "";
    }

    // Exibindo o mapa
    echo '<div class="map-section" data-aos="fade-up" data-aos-delay="0">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12">';
    echo '<div class="mapouter">';
    echo '<div class="gmap_canvas">' . $loc . '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    // Exibindo as informações de contato
    echo '<div class="contact-section">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-lg-4">';
    echo '<div class="contact-details-wrapper section-top-gap-100" data-aos="fade-up" data-aos-delay="0">';
    echo '<div class="contact-details-single-item">';
    echo '<div class="contact-details-icon">';
    echo '<i class="fa fa-phone"></i>';
    echo '</div>';
    echo '<div class="contact-details-content contact-phone">';
    echo '<a href="tel:' . $phone . '">' . $phone . '</a>';
    echo '</div>';
    echo '</div>';
    echo '<div class="contact-details-single-item">';
    echo '<div class="contact-details-icon">';
    echo '<i class="fa fa-globe"></i>';
    echo '</div>';
    echo '<div class="contact-details-content contact-phone">';
    echo '<a href="mailto:' . $email . '">' .$email . '</a>'; 
    echo '</div>';
    echo '</div>';
    echo '<div class="contact-details-single-item">';
    echo '<div class="contact-details-icon">';
    echo '<i class="fa fa-map-marker"></i>';
    echo '</div>';
    echo '<div class="contact-details-content contact-phone">';
    echo '<span>' . $address . '</span>';
    echo '</div>';
    echo '</div>';
    echo '<div class="contact-social">';
    echo '<h4>Segue-nos</h4>';
    echo '<ul>';
    echo '<li><a href="' . $face . '"><i class="fa fa-facebook"></i></a></li>';
    echo '<li><a href="' . $twitter . '"><i class="fa fa-twitter"></i></a></li>';
    echo '<li><a href="' . $insta . '"><i class="fa fa-instagram"></i></a></li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
        echo '<strong>Hey!</strong> ' . $_SESSION['status'];
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<br>';
    
        unset($_SESSION['status']);
    }
    
    echo '<div class="col-lg-8">';
    echo '<div class="contact-form section-top-gap-100" data-aos="fade-up" data-aos-delay="200">';
    echo '<h3>SINTA-SE À VONTADE PARA NOS DEIXAR UMA MENSAGEM</h3>';
    echo '<form class="contact-form" action="./pages/processos/enviarmsgm.php" method="post">';
    echo '<div class="row">';
    echo '<div class="col-lg-6">';
    echo '<div class="default-form-box mb-20">';
    echo '<label for="contact-name">Nome Completo</label>';
    if (isset($_SESSION['user'])) {
        // Obtém os dados do cliente logado
        $nomeCliente = $_SESSION['user']['primeiro_nome'] . ' ' . $_SESSION['user']['ultimo_nome'];
        echo '<input name="nome" type="text" class="contact-name" autocomplete="off" value="' . $nomeCliente . '" readonly>';
    } else {
        // Caso o cliente não esteja logado, deixa o campo vazio
        echo '<input name="nome" type="text" class="contact-name" autocomplete="off">';
    }
    echo '</div>';
    echo '</div>';
    echo '<div class="col-lg-6">';
    echo '<div class="default-form-box mb-20">';
    echo '<label for="contact-email">Email</label>';
    if (isset($_SESSION['user'])) {
        // Obtém os dados do cliente logado
        $emailCliente = $_SESSION['user']['email'];
        echo '<input name="email" type="email" class="contact-email" autocomplete="off" value="' . $emailCliente . '" readonly>';
    } else {
        // Caso o cliente não esteja logado, deixa o campo vazio
        echo '<input name="email" type="email" class="contact-email" autocomplete="off">';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    
    echo '<div class="col-lg-12">';
    echo '<div class="default-form-box mb-20">';
    echo '<label for="contact-subject">Assunto</label>';
    echo '<input name="assunto" type="text" class="contact-subject" autocomplete="off">';
    echo '</div>';
    echo '</div>';
    echo '<div class="col-lg-12">';
    echo '<div class="default-form-box mb-20">';
    echo '<label for="contact-message">Sua Mensagem</label>';
    echo '<textarea name="mensagem" class="contact-message" cols="30" rows="10"></textarea>';
    echo '</div>';
    echo '</div>';
    echo '<div class="col-lg-12">';
    echo '<button class="btn btn-lg btn-black-default-hover" name="btn_enviar" type="submit">Enviar</button>';
    echo '</div>';
    echo '<p class="form-messege"></p>';
    echo '</div>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Nenhuma informação encontrada.";
}
?>
