
  <?php 
      if (isset($_SESSION['sucess'])) {
        
        
        require_once "./conteudo/registro/sucesso_barber.php";
        unset($_SESSION['sucess']);
     }
    ?>

    <div id="root">
        <?php require_once "./pages/login/conteudo_login.php"; ?>
    </div>
