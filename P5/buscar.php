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


  $eventos = $bdNew->buscar('Clase', $usuario);


  echo $twig->render('buscar.html', ['usuario' => $usuario]);


?>