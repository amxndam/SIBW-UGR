<?php 
	require_once "/usr/local/lib/php/vendor/autoload.php";
	include('bd.php');

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);


	$eventos = getEventos();

	echo $twig->render('portada.html', ['eventos' => $eventos]);


?>