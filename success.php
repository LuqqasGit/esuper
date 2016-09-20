<?php
$title = "eSUPER - Success";
require_once("header.php");
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$email = $_GET["email"];
$userID = $_GET["userID"];
$userIDH = $_GET["userIDH"];
?>

      <div class="main-container-bg-site">
        <div class="main-container">
          <div class="signup-main-container">

            <div class="signup-text-box">
              <h1 class="signup-title">Regístrate en eSuper</h1>
              <h2 class="signup-subtitle">Supermercado desde la comodidad de tu casa.</h2>
            </div>

            <div class="signup-box" style="word-wrap: break-word">

              Gracias por registrarte, <?=$fname?> <?=$lname?>. Tu email es: <?=$email?>. <br><br>eSuper: Sos el usuario numero: <?=$userID?>. <br><br>DigitalHouse: Sos el usuario numero: <?=$userIDH?>

            </div> <!-- end signup-box -->

          </div> <!-- end signup-main-container -->
        </div> <!-- end main-container -->
      </div>

    <footer class="main-footer">
      <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
      <a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
      <a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
    </footer>
    <script src="https://use.fontawesome.com/2390ddd5c7.js"></script>
  </body>
</html>
