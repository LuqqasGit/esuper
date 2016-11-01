<?php
  $title = "eSUPER - My Account";
  require_once("soporte.php");
  require_once("header.php");
?>

<div class="main-container-bg-site">
  <div class="main-container">
    <div class="profile-main-container">
      <h1 class="title">Bienvenido <?php echo $loggedUser->getUsername(); ?></h1>
      <div style="width: 100%; max-width: 400px; margin: auto;">
        <img style="" class="acc-profile-pic" <?php echo "src=\"" . $loggedUser->getAvatar() . "\"" ?> alt="profile picture">
        <form action="uploadImage.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <label for="name">Cambiar Avatar</label>
            <input type="file" name="img" id="img">
            <input type="submit">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once("footer.php"); ?>
