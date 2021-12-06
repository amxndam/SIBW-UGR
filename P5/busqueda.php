<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include('bd.php');
    include('bdUsuarios.php');


      $loader = new \Twig\Loader\FilesystemLoader('templates');
      $twig = new \Twig\Environment($loader);


    header('Content-Type: application/json');

    session_start();

    $bdNew = new Bd();
    $bdNewUsu = new BdUsuarios();


      $usuario = array();

      if(isset($_SESSION['loginNombre'])){
        $usuario = $bdNewUsu->getUsuario($_SESSION['loginNombre']);
      }
    
    $eventos = $bdNew->buscar($_POST['pBusqueda'], $usuario);
    echo(json_encode($eventos));

?>