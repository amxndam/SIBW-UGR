<?php 
	require_once "/usr/local/lib/php/vendor/autoload.php";
	include('bd.php');
  include('bdUsuarios.php');


  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new Bd();
  $bdNewUsu = new BdUsuarios();


  $mysqli = $bdNewUsu->getMysqli();

  session_start();

  $usuario = array();

  if(isset($_SESSION['loginNombre'])){
    $usuario = $bdNewUsu->getUsuario($_SESSION['loginNombre']);
  }

  if (isset($_GET['ev'])) {
    $idEv = $_GET['ev'];
    $evento = $bdNew->getEvento($idEv);
    $imagenes = $bdNew->getImagenes($idEv);
    $comments = $bdNew->getComments($idEv);

  }
  
  else
    $idEv = -1;

  

  
  echo $twig->render('evento.html', ['evento' => $evento, 'imagenes' => $imagenes, 'comments' => $comments, 'usuario' => $usuario]);



?>