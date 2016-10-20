<?php

	abstract class RepositorioUsuarios {
		abstract public function guardar(Usuario $usuario);
		abstract public function traerTodosLosUsuarios();

		public function existeElMail($email) {
	        $usuario = $this->traerUsuarioPorEmail($email);

	        if ($usuario) {
	            return true;
	        }

	        return false;
	  }

		public function existeElUsername($username) {
			$usuario = $this->traerUsuarioPorUsername($username);

			if ($usuario) {
					return true;
			}

			return false;
		}

		public function traerUsuarioPorEmail($email) {
	        //1: Me traigo todos los usuarios y ya opero con arrays
	        $usuarios = $this->traerTodosLosUsuarios();

	        //2: Los recorro y si alguno es el que busco, devuelvo
	        foreach($usuarios as $usuario)
	        {
	            if ($usuario->getEmail() == $email)
	            {
	                return $usuario;
	            }
	        }

	      return false;
	  }

		public function traerUsuarioPorUsername($username) {
	        //1: Me traigo todos los usuarios y ya opero con arrays
	        $usuarios = $this->traerTodosLosUsuarios();

	        //2: Los recorro y si alguno es el que busco, devuelvo
	        foreach($usuarios as $usuario)
	        {
	            if ($usuario->getUsername() == $username)
	            {
	                return $usuario;
	            }
	        }

	      return false;
	  }
	}