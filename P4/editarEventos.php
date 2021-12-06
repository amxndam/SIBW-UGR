<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bd.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new Bd();

  $mysqli = $bdNew->getMysqli();

    
  if (isset($_GET['ev']))
		$idEv = $_GET['ev'];

  else
		$idEv = -1;
	
  if (isset($_GET['op']))
		$idOp = $_GET['op'];

  else
		$idOp = -1;

	//editar evento
	if($idOp == 0){
	
		if(isset($_POST['nuevoNombre'])){
        	$nuevoNombre = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoNombre']);   
        	$bdNew->editarNombreEv($idEv,$nuevoNombre);
	    }



    if(isset($_POST['nuevoLugar'])){
          $nuevoLugar = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoLugar']);   
          $bdNew->editarLugarEv($idEv,$nuevoLugar);
    }



    if(isset($_POST['nuevaFecha'])){
          $nuevaFecha = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaFecha']);   
          $bdNew->editarFechaEv($idEv,$nuevaFecha);
      }

    if(isset($_POST['nuevaHora'])){
          $nuevaHora = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaHora']);   
          $bdNew->editarHoraEv($idEv,$nuevaHora);
      }

    if(isset($_POST['nuevoPrecio'])){
          $nuevoPrecio = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoPrecio']);   
          $bdNew->editarPrecioEv($idEv,$nuevoPrecio);
      }

    if(isset($_POST['nuevoEnlace'])){
          $nuevoEnlace = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoEnlace']);   
          $bdNew->editarEnlaceEv($idEv,$nuevoEnlace);
      }

    if(isset($_POST['nuevaDireccion'])){
          $nuevaDireccion = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaDireccion']);   
          $bdNew->editarDirEv($idEv,$nuevaDireccion);
      }

    if(isset($_POST['nuevaDescripcion'])){
          $nuevaDescripcion = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaDescripcion']);   
          $bdNew->editarDescripcionEv($idEv,$nuevaDescripcion);
      }

    if(isset($_POST['nuevaPortada'])){
          $nuevaPortada = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaPortada']);   
          $bdNew->editarPortadaEv($idEv,$nuevaPortada);
      }

      $bdNew->cerrarConexion();

	}

  //eliminar evento
	if($idOp == 1){
		
		$bdNew->eliminarEvento($idEv);

	}

   //añadir evento
  if($idOp == 2){

    if(isset($_POST['nombre'])){
          $nombre = mysqli_real_escape_string($mysqli,$_REQUEST['nombre']);  
      }



    if(isset($_POST['lugar'])){
          $lugar = mysqli_real_escape_string($mysqli,$_REQUEST['lugar']);   
    }



    if(isset($_POST['fecha'])){
          $fecha = mysqli_real_escape_string($mysqli,$_REQUEST['fecha']); 
      }

    if(isset($_POST['hora'])){
          $hora = mysqli_real_escape_string($mysqli,$_REQUEST['hora']);
      }

    if(isset($_POST['precio'])){
          $precio = mysqli_real_escape_string($mysqli,$_REQUEST['precio']);
      }

    if(isset($_POST['enlace'])){
          $enlace = mysqli_real_escape_string($mysqli,$_REQUEST['enlace']);  
      }

    if(isset($_POST['direccion'])){
          $direccion = mysqli_real_escape_string($mysqli,$_REQUEST['direccion']);  
      }

    if(isset($_POST['descripcion'])){
          $descripcion = mysqli_real_escape_string($mysqli,$_REQUEST['descripcion']); 
      }

    if(isset($_POST['dirPortada'])){
          $dirPortada = mysqli_real_escape_string($mysqli,$_REQUEST['dirPortada']);
      }
    
    $bdNew->addEvento($nombre, $lugar, $fecha, $hora, $precio, $enlace, $direccion, $descripcion, $dirPortada);

  }




	header("location:moderadorEventos.php");

    
  
?>
