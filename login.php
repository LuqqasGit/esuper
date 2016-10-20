<?php
$title = "eSUPER - Login";
require_once("soporte.php");
require_once("classes/validadorLogin.php");

if ($auth->estaLogueado()) {
  header("Location:index.php");exit;
}

if ($_POST) {
  $validador = new ValidadorLogin();
  $validArray = $validador->validar($_POST, $repo);

  if ($validArray["emailerror"] == "signup-validate-div-hidden" &&  $validArray["emailerror2"] == "signup-validate-div-hidden" && $validArray["passworderror"] == "signup-validate-div-hidden" && $validArray["passworderror2"] == "signup-validate-div-hidden")
  {
    $usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorEmail($_POST["email"]);
    $auth->loguear($usuario);
    if ($validador->estaEnFormulario("session")) {
      $auth->guardarCookie($usuario);
    }
    header("Location:index.php");exit;
  }
}

require_once("header.php");
?>

    <div class="main-container-bg-site">
      <div class="main-container">
        <div class="signup-main-container">

          <div class="signup-text-box">
            <h1 class="title signup">Inicia sesión en eSuper</h1>
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
                    <input type="text" name="email" placeholder="Email">
                  </li>
                  <div class="<?=$validArray["emailerror"]?>"><p>Por favor ingresa un correo electrónico.</p></div>
                  <div class="<?=$validArray["emailerror2"]?>"><p>El correo electronico no existe.</p></div>
                  <li>
                    <input type="password" name="password" placeholder="Contraseña">
                  </li>
                  <div class="<?=$validArray["passworderror"]?>"><p>Por favor ingrese una contraseña.</p></div>
                  <div class="<?=$validArray["passworderror2"]?>"><p>Contraseña incorrecta.</p></div>
                </ul>
                <div class="login-menu">
                  <div class="login-remember">
                    <input type="checkbox" name="session" checked> <p>Recordarme</p>
                  </div>
                  <div class="login-forgot">
                    <p><a class="signup-link" href="forgot.php">¿Olvidaste tu contraseña?</a></p>
                  </div>
                </div>
              </fieldset>
              <button type="submit" class="signup-submit" name="submit">Continuar</button>
            </form>

            <div class="signup-footer">
                <p>¿No tenés cuenta? <a class="signup-link" href="signup.php">Registrate aquí</a> »</p>
            </div>
          </div> <!-- end signup-box -->
        </div> <!-- end signup-main-container -->
      </div>
    </div>

<?php
require_once("footer.php");
?>
