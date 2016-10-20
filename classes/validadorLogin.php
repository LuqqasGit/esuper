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
		  ];

	        if (empty(trim($datos["email"]))) {
						$validArray["emailerror"] = "signup-validate-div";
	        }
	        if (empty(trim($datos["password"]))) {
	          $validArray["passworderror"] = "signup-validate-div";
	        }
	        if (!$repoUsuarios->existeElMail($datos["email"])) {
	          $validArray["emailerror2"] = "signup-validate-div";
	        } else {
	            $usuario = $repoUsuarios->traerUsuarioPorEmail($datos["email"]);

	            if (!password_verify($datos["password"], $usuario->getPassword())) {
								$validArray["passworderror2"] = "signup-validate-div";
	            }
	        }

	        return $validArray;
		}
	}
