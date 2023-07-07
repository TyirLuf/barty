<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6">
        <br>
        <h3>Detalhes da conta</h3>
        <div class="login">
            <div class="login_form_container">
                <div class="account_login_form">
                    <form action="./pages/login/processa_perfil.php" method="post">
                        <br>
                        <div class="input-radio">
                            <span class="custom-radio">
                                <input type="radio" value="1" name="genero" <?php if ($user['genero'] == 'Masculino') echo 'checked'; ?>> Masculino
                            </span>
                            <span class="custom-radio">
                                <input type="radio" value="2" name="genero" <?php if ($user['genero'] == 'Feminino') echo 'checked'; ?>> Feminino
                            </span>
                        </div>
                        <br>
                        <div class="default-form-box mb-20">
                            <label>Primeiro Nome</label>
                            <input type="text" name="first-name" value="<?php echo $user['primeiro_nome']; ?>">
                        </div>
                        <div class="default-form-box mb-20">
                            <label>Último Nome</label>
                            <input type="text" name="last-name" value="<?php echo $user['ultimo_nome']; ?>">
                        </div>
                        <div class="default-form-box mb-20">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php echo $user['username']; ?>">
                        </div>
                        <div class="default-form-box mb-20">
                            <label>Email</label>
                            <input type="email" name="email-name" value="<?php echo $user['email']; ?>" readonly>
                        </div>
                        <div class="default-form-box mb-20">
                            <label>Telefone</label>
                            <input type="number" name="telefone" value="<?php echo $user['telefone']; ?>">
                        </div>
                        <div class="default-form-box mb-20">
                            <label>Palavra Passe</label>
                            <input type="password" name="password">
                        </div>
                        <div class="default-form-box mb-20">
                            <label>Confirmar Palavra Passe</label>
                            <input type="password" name="confir_pass">
                        </div>
                        <div class="default-form-box mb-20">
                            <label>Nif</label>
                            <input type="number" name="nif" value="<?php echo $user['nif']; ?>">
                        </div>
                        <div class="default-form-box mb-20">
                            <label>Data de Nascimento</label>
                            <input type="date" name="birthday" value="<?php echo $user['data_nascimento']; ?>">
                        </div>
                        <span class="example">
                            (E.g.: 05/31/1970)
                        </span>
                        <div class="save_button mt-3">
                            <button class="btn btn-md btn-black-default-hover mr-5" type="submit">Salvar</button>
                            <a href="./" class="btn btn-md btn-black-default-hover">Cancelar</a>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>