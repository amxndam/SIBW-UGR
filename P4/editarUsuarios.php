<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bdUsuarios.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new BdUsuarios();

  $mysqli = $bdNew->getMysqli();

  session_start();

  $usuario = array();

  if(isset($_SESSION['loginNombre'])){
    $usuario = $bdNew->getUsuario($_SESSION['loginNombre']);
  }

    
  if (isset($_GET['us']))
		$nombre = $_GET['us'];

  else
		$idEv = -1;

	if(isset($_POST['nuevoTipo'])){
     	$nuevoTipo = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoTipo']);   
     	$bdNew->editarTipoUsu($usuario['nombre'],$nombre,$nuevoTipo);
	}






	header("location:moderadorUsuarios.php");

    
  
?>
