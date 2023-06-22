<!-- ...::::Start Map Section:::... -->
<div class="map-section" data-aos="fade-up" data-aos-delay="0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mapouter">
                    <?php
                    $sql = "SELECT loc FROM empresa WHERE id = 1";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        // Exibir o valor da coluna 'loc' em um elemento <div>
                        $row = mysqli_fetch_assoc($result);
                        echo '<div class="gmap_canvas">' . $row['loc'] . '</div>';
                    } else {
                        echo "Nenhum resultado encontrado.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...::::End  Map Section:::... -->

<!-- ...::::Start Contact Section:::... -->
<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <!-- Start Contact Details -->
                <div class="contact-details-wrapper section-top-gap-100" data-aos="fade-up" data-aos-delay="0">
                    <?php
                    $sql = "SELECT telefone, email, endereco FROM empresa";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $phone = $row["telefone"];
                        $email = $row["email"];
                        $address = $row["endereco"];

                        // Exibindo as informações de contato
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
                        echo '<a href="mailto:' . $email . '">' . $email . '</a>';
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
                    } else {
                        echo "Nenhum dado de contato encontrado.";
                    }
                    ?>

                    <!-- Start Contact Social Link -->
                    <div class="contact-social">
                        <h4>Follow Us</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div> <!-- End Contact Social Link -->
                </div> <!-- End Contact Details -->
            </div>
            <div class="col-lg-8">
                <div class="contact-form section-top-gap-100" data-aos="fade-up" data-aos-delay="200">
                    <h3>Get In Touch</h3>
                    <form class="contact-form" action="./?p=15" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="default-form-box mb-20">
                                    <label for="contact-name">Name</label>
                                    <input name="nome" type="text" class="contact-name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box mb-20">
                                    <label for="contact-email">Email</label>
                                    <input name="email" type="email" class="contact-email" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="default-form-box mb-20">
                                    <label for="contact-subject">Subject</label>
                                    <input name="assunto" type="text" class="contact-subject" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="default-form-box mb-20">
                                    <label for="contact-message">Your Message</label>
                                    <textarea name="mensagem" class="contact-message" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-lg btn-black-default-hover" name="btn_enviar" type="submit">SEND</button>
                            </div>
                            <p class="form-messege"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>