<?php 
	require_once "/usr/local/lib/php/vendor/autoload.php";
	include('bd.php');

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$bdNew = new Bd();

	session_start();

	$usuario = [];

	if(isset($_SESSION['nombreUsuario'])){
        $usuario = getUser($_SESSION['nombreUsuario']);
    }

	$eventos = $bdNew->getEventos();

	echo $twig->render('portada.html', ['eventos' => $eventos, 'usuario' => $usuario]);


?>