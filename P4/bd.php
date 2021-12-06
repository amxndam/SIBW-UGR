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

	    //se obtiene el evento con el id pedido en idEv
	  	$stmt = $this->mysqli->prepare('SELECT nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion, dirPortada FROM EVENTO WHERE id = ?');
	  	$stmt->bind_param("i", $idEv);
	  	$stmt->execute();
	  	$evento_tabla = $stmt->get_result();
	  		
	    //array con valores por defecto
	  	$evento = array('id'=>'----','nombre' => '----', 'lugar' => '----', 'fecha' => '----' , 'hora' => '----', 'precio' => '----', 'enlace' => '----', 'direccion' => '----', 'descripcion' => '----', 'dirPortada' => '----' );
	  		
	  	if($evento_tabla->num_rows > 0) {
	  		$row = $evento_tabla->fetch_assoc();
	  		//se introducen los valores en el array	
	  		$evento = array('id'=>$row['id'],'nombre' => $row['nombre'], 'lugar' => $row['lugar'], 'fecha' => $row['fecha'], 'precio' => $row['precio'], 'enlace' => $row['enlace'], 'direccion' => $row['direccion'], 'descripcion' => $row['descripcion'], 'dirPortada' => $row['dirPortada']);		
	  	}
	  		

	  	$stmt->close();

	  	return $evento;
			
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

	  function getComments($idEv) {

	    $stmt = $this->mysqli->prepare('SELECT * FROM COMMENT WHERE evento=?');
	    $stmt->bind_param("i", $idEv);
	    $stmt->execute();

	    $commment_tabla = $stmt->get_result();
	    $comentarios = array();

	    while($commment_tabla2 = $commment_tabla->fetch_assoc())
	      $comentarios[] = $commment_tabla2;
	    
	    return $comentarios;
	  }

	  function getCommentsTotal() {

	    $stmt = $this->mysqli->prepare('SELECT * FROM COMMENT');
	    $stmt->execute();

	    $commment_tabla = $stmt->get_result();
	    $comentarios = array();

	    if($commment_tabla->num_rows > 0){
	    	while($row = $commment_tabla->fetch_array()) 
				$comentarios[] = $row;
				
	    }

	    $stmt->close();
	    return $comentarios;
	  }


	  function editarComment($idComment,$comentarioNuevo){

	  	$sql = "UPDATE COMMENT set comentario='$comentarioNuevo' where id='$idComment'";
		    
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


	  

}


?>