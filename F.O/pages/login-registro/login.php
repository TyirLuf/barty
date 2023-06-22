
<?php


$u = new User();

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
              <button class="btn btn-md btn-black-default-hover mb-4" type="submit" value="ACESSAR">login</button>
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



      <?php

      if (isset($_POST['email'])) :

        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['password']);
        if (!empty($email) && !empty($senha)) :

          $u->conn("barty_teste", "localhost", "root", "");

          if ($u->msgERRO == "") :

            if ($u->logar($email, $senha)) :

              header("location: ./");


            else :

      ?>

              <div class="msg-erro">
                E-mail e/ou Senha Incorretos!
              </div>

            <?php

            endif;

          else :

            ?>

            <div class="msg-erro">

              <?php echo "Erro: " . $u->msgERRO; ?>

            </div>

          <?php



          endif;

        else :

          ?>

          <div class="msg-erro">
            Preencha Todos os Campos!
          </div>

      <?php




        endif;


      endif;



      ?>