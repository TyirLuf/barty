
<!-- ...::::Start Map Section:::... -->
<div class="map-section" data-aos="fade-up" data-aos-delay="0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3005.6125828840522!2d-8.612739489349014!3d41.12115141234908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2464d37c6fd5e3%3A0x949db42f6a9ff2f0!2sR.%20de%20Soares%20dos%20Reis%20191%2C%204430-999%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-PT!2spt!4v1686680835932!5m2!1spt-PT!2spt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
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
                    <div class="contact-details">
                        <!-- Start Contact Details Single Item -->
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

                    </div>
                    <!-- Start Contact Social Link -->
                    <div class="contact-social">
                        <h4>Follow Us</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div> <!-- End Contact Social Link -->
                </div> <!-- End Contact Details -->
            </div>
            <div class="col-lg-8">
                <div class="contact-form section-top-gap-100" data-aos="fade-up" data-aos-delay="200">
                    <h3>SINTA-SE À VONTADE PARA NOS DEIXAR UMA MENSAGEM</h3>
                    <form id="contact-form" action="./?p=15" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="default-form-box mb-20">
                                    <label for="contact-name">Name</label>
                                    <input name="nome" type="text" id="contact-name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box mb-20">
                                    <label for="contact-email">Email</label>
                                    <input name="email" type="email" id="contact-email" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="default-form-box mb-20">
                                    <label for="contact-subject">Subject</label>
                                    <input name="assunto" type="text" id="contact-subject" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="default-form-box mb-20">
                                    <label for="contact-message">Your Message</label>
                                    <textarea name="mensagem" id="contact-message" cols="30" rows="10"></textarea>
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
<!-- ...::::ENd Contact Section:::... -->