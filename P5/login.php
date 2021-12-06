<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include('bdUsuarios.php');

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  

  $bdNew = new BdUsuarios();

  $mysqli = $bdNew->getMysqli();

  $nombre = mysqli_real_escape_string($mysqli,$_REQUEST['loginNombre']);
  $password = mysqli_real_escape_string($mysqli,$_REQUEST['loginPassword']);


  
  if ($bdNew->checkLogin($nombre, $password)) {

    session_start();
    $_SESSION['loginNombre'] = $nombre;
    
    header("location:index.php");
  }  
  

  else {

      
   echo ("<h2> ERROR, inténtelo de nuevo </h2>"); 
    
  }
    
  exit();
  
  echo $twig->render('login.html', []);
  
?>
