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
  

  else{

    $pass = $bdNew->getPassword($nombre);


    if(password_verify($password, $pass)){
      echo ("<h2> ttt </h2>");
    }
    else{
      echo ("<h2> fffff </h2>");
    }

    echo ("<h2> Error </h2>");
    echo "<h2>" . $pass . "</h2>";
  }
    
  exit();
  
  echo $twig->render('login.html', []);
  
?>
