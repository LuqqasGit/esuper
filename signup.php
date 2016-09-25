<?php
$title = "eSUPER - Signup";
require_once("header.php");
$validArray = validarUsuario();
$camposValue = [
  "fnamevalue" => "",
  "lnamevalue" => "",
  "emailvalue" => "",
  "uservalue" => "",
];
if ($_POST) {
  if ($validArray["fnameerror"] == "signup-validate-div-hidden") {
    $camposValue["fnamevalue"] = "$_POST[fname]";
  }
  if ($validArray["lnameerror"] == "signup-validate-div-hidden") {
    $camposValue["lnamevalue"] = "$_POST[lname]";
  }
  if ($validArray["emailerror"] == "signup-validate-div-hidden") {
    $camposValue["emailvalue"] = "$_POST[email]";
  }
  if ($validArray["usererror"] == "signup-validate-div-hidden") {
    $camposValue["uservalue"] = "$_POST[username]";
  }

$errores = 0;
foreach ($validArray as $key => $value) {
  if ($value == "signup-validate-div") {
    $errores++;
    continue;
  }
}
if (!$errores) {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $userPassHash = password_hash($_POST["password1"], PASSWORD_DEFAULT);
  $userID = 1;

  $json = "usuarios.json";
  $getJSON = file_get_contents($json);
  $usuariosJSON = explode("\n", $getJSON);
  $userID = count($usuariosJSON);

  $jsonReadDH = "https://sprint.digitalhouse.com/getUsuarios";
  $getJSONDH = file_get_contents($jsonReadDH);
  $usuariosJSONDH = json_decode($getJSONDH, true);
  $userIDH = $usuariosJSONDH["cantidad"]+1;

  $arrayUser = [];
  $arrayUser += ["id" => $userID, "email" => $email, "fname" => $fname, "lname" => $fname, "username" => $username, "password" => $userPassHash];
  $jsonUserPost = json_encode($arrayUser)."\n";
  addUser($json,$jsonUserPost);
  $jsonWriteDH = "https://sprint.digitalhouse.com/nuevoUsuario";
  fopen($jsonWriteDH, "r");
?>
<script>
window.location.replace("success.php?fname=<?=$fname?>&lname=<?=$lname?>&email=<?=$email?>&userID=<?=$userID?>&userIDH=<?=$userIDH?>");
</script>
<?}
}?>
      <div class="main-container-bg-site">
        <div class="main-container">
          <div class="signup-main-container">

            <div class="signup-text-box">
              <h1 class="signup-title">Regístrate en eSuper</h1>
              <h2 class="signup-subtitle">Supermercado desde la comodidad de tu casa.</h2>
            </div>

            <div class="signup-box">
              <div class="social-signup">
                <div class="signup-fb"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></div>
                <div class="signup-ggl"><i class="fa fa-google fa-2x" aria-hidden="true"></i></div>
                <!-- <div class="signup-lnk"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></div> -->
              </div>

              <div class="signup-line"><span>ó</span></div>

              <form class="signup-form" id="signup" method="post">
                <fieldset>
                  <ul>
                    <li>
                      <input autocomplete="off" type="email" name="email" placeholder="Ingresa tu correo electrónico" value="<?=$camposValue["emailvalue"]?>">
                    </li>
                    <div id="email-validate-div" class="<?=$validArray["emailerror"]?>"><p>Ingresa un correo electrónico válido.</p></div>
                    <li>
                      <input autocomplete="off" type="text" name="fname" placeholder="Ingresa tu nombre" value="<?=$camposValue["fnamevalue"]?>">
                    </li>
                    <div id="fname-validate-div" class="<?=$validArray["fnameerror"]?>"><p>Ingresa un nombre válido.</p></div>
                    <li>
                      <input autocomplete="off" type="text" name="lname" placeholder="Ingresa tu apellido" value="<?=$camposValue["lnamevalue"]?>">
                    </li>
                    <div id="lname-validate-div" class="<?=$validArray["lnameerror"]?>"><p>Ingresa un apellido válido.</p></div>
                    <li>
                      <input autocomplete="off" type="text" name="username" placeholder="Crea un usuario" value="<?=$camposValue["uservalue"]?>">
                    </li>
                    <div id="uname-validate-div" class="<?=$validArray["usererror"]?>"><p>Ingresa un nombre de usuario válido.</p></div>
                    <li>
                      <input type="password" name="password1" placeholder="Crea una contraseña">
                    </li>
                    <div id="pass-validate-div" class="<?=$validArray["passerror1"]?>"><p>Ingresa una contraseña con un mínimo de 6 caracteres, conteniendo uno o más números.</p></div>
                    <li>
                      <input type="password" name="password2" placeholder="Repite la contraseña">
                    </li>
                    <div id="pass2-validate-div" class="<?=$validArray["passerror2"]?>"><p>Las contraseñas no coinciden.</p></div>
                  </ul>
                </fieldset>
                <button type="submit" class="signup-submit" name="submit">Continuar</button>
              </form>


              <div class="signup-footer">
                  <p>¿Ya estás registrado? <a class="signup-link" href="login.php">Ingresa aquí</a> »</p>
              </div>

            </div> <!-- end signup-box -->

          </div> <!-- end signup-main-container -->
        </div> <!-- end main-container -->
      </div>

<?php
require_once("footer.php");
?>
