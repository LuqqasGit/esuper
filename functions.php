<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function validarUsuario(){
  $validArray = [
    "fnameerror" => "signup-validate-div-hidden",
    "lnameerror" => "signup-validate-div-hidden",
    "emailerror" => "signup-validate-div-hidden",
    "usererror" => "signup-validate-div-hidden",
    "passerror1" => "signup-validate-div-hidden",
    "passerror2" => "signup-validate-div-hidden",
  ];
  if ($_POST) {
    if (!trim($_POST["fname"])) {
      $validArray["fnameerror"] = "signup-validate-div";
    }
    if (!trim($_POST["lname"])) {
      $validArray["lnameerror"] = "signup-validate-div";
    }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $validArray["emailerror"] = "signup-validate-div";
    }
    if (!trim($_POST["username"])) {
      $validArray["usererror"] = "signup-validate-div";

    }
    if(!preg_match('/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[\d])\S*$/', $_POST["password1"])) {
      $validArray["passerror1"] = "signup-validate-div";
    }
    if(!preg_match('/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[\d])\S*$/', $_POST["password2"])) {
      $validArray["passerror2"] = "signup-validate-div";
    }else{
      if ($_POST["password1"] != $_POST["password2"]) {
      $validArray["passerror2"] = "signup-validate-div";
      }
    }
    return $validArray;
  }
  return $validArray;
}

function addUser($json, $jsonUserPost){
  $handle = fopen("$json", "a+");
  $addUser = fwrite($handle, $jsonUserPost);
  fclose($handle);
}
 ?>
