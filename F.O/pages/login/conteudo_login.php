<?php


$conn = mysqli_connect("localhost","root","", "barty_teste");

if(isset($_POST['entrar'])){
    
    if(empty($_POST['email']) || empty($_POST['senha'])){
        require_once "./pages/login/alert_login_vazio.php";
        exit();
    }else{
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        $query = " SELECT * FROM clientes WHERE email = '$email' and password = '$password' ";

        $result = mysqli_query($conn, $query);

        $dadosUsuario = mysqli_fetch_assoc($result);

        $row = mysqli_num_rows($result);

        if($row == 1){
            $_SESSION = $dadosUsuario;
            header("Location: ./");
            exit();
        }
    }
}

?>



<div class="customer-login">
        <div class="container">
            <div class="row justify-content-center"">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>login</h3>
                        <form id="form_login"     method="POST">
                            <div class="default-form-box">
                        
                                <!-- O atributo onkeyup juntamente com a expressão regular impede que o espaços sejam digitados neste campo -->
                                <input 
                                    onkeyup="this.value=this.value.replace(/[' ' çÇáÁàÀéèÉÈíìÍÌóòÓÒúùÚÙñÑ~&´`^{}[º$()\']/g,'')" 
                                    type="text" 
                                    class="form-control sb-form-input" 
                                    id="login_email" 
                                    placeholder="E-mail"
                                    name="email"
                                >
                                <ion-icon name="mail-outline" id="icone_email">
                                </ion-icon>
                          
                            </div>
                            <div class="default-form-box">
                            <input 
                                    onkeyup="this.value=this.value.replace(/[' ']/g,'')" type="password" 
                                    class="form-control sb-form-input" 
                                    id="login_senha" 
                                    placeholder="Sua senha"
                                    name="password"
                                >
                                <ion-icon name="lock-closed-outline" id="icone_senha"></ion-icon>
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit" name="Entrar">login</button>
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
    </div> <!-- ...:::: End Customer Login Section :::... -->
