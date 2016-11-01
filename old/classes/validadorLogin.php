<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorLogin extends Validador {
		public function Validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$validArray = [
		    "emailerror" => "signup-validate-div-hidden",
		    "emailerror2" => "signup-validate-div-hidden",
		    "passworderror" => "signup-validate-div-hidden",
		    "passworderror2" => "signup-validate-div-hidden",
		    "errorvalidate" => 0,
		  ];

	        if (empty(trim($datos["email"]))) {
						$validArray["emailerror"] = "signup-validate-div";
						$validArray["errorvalidate"] = 1;
	        }
	        if (empty(trim($datos["password"]))) {
	          $validArray["passworderror"] = "signup-validate-div";
						$validArray["errorvalidate"] = 1;
	        }
	        if (!$repoUsuarios->existeElMail($datos["email"])) {
	          $validArray["emailerror2"] = "signup-validate-div";
						$validArray["errorvalidate"] = 1;
	        } else {
	            $usuario = $repoUsuarios->traerUsuarioPorEmail($datos["email"]);

	            if (!password_verify($datos["password"], $usuario->getPassword())) {
								$validArray["passworderror2"] = "signup-validate-div";
								$validArray["errorvalidate"] = 1;
	            }
	        }

	        return $validArray;
		}
	}
