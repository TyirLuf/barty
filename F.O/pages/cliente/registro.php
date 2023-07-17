<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6">
        <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
            <br>
            <h3>Register</h3>
            <form id="cad-cliente" action="./pages/processos/processar_registro.php" method="POST">
                <span id="msgAlertErroCad"></span>
                <div class="input-radio">
                    <span class="custom-radio"><input type="radio" value="1" name="genero"> Masculino.</span>
                    <span class="custom-radio"><input type="radio" value="2" name="genero"> Femenino.</span>
                </div>
                <br>
                <div class="form-group">
                    <div class="default-form-box">
                        <label>Primeiro Nome<span>*</span></label>
                        <input type="text" name="pri_nome" required>
                    </div>
                    <div class="default-form-box">
                        <label>Último Nome<span>*</span></label>
                        <input type="text" name="ult_nome" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="default-form-box">
                        <label>Nome de Utilizador<span>*</span></label>
                       <input type="text" name="username" required>
                    </div>
                    <div class="default-form-box">
                        <label>Data de Nascimento<span>*</span></label>
                        <input type="date" name="data_nasc" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="default-form-box">
                        <label>Email<span>*</span></label>
                        <input type="text" name="email" required>
                    </div>
                    <div class="default-form-box">
                        <label>NIF</label>
                        <input type="number" name="nif">
                    </div>
                </div>

                <div class="form-group">
                    <div class="default-form-box">
                        <label>Palavra-Passe<span>*</span></label>
                        <input type="password" name="pass" required>
                    </div>
                    <div class="default-form-box">
                        <label>Confirmar Palavra-Passe<span>*</span></label>
                        <input type="password" name="confir_pass" required>
                    </div>
                </div>

                <div class="login_submit">
                    <button class="btn btn-md btn-black-default-hover" type="submit" id="cad-cliente-btn" name="entrar">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!--register area end-->
</div>