<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bd.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new Bd();


  $eventos = $bdNew->getEventos();

  $comments = $bdNew->getCommentsTotal();

  
  echo $twig->render('editarComentarios.html', ['eventos'=> $eventos, 'comentarios' => $comments]);
  
?>
