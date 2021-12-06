<?php 
	require_once "/usr/local/lib/php/vendor/autoload.php";
	include('bd.php');


  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  
  if (isset($_GET['ev'])) {
    $idEv = $_GET['ev'];
    $evento = getEvento($idEv);
    $imagenes = getImagenes($idEv);
    $comments = getComments($idEv);

  }
  
  else
    $idEv = -1;

  
  echo $twig->render('evento.html', ['evento' => $evento, 'imagenes' => $imagenes, 'comments' => $comments]);



?>