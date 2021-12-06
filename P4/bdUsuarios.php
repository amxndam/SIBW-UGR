<?php
	
	class BdUsuarios{
		public $mysqli;
		
		function __construct() {
	      $this->mysqli = new mysqli("mysql", "amanda", "amanda", "SIBW");
	      
	      if ($this->mysqli->connect_errno)
	        echo ("Error: " . $this->mysqli->connect_error);
	      

		}


		function getMysqli(){
			return $this->mysqli;
		}

		function registrar($nombre, $password, $email){

			if(strlen($password) < 3 && $this->existeUsuario($nombre)){
				return false;
			}

		    $hash = password_hash($password,PASSWORD_DEFAULT);

		    $sql = "INSERT INTO USUARIO(nombre,password,email,tipo) VALUES ('$nombre','$hash','$email','registrado') ";
		    
			mysqli_query($this->mysqli, $sql);

			mysqli_close($this->mysqli);

			return true;
		}



		function getUsuario($user) {

		    $stmt = $this->mysqli->prepare("SELECT * from USUARIO where nombre=?");
		    $stmt->bind_param("s", $user);
		    $stmt->execute();


		    $resultado = $stmt->get_result();
		    $usuario = array();
		    while($res = $resultado->fetch_assoc()) {
		      $usuario = $res;
		    }
		    return $usuario;
		}

		function existeUsuario ($user){
			$usuario = $this->getUsuario($user);
			
			if($usuario != null)
				return true;

			return false;
		}

		function checkLogin($user, $pass){

			$usuario = array();
		    $usuario = $this->getUsuario($user);
		    $hash = $usuario['password'];
		    $hash = substr( $hash, 0, 60 );

		    $password = '/f)1c(-JG';
			$hash = password_hash($password, PASSWORD_DEFAULT, array("cost" => 10));

		    if (password_verify($password, $hash)){
		        return true;
			}
		    return false;

		  }

		 function getPassword($user){
		 	$usuario = array();
		    $usuario = $this->getUsuario($user);
		    return $usuario['password'];
		    
		}

		function modificarNombre($nombre, $nombreNuevo){

		    $sql = "UPDATE USUARIO set nombre='$nombreNuevo' where nombre='$nombre'";
		    
		    mysqli_query($this->mysqli, $sql);
	
		}

		function modificarPass($nombre, $passwordNueva){

		    $passwordNuevaHash=password_hash($passwordNueva,PASSWORD_DEFAULT);

		    $sql = "UPDATE USUARIO set password='$passwordNuevaHash' where nombre='$nombre'";
		    
		    mysqli_query($this->mysqli, $sql);

		} 

		function modificarEmail($nombre, $emailNuevo){

		    $sql = "UPDATE USUARIO set email='$emailNuevo' where nombre='$nombre'";
		    
		    mysqli_query($this->mysqli, $sql);

			
		}

		function cerrarConexion(){

	  	mysqli_close($this->mysqli);
		   
		
	  }

		function getUsuarios(){

	  	 //se obtienen todos los usuarios de la tabla
	    $usu_tabla = $this->mysqli->query('SELECT * FROM USUARIO');

	    $usuarios = array();

	    //se introducen en el array
	    while($usu_tabla2 = $usu_tabla->fetch_assoc())
	        $usuarios[] = $usu_tabla2;
	    
	    return $usuarios;

	  }




	  function editarTipoUsu($superuser, $nombre,$nuevoTipo){


	  	if($superuser == $nombre)
	  			return false;
	  	
	  	else{	

		  	$sql = "UPDATE USUARIO set tipo='$nuevoTipo' where nombre='$nombre'";
			    
			mysqli_query($this->mysqli, $sql);
			mysqli_close($this->mysqli);

		}

		return true;

	 }




}


?>