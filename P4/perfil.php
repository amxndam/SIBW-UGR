<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bdUsuarios.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  

  $bdNew = new BdUsuarios();

  $mysqli = $bdNew->getMysqli();

  session_start();

  $usuario = array();

  if(isset($_SESSION['loginNombre'])){
    $usuario = $bdNew->getUsuario($_SESSION['loginNombre']);
  }
  
  echo $twig->render('perfil.html', ['usuario' => $usuario]);
  
?>
