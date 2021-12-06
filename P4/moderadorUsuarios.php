<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bdUsuarios.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $bdNew = new BdUsuarios();


  $usuarios = $bdNew->getUsuarios();

  
  echo $twig->render('editarUsuarios.html', ['usuarios'=> $usuarios]);
  
?>
