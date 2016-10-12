<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorUsuario extends Validador {
		
		public function validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$validArray = [
		    "fnameerror" => "signup-validate-div-hidden",
		    "lnameerror" => "signup-validate-div-hidden",
		    "emailerror" => "signup-validate-div-hidden",
		    "emailerror2" => "signup-validate-div-hidden",
		    "usererror" => "signup-validate-div-hidden",
		    "passerror1" => "signup-validate-div-hidden",
		    "passerror2" => "signup-validate-div-hidden",
		    "avatarerror" => "signup-validate-div-hidden"
		  ];

					if (!trim($datos["fname"])) {
						$validArray["fnameerror"] = "signup-validate-div";
	        }

					if (!trim($datos["lname"])) {
						$validArray["lnameerror"] = "signup-validate-div";
	        }

					if (empty(trim($datos["email"]))) {
	            $validArray["email"] = "Por favor ingrese mail";
	        }
					// if (empty(trim($datos["email"])))
	        // {
	        //     $errores["email"] = "Por favor ingrese mail";
	        // }
	        // elseif (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
	        //     $errores["email"] = "Por favor ingrese un mail correcto";
	        // }
	        // elseif ($repoUsuarios->existeElMail($datos["email"]))
	        // {
	        //     $errores["email"] = "El email ya esta registrado";
	        // }

					if (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
			      $validArray["emailerror"] = "signup-validate-div";
			    }

					if ($repoUsuarios->existeElMail($datos["email"])) {
			      $validArray["emailerror2"] = "signup-validate-div";
			    }

	        // if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
					// 	$validArray["avatarerror"] = "signup-validate-div";
	        // }

	        return $validArray;
		}
	}

	?>
