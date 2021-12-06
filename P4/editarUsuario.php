<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include('bdUsuarios.php');
    
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bdNew = new BdUsuarios();

    $mysqli = $bdNew->getMysqli();

    session_start();
    $usuario = array();
    if (isset($_SESSION['loginNombre'])) {
        $usuario = $bdNew->getUsuario($_SESSION['loginNombre']);
    }
    
    $nombre = $usuario['nombre'];
    $nombreNuevo = $_POST['nombreNuevo'];
    $passwordNueva = $_POST['passwordNueva'];
    
    $emailNuevo = $_POST['emailNuevo'];

    echo "<h2>" . $nombreNuevo . "</h2>";

    if($nombreNuevo != null){
        
        if ($bdNew->existeUsuario($nombre)){
            $bdNew->modificarNombre($nombre, $nombreNuevo);
            $msg = "Actualización realizada";
            $_SESSION['nombre'] = $nombreNuevo;
        }

        else
            $msg = "ERROR: Nombre no disponible, introduzca otro";

    }

    if($passwordNueva != null){

        $bdNew->modificarPass($nombre, $passwordNueva);
        $msg = "Actualización realizada";

    }

    if($emailNuevo != null){
        $email = $usuario['email'];
        $bdNew->modificarEmail($nombre, $email, $emailNuevo);
        $msg = "Actualización realizada";


    }

    $bdNew->cerrarConexion();
    

    echo $twig->render('perfil.html', ['usuario' => $usuario, 'msg' => $msg ]);
    
    
?>
