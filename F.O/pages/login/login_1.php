<?php
//botão enviar
if(isset($_POST['btn-entrar'])):
    $erros = array();
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);
    // verificar se o campo usuário ou senha está vazio.
    if(empty($email) or empty($password)):
        $erros[] = "<li> O campo email/password precisa ser preenchido </li>";//array para armazenar erros
    else:
        $sql = "SELECT email FROM clientes  WHERE email = '$email'";
        $resultado = mysqli_query($conn, $sql);

        //verificar se o que veio da variável resultado é maior do que zero se sim o usuário existe no banco de dados

        if(mysqli_num_rows($resultado) > 0):
            $password = sha1($password);
            $sql = "SELECT * FROM clientes WHERE email = '$email' AND password = '$password'";
            $resultado = mysqli_query($conn, $sql);

            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($conn);
                $_SESSION['logado'] = true;
                $_SESSION['cliente_id'] = $dados['cliente_id'];
                header('Location:./');
            else:
                $erros[] = "<li>Email ou password inválido !! Tente Novamente.</li>";
            endif;
        else:
            $erros[] = "<li>Email não possui cadastro, clique abaixo para cadastrar !! </li>";
        endif;   

    endif;
endif;
?>

<div class="customer-login">
    <div class="container">
        <div class="row justify-content-center"">
                <!--login area start-->
                <div class=" col-lg-6 col-md-6">
            <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                <h3>Login</h3>
                <form id="form_login" method="POST">
                    <div class="default-form-box">
                        <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                        <input onkeyup="this.value=this.value.replace(/[' ' çÇáÁàÀéèÉÈíìÍÌóòÓÒúùÚÙñÑ~&´`^{}[º$()\']/g,'')" type="text" class="form-control sb-form-input" id="login_email" placeholder="E-mail" name="email">
                        <ion-icon name="mail-outline" id="icone_email">
                        </ion-icon>
                    </div>
                    <div class="default-form-box">
                        <input onkeyup="this.value=this.value.replace(/[' ']/g,'')" type="password" class="form-control sb-form-input" id="login_password" placeholder="Sua senha" name="password">
                        <ion-icon name="lock-closed-outline" id="icone_senha"></ion-icon>
                    </div>
                    <div class="login_submit">
                        <button class="btn btn-md btn-black-default-hover mb-4" type="submit" name="btn-entrar">login</button>
                        <label class="checkbox-default mb-4" for="offer">
                            <input type="checkbox" id="offer">
                            <span>Remember me</span>
                        </label>
                        <a href="#">Lost your password?</a>
                        <a href="#">Registrar</a>
                    </div>
                </form>
            </div>
        </div>
        <!--login area start-->
    </div>
</div>
