<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

	require_once("classes/auth.php");
	require_once("classes/repositorioJSON.php");

	$tipoRepositorio = "json";

  $validArray = [
    "fnameerror" => "signup-validate-div-hidden",
    "lnameerror" => "signup-validate-div-hidden",
    "emailerror" => "signup-validate-div-hidden",
    "emailerror2" => "signup-validate-div-hidden",
    "usererror" => "signup-validate-div-hidden",
    "passerror1" => "signup-validate-div-hidden",
    "passerror2" => "signup-validate-div-hidden",
    "passworderror" => "signup-validate-div-hidden",
    "passworderror2" => "signup-validate-div-hidden",
    "avatarerror" => "signup-validate-div-hidden"
  ];

	switch($tipoRepositorio) {
		case "json":
			$repo = new RepositorioJSON();
			break;
	}

	$auth = Auth::getInstancia($repo->getRepositorioUsuarios());
  $loggedUser = $auth->traerUsuarioLogueado($repo->getRepositorioUsuarios());

?>
