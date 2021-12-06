<?php
	
	class Bd{
		public $mysqli;

		function __construct() {
	      $this->mysqli = new mysqli("mysql", "amanda", "amanda", "SIBW");
	      
	      if ($this->mysqli->connect_errno)
	        echo ("Error: " . $this->mysqli->connect_error);
	      

		}

	  function getMysqli() {

	    
	    return $this->mysqli;
	  }		


	  function getEvento($idEv) {

	    $stmt = $this->mysqli->prepare('SELECT * FROM EVENTO WHERE id=?');
	    $stmt->bind_param("i", $idEv);
	    $stmt->execute();

	    $evento_tabla = $stmt->get_result();
	    $evento = array();

	    while($evento_tabla2 = $evento_tabla->fetch_assoc())
	      $evento[] = $evento_tabla2;
	    
	    return $evento[0];
			
	  }

	  function getEventos() {


	    //se obtienen todos los eventos de la tabla
	    $eventos_tabla = $this->mysqli->query('SELECT * FROM EVENTO');

	    $eventos = array();

	    //se introducen en el array
	    while($eventos_tabla2 = $eventos_tabla->fetch_assoc())
	        $eventos[] = $eventos_tabla2;
	    
	    return $eventos;
	  }



	  function getImagenes($idEv) {

	    $stmt = $this->mysqli->prepare('SELECT dir FROM IMAGEN WHERE evento=?');
	    $stmt->bind_param("i", $idEv);
	    $stmt->execute();

	    $img_tabla = $stmt->get_result();
	    $imagenes = array();

	    while($img_tabla2 = $img_tabla->fetch_assoc())
	      $imagenes[] = $img_tabla2;
	    
	    return $imagenes;
	  }

	  function getComment($idComment) {

	    $stmt = $this->mysqli->prepare('SELECT * FROM COMMENT WHERE id=?');
	    $stmt->bind_param("i", $idComment);
	    $stmt->execute();

	    $comment_tabla = $stmt->get_result();
	    $comment = array();

	    while($comment_tabla2 = $comment_tabla->fetch_assoc())
	      $comment[] = $comment_tabla2;
	    
	    return $comment[0];
	  }


	  function getComments($idEv) {

	    $stmt = $this->mysqli->prepare('SELECT * FROM COMMENT WHERE evento=?');
	    $stmt->bind_param("i", $idEv);
	    $stmt->execute();

	    $comment_tabla = $stmt->get_result();
	    $comentarios = array();

	    while($comment_tabla2 = $comment_tabla->fetch_assoc())
	      $comentarios[] = $comment_tabla2;
	    
	    return $comentarios;
	  }

	  function getCommentsTotal() {

	    $stmt = $this->mysqli->prepare('SELECT * FROM COMMENT');
	    $stmt->execute();

	    $comment_tabla = $stmt->get_result();
	    $comentarios = array();

	    if($comment_tabla->num_rows > 0){
	    	while($row = $comment_tabla->fetch_array()) 
				$comentarios[] = $row;
				
	    }

	    $stmt->close();
	    return $comentarios;
	  }


	  function editarComment($idComment,$comentarioNuevo){

	  	$comentario = '* Comentario editado por el moderador: *';
	  	$sql = "UPDATE COMMENT set comentario='$comentarioNuevo',modificado = 1 where id='$idComment'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		mysqli_close($this->mysqli);
	  }


	  function eliminarComentario($idComment){
	  	$sql = "DELETE FROM COMMENT where id='$idComment'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		mysqli_close($this->mysqli);

	  }


	  function editarNombreEv($idEv,$nuevoNombre){

	  	$sql = "UPDATE EVENTO set nombre='$nuevoNombre' where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		
	  }

	  function editarLugarEv($idEv,$nuevoLugar){

	  	$sql = "UPDATE EVENTO set lugar='$nuevoLugar' where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		
	  }


	  function editarFechaEv($idEv,$nuevaFecha){

	  	$sql = "UPDATE EVENTO set fecha='$nuevaFecha' where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		
	  }


	  function editarHoraEv($idEv,$nuevaHora){

	  	$sql = "UPDATE EVENTO set hora='$nuevaHora' where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		
	  }

	  function editarPrecioEv($idEv,$nuevoPrecio){

	  	$sql = "UPDATE EVENTO set precio='$nuevoPrecio' where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		
	  }

	  function editarEnlaceEv($idEv,$nuevoEnlace){

	  	$sql = "UPDATE EVENTO set enlace='$nuevoEnlace' where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		
	  }

	  function editarDirEv($idEv,$nuevaDireccion){

	  	$sql = "UPDATE EVENTO set direccion='$nuevaDireccion' where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		
	  }

	  function editarDescripcionEv($idEv,$nuevaDescripcion){

	  	$sql = "UPDATE EVENTO set descripcion='$nuevaDescripcion' where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		
	  }

	  function editarPortadaEv($idEv,$nuevaPortada){

	  	$sql = "UPDATE EVENTO set dirPortada='$nuevaPortada' where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		
	  }

	  function cerrarConexion(){

	  	mysqli_close($this->mysqli);
		   
		
	  }


	  function eliminarEvento($idEv){
	  	$sql = "DELETE FROM EVENTO where id='$idEv'";
		    
		mysqli_query($this->mysqli, $sql);
		   
		mysqli_close($this->mysqli);

	  }


	  function addEvento($nombre, $lugar, $fecha, $hora, $precio, $enlace, $direccion, $descripcion, $dirPortada){
	  	$sql = "INSERT INTO EVENTO (nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion, dirPortada) values ('$nombre', '$lugar' ,'$fecha', '$hora', '$precio', '$enlace', '$direccion', '$descripcion', '$dirPortada')";

	  	mysqli_query($this->mysqli, $sql);
		   

		mysqli_close($this->mysqli);


	  }
	  
	   function editarPublicadoEv($idEv,$nuevoPublicado){

	  	$sql = "UPDATE EVENTO set publicado='$nuevoPublicado' where id='$idEv'";
		    
			mysqli_query($this->mysqli, $sql);
	  }

	  function editarEtiquetasEv($idEv,$nuevasEtiquetas){

	  	$sql = "UPDATE EVENTO set etiquetas='$nuevasEtiquetas' where id='$idEv'";
		    
			mysqli_query($this->mysqli, $sql);
	  }


	  function buscar($busqueda, $usuario) {

	    if ($usuario['tipo'] == "gestor" or $usuario['tipo'] == "superusuario")
	        $sql = "SELECT * from EVENTO where nombre LIKE '%$busqueda%' or descripcion LIKE '%$busqueda%'";
	    else
	        $sql = "SELECT * from EVENTO where publicado='1' and (nombre LIKE '%$busqueda%' or descripcion LIKE '%$busqueda%')";   
	    
	    $peticion = $this->mysqli->query($sql);

	    $eventos = [];

	    if ($peticion) {

	        $peticion_tabla = mysqli_fetch_assoc($peticion);

	        while ($peticion_tabla) {

	            array_push($eventos, $peticion_tabla);
	            $peticion_tabla = mysqli_fetch_assoc($peticion);
	        }

	        return $eventos;
	    }


	    return $busqueda;
	    
		}

}


?>