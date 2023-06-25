<?php 
       if(!isset($_SESSION)) 
       { 
           session_start(); 
       } ?>

    <?php


$conn = mysqli_connect("localhost","root","", "barty_teste");

if(isset($_POST['entrar'])){
    
    if(empty($_POST['email']) || empty($_POST['password'])){
        echo "
        <script>

                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha todos os campos antes de prosseguir.'
                })

                </script>";
    }else{
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $senha = mysqli_real_escape_string($conn, $_POST['password']);
        $query = " SELECT * FROM clientes WHERE email = '$email' and password = '$senha' ";

        $result = mysqli_query($conn, $query);

        $dadosUsuario = mysqli_fetch_assoc($result);

        $row = mysqli_num_rows($result);

        if($row == 1){
            $_SESSION = $dadosUsuario;
                 echo "

        <script>
        
        Swal.fire({
          icon: 'success',
          title: 'Parabéns',
          text: 'Seu login foi realizado com sucesso!'
        }).then(function() {
            window.location = './';
        });
        
        </script>";
        }else{
             echo "
             <script>

             Swal.fire({
               icon: 'error',
               title: 'Oops...',
               text: 'Usuário ou senha inválidos.'
             })
             
             </script>";
            }
        }
    }
?>


<!-- ...:::: Start Customer Login Section :::... -->
<div class="customer-login">
  <div class="container">
    <div class="row justify-content-center">
      <!--login area start-->
      <div class="col-lg-6 col-md-6">
        <div class="account_form" data-aos="fade-up" data-aos-delay="0">
          <h3>login</h3>
          <form method="POST">
            <div class="default-form-box">
              <label>Username or email <span>*</span></label>
              <input type="text" name="email">
            </div>
            <div class="default-form-box">
              <label>Passwords <span>*</span></label>
              <input type="password" name="password" >
            </div>
            <div class="login_submit">
              <button class="btn btn-md btn-black-default-hover mb-4" type="submit" name="entrar">login</button>
              <label class="checkbox-default mb-4" for="offer">
                <input type="checkbox" id="offer">
                <span>Remember me</span>
              </label>
              <a href="#">Lost your password?</a>

            </div>
          </form>
        </div>
      </div>
      <!--login area start-->
