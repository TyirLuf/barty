  <?php
  if (isset($_SESSION['sucess'])) {
    require_once "./pages/registro/sucesso_barber.php";
    unset($_SESSION['sucess']);
  }
  ?>
  <?php require_once "./pages/login/conteudo_login.php"; ?>

