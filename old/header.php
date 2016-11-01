<?php
require_once("soporte.php");

$repoUsuarios = $repo->getRepositorioUsuarios();
$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

// if ($usuarioLogueado) {
//   $imagenPerfil = $usuarioLogueado->getAvatar();
// }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="js/script.js"></script>
  </head>
  <body>
    <div class="wrapper">

    <header class="main-header">
      <a href="index.php"><img src="img/logo.png" alt="logo"></a>
      <div class="toggle-nav-div">
        <button class="toggle-nav" id="toggle-nav-button">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
      </div>
      <div style="clear:both"></div>
      <nav class="main-nav">
        <ul id="nav-div">
          <a href="index.php"><li>Home</li></a>
          <a href="faq.php"><li>Faq</li></a>
          <a href="login.php" <?php if($auth->estaLogueado()) { echo "style=\"display:none\""; }; ?>><li>Log in</li></a>
          <a href="signup.php" <?php if($auth->estaLogueado()) { echo "style=\"display:none\""; }; ?>><li>Sign up</li></a>
          <a href="profile.php" <?php if(!$auth->estaLogueado()) { echo "style=\"display:none\""; }; ?>><li>My Account</li></a>
          <a href="logout.php" <?php if(!$auth->estaLogueado()) { echo "style=\"display:none\""; }; ?>><li>Logout</li></a>
        </ul>
      </nav>
    </header>
