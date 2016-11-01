<?php
  // var_dump($_FILES);exit;
  require_once("soporte.php");
  $loggedUser->setAvatar($_FILES["img"]);
  header("Location: profile.php");

?>
