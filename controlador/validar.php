<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array('cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
session_start();
include("../bd/funciones.php"); 
$mensaje = "";
if($_POST){
    $user = array_key_exists("user", $_POST) ? $_POST["user"] : NULL;
    $pass = array_key_exists("pass", $_POST) ? $_POST["pass"] : NULL;
    $usuario = validarUsuario($user, $pass);
    if($usuario){
        $_SESSION['nombre'] = $usuario['name']." ".$usuario['surname'];
        $_SESSION['id_rol'] = $usuario['reference_role_id'];
        $_SESSION['id_usu'] = $usuario['id'];
        header("Location:principal.php");
    }else{
        $existente = usuarioExistente($user, $pass);
        if($existente){
            $mensaje = "Su usuario y contraseña son correctos, pero el no se encuentra activo";
        }else{
            $mensaje = "Usuario o contraseña invalidas";
        }
    }
}
#Carga las 'vistas'
$template = $twig->loadTemplate('validar.twig.html');
echo $template->render(array('mensaje'=>$mensaje));

?>