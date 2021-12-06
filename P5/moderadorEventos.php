<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bd.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new Bd();


  $eventos = $bdNew->getEventos();

  
  echo $twig->render('editarEventos.html', ['eventos'=> $eventos]);
  
?>
