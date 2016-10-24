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
		    "avatarerror" => "signup-validate-div-hidden",
				"errorvalidate" => 0
		  ];

					if (!trim($datos["fname"])) {
						$validArray["fnameerror"] = "signup-validate-div";
						$validArray["errorvalidate"] = 1;
	        }

					if (!trim($datos["lname"])) {
						$validArray["lnameerror"] = "signup-validate-div";
						$validArray["errorvalidate"] = 1;
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
						$validArray["errorvalidate"] = 1;
			    }

					if ($repoUsuarios->existeElMail($datos["email"])) {
			      $validArray["emailerror2"] = "signup-validate-div";
						$validArray["errorvalidate"] = 1;
			    }

					// if(!preg_match('/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[\d])\S*$/', $_POST["password1"])) {
			    //   $validArray["passerror1"] = "signup-validate-div";
			    // }
			    // if(!preg_match('/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[\d])\S*$/', $_POST["password2"])) {
			    //   $validArray["passerror2"] = "signup-validate-div";
			    // }else{
			    //   if ($_POST["password1"] != $_POST["password2"]) {
			    //   $validArray["passerror2"] = "signup-validate-div";
			    //   }
			    // }

	        // if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
					// 	$validArray["avatarerror"] = "signup-validate-div";
	        // }

	        return $validArray;
		}
	}

	?>
