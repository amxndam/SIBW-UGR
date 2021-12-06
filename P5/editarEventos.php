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

    if(isset($_POST['nuevoPublicado'])){
        $nuevoPublicado = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoPublicado']);
       
        $bdNew->editarPublicadoEv($idEv,$nuevoPublicado);
    }

    if(isset($_POST['nuevasEtiquetas'])){
        $nuevasEtiquetas = mysqli_real_escape_string($mysqli,$_REQUEST['nuevasEtiquetas']);
       
        $bdNew->editarEtiquetasEv($idEv,$nuevasEtiquetas);
    }



      $bdNew->cerrarConexion();

      header("location:evento.php?ev=$idEv");


	}

  //eliminar evento
	if($idOp == 1){
		
		$bdNew->eliminarEvento($idEv);
    header("location:index.php");

	}

   //añadir evento
  if($idOp == 2){

    if(isset($_POST['nuevoNombre1'])){
          $nombre = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoNombre1']);  
      }



    if(isset($_POST['nuevoLugar1'])){
          $lugar = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoLugar1']);   
    }

    if(isset($_POST['nuevaFecha1'])){
          $fecha = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaFecha1']); 
      }

    if(isset($_POST['nuevaHora1'])){
          $hora = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaHora1']);
      }

    if(isset($_POST['nuevoPrecio1'])){
          $precio = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoPrecio1']);
      }

    if(isset($_POST['nuevoEnlace1'])){
          $enlace = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoEnlace1']);  
      }

    if(isset($_POST['nuevaDireccion1'])){
          $direccion = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaDireccion1']);  
      }

    if(isset($_POST['nuevaDescripcion1'])){
          $descripcion = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaDescripcion1']); 
      }

    if(isset($_POST['nuevaPortada1'])){
          $dirPortada = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaPortada1']);
      }

      if(isset($_POST['nuevaPublicado1'])){
          $publicado = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaPublicado1']);
      }

    if(isset($_POST['nuevaEtiquetas1'])){
          $etiquetas = mysqli_real_escape_string($mysqli,$_REQUEST['nuevaEtiquetas1']);
      }

      

    
    
    $bdNew->addEvento($nombre, $lugar, $fecha, $hora, $precio, $enlace, $direccion, $descripcion, $dirPortada, $publicado, $etiquetas);

    header("location:index.php");
  }





    
  
?>
