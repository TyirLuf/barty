
<br>
<div class="customer-login">
    <div class="container">
        <div class="row justify-content-center"">
                <!--login area start-->
                <div class=" col-lg-6 col-md-6">
            <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                <h3>Login</h3>
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
                <form id="form_login"  action="./pages/processos/valida-login.php" method="POST">
                    <div class="default-form-box">
                        <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                        <input onkeyup="this.value=this.value.replace(/[' ' çÇáÁàÀéèÉÈíìÍÌóòÓÒúùÚÙñÑ~&´`^{}[º$()\']/g,'')" type="text" class="form-control sb-form-input" id="login_email" placeholder="E-mail" name="email">
                        <ion-icon name="mail-outline" id="icone_email">
                        </ion-icon>
                    </div>
                    <div class="default-form-box">
                        <input onkeyup="this.value=this.value.replace(/[' ']/g,'')" type="password" class="form-control sb-form-input" id="login_senha" placeholder="Sua senha" name="password">
                        <ion-icon name="lock-closed-outline" id="icone_senha"></ion-icon>
                    </div>
                    <div class="login_submit">
                        <button class="btn btn-md btn-black-default-hover mb-4" type="submit" name="entrar">login</button>
                        <a href="#">Lost your password?</a>
                        <a href="./?p=9">Registrar</a>
                    </div>
                </form>
            </div>
        </div>
        <!--login area start-->
    </div>
</div>
