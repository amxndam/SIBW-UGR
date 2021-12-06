<?php
	
    function conectar() {
      $mysqli = new mysqli("mysql", "amanda", "amanda", "SIBW");
      
      if ($mysqli->connect_errno)
        echo ("Error: " . $mysqli->connect_error);
      
      return $mysqli;
    }



  function getEvento($idEv) {

    $mysqli = conectar();
    //se obtiene el evento con el id pedido en idEv
  	$stmt = $mysqli->prepare('SELECT nombre, lugar, fecha, hora, precio, enlace, direccion, descripcion, dirPortada FROM EVENTO WHERE id = ?');
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
    $mysqli = conectar();

    //se obtienen todos los eventos de la tabla
    $eventos_tabla = $mysqli->query('SELECT * FROM EVENTO');

    $eventos = array();

    //se introducen en el array
    while($eventos_tabla2 = $eventos_tabla->fetch_assoc())
        $eventos[] = $eventos_tabla2;
    
    return $eventos;
  }



  function getImagenes($idEv) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare('SELECT dir FROM IMAGEN WHERE evento=?');
    $stmt->bind_param("i", $idEv);
    $stmt->execute();

    $img_tabla = $stmt->get_result();
    $imagenes = array();

    while($img_tabla2 = $img_tabla->fetch_assoc())
      $imagenes[] = $img_tabla2;
    
    return $imagenes;
  }

  function getComments($idEv) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare('SELECT * FROM COMMENT WHERE evento=?');
    $stmt->bind_param("i", $idEv);
    $stmt->execute();

    $commment_tabla = $stmt->get_result();
    $comentarios = array();

    while($commment_tabla2 = $commment_tabla->fetch_assoc())
      $comentarios[] = $commment_tabla2;
    
    return $comentarios;
  }


?>