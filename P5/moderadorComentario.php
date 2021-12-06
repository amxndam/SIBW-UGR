<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bd.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new Bd();


   
  if (isset($_GET['comment']))
		$idComment = $_GET['comment'];

  else
		$idComment = -1;
	
  if (isset($_GET['op']))
		$op = $_GET['op'];

  else
		$op = -1;

	$comment = array();
	$comment = $bdNew->getComment($idComment);
	$idEv = $comment['evento'];


	if($op == 0)
		echo $twig->render('editarComentario.html', ['comment' => $comment]);
 
 	else if ($op == 1){
 		$bdNew->eliminarComentario($idComment);
 		header("Location: evento.php?ev=$idEv");
 	}

  
?>
