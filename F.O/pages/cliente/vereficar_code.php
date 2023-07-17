<form method="POST" action="./pages/processos/validarcodigo.php">

    <div class="coupon_area">
        <div class="container">
            <div class="row justify-content-center"> <!-- Adicionado a classe justify-content-center para centralizar -->
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code left" data-aos="fade-up" data-aos-delay="200">
                        <h3>Verificar Conta</h3>
                        <?php
                        if (isset($_SESSION['status'])) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <br>
                        <?php

                            unset($_SESSION['status']);
                        }
                        ?>
                        <div class="coupon_inner">
                            <p>Inserir o email e código de verificação.</p>
                            <input class="mb-2" name="email" placeholder="Email cadastrado" type="email" required>
                            <input class="mb-2" name="codigo" placeholder="Código de verificação" type="text" required>
                            <button type="submit" class="btn btn-md btn-golden" name="submit">Verificar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form><br>