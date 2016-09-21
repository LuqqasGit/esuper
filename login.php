<?php
$title = "eSUPER - Login";
require_once("header.php");
?>

    <div class="main-container-bg-site">
      <div class="main-container">
        <div class="signup-main-container">

          <div class="signup-text-box">
            <h1 class="signup-title">Inicia sesión en eSuper</h1>
          </div>

          <div class="signup-box">
            <div class="social-signup">
              <div class="signup-fb"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></div>
              <div class="signup-ggl"><i class="fa fa-google fa-2x" aria-hidden="true"></i></div>
              <!-- <div class="signup-lnk"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></div> -->
            </div>

            <div class="signup-line"><span>ó</span></div>

            <form class="signup-form" id="login" action="" method="post">
              <fieldset>
                <ul>
                  <li>
                    <input type="email" name="userlogin" placeholder="Correo electrónico / Usuario">
                  </li>
                  <div id="userlogin-validate-div" class="signup-validate-div-hidden"><p>Por favor ingresa un correo electrónico válido.</p></div>
                  <li>
                    <input type="password" name="password" placeholder="Contraseña">
                  </li>
                </ul>
                <div class="login-menu">
                  <div class="login-remember">
                    <input type="checkbox" name="session" checked> <p>Recordarme</p>
                  </div>
                  <div class="login-forgot">
                    <p><a class="signup-link" href="/forgot.php">¿Olvidaste tu contraseña?</a></p>
                  </div>
                </div>
              </fieldset>
              <button type="submit" class="signup-submit" name="submit">Continuar</button>
            </form>

            <div class="signup-footer">
                <p>¿No tenés cuenta? <a class="signup-link" href="/signup.php">Registrate aquí</a> »</p>
            </div>
          </div> <!-- end signup-box -->
        </div> <!-- end signup-main-container -->
      </div>
    </div>

<?php
require_once("footer.php");
?>
