<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bd.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new Bd();

  $mysqli = $bdNew->getMysqli();

  $eventos = $bdNew->getEventos();

  $comments = $bdNew->getCommentsTotal();

  
  if (isset($_GET['c']))
        $idComment = $_GET['c'];
  else
  	$idComment = -1;
    
  if (isset($_GET['ev']))
		$idEv = $_GET['ev'];

  else
		$idEv = -1;
	
  if (isset($_GET['op']))
		$idOp = $_GET['op'];

  else
		$idOp = -1;

	//editar comentario

	if($idOp == 0){
	
		if(isset($_POST['nuevoComentario'])){
        	$comentarioNuevo = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoComentario']);   
        	$bdNew->editarComment($idComment,$comentarioNuevo);
	    }
	}

	if($idOp == 1){
		
		$bdNew->eliminarComentario($idComment);

	}


	




	header("Location: moderadorComentarios.php");

    
  
?>
