<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bd.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new Bd();
  $mysqli = $bdNew->getMysqli();


   
  if (isset($_GET['comment']))
		$idComment = $_GET['comment'];

  else
		$idComment = -1;
	

	$comment = array();
	$comment = $bdNew->getComment($idComment);
	$idEv = $comment['evento'];

	//editar comentario

	
		if(isset($_POST['nuevoComment'])){
        	$comentarioNuevo = mysqli_real_escape_string($mysqli,$_REQUEST['nuevoComment']);   
        	$bdNew->editarComment($idComment,$comentarioNuevo);
	    }






	
	header("Location: evento.php?ev=$idEv");

    
  
?>
