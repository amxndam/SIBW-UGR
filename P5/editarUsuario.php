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


    if($nombreNuevo != null){
        
            $bdNew->modificarNombre($nombre, $nombreNuevo);
            $usuario = $bdNew->getUsuario($nombreNuevo);
            $_SESSION = $usuario;
            $_SESSION['loginNombre'] = $nombreNuevo;
            $msg = "Actualización realizada con {$nombreNuevo}";
            

    }

    if($passwordNueva != null){

        $bdNew->modificarPass($nombre, $passwordNueva);
        $msg = "Actualización realizada";

    }

    if($emailNuevo != null){
        $email = $usuario['email'];
        $bdNew->modificarEmail($nombre, $emailNuevo);
        $msg = "Actualización de email realizada con {$emailNuevo}";
        $_SESSION['email'] = $emailNuevo;
        $usuario['email'] = $emailNuevo;
     
    }

    $bdNew->cerrarConexion();

    

    echo $twig->render('perfil.html', ['usuario' => $usuario, 'msg' => $msg ]);
    
    
?>
