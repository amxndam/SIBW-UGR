<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bd.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new Bd();


   
  if (isset($_GET['ev']))
		$idEv = $_GET['ev'];

  else
		$idEv = -1;

	if (isset($_GET['op']))
		$op = $_GET['op'];

  else
		$op = -1;
	

	$evento = array();
	$evento = $bdNew->getEvento($idEv);


	if($op == 0){
		echo $twig->render('editarEvento.html', ['evento' => $evento, 'op' => $op]);
	}
 
 	else if ($op == 1){
 		$bdNew->eliminarEvento($idEv);
 		header("Location: index.php");
 	}

 	else if ($op == 2){
 		echo $twig->render('addEvento.html');
 	}

  
?>
