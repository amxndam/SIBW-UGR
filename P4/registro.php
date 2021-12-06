<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bdUsuarios.php');
  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  


  $bdNew = new BdUsuarios();
  $correcto = true;

  $mysqli = $bdNew->getMysqli();

  $nombre = mysqli_real_escape_string($mysqli,$_REQUEST['registroNombre']);
  $password = mysqli_real_escape_string($mysqli,$_REQUEST['registroPassword']);
  $email = mysqli_real_escape_string($mysqli,$_REQUEST['registroEmail']);

  
  $bdNew->registrar($nombre,$password,$email);

  
  
  echo $twig->render('login.html', []);
?>
