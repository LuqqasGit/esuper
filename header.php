<?php
require_once("functions.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <nav class="main-nav">
        <a class="toggle-nav" id="toggle-nav-button">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </a>
        <ul id="nav-div">
          <a href="index.php"><li>Home</li></a>
          <a href="faq2.php"><li>Faq</li></a>
          <a href="login.php"><li>Log in</li></a>
          <a href="signup.php"><li>Sign up</li></a>
        </ul>
      </nav>
    </header>
