<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6">
        <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
            <h3>Register</h3>
            <form id="cad-usuario-form" action="./pages/login/processar_registro.php" method="POST">
            <span id="msgAlertErroCad"></span>
                <div class="default-form-box">
                    <label>Primeiro Nome<span>*</span></label>
                    <input type="text" name="pri_nome"  required>
                </div>
                <div class="default-form-box">
                    <label>Ultimo Nome<span>*</span></label>
                    <input type="text" name="ult_nome"  required>
                </div>
                <div class="default-form-box">
                    <label>Email<span>*</span></label>
                    <input type="text" name="email"  required>
                </div>
                <div class="default-form-box">
                    <label>Password<span>*</span></label>
                    <input type="password" name="pass"  required>
                </div>
                <div class="login_submit">
                    <button class="btn btn-md btn-black-default-hover" type="submit" id="cad-usuario-btn" name="entrar">Register</button>
                </div>
            </id=>
        </div>
    </div>
    <!--register area end-->
</div>
