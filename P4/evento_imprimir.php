<?php 
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bd.php');


  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new Bd();
  
  if (isset($_GET['ev'])) {
    $idEv = $_GET['ev'];
    $evento = $bdNew->getEvento($idEv);
    $imagenes = $bdNew->getImagenes($idEv);

  } 

  else
    $idEv = -1;


  
  echo $twig->render('evento_imprimir.html', ['evento' => $evento, 'imagenes' => $imagenes]);



?>