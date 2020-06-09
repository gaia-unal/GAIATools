<?php
#Carga de funciones para la conección a la base de datos
session_start();
include("../bd/funcionesRaim.php");
//$mensaje="NADA";

#cambiar el get por el post ese post si se puede enviar desde otro dominio???

if($_GET){
    $user = array_key_exists('Usuario', $_GET) ? $_GET['Usuario'] : null;
    $pass = array_key_exists('Contrasenia', $_GET) ? $_GET['Contrasenia'] : null;
    $usuario = validarUsuario($user, $pass);
    if($usuario){
        $_SESSION['nombre'] = $usuario['name']." ".$usuario['surname'];
        $_SESSION['id_rol'] = $usuario['reference_role_id'];
        $_SESSION['id_usu'] = $usuario['id'];
        $mensaje = "Validado";
        header("Location:../controlador/principal.php");
    }else{
        $existente = usuarioExistente($user, $pass);
        if($existente){
            $mensaje = "Su usuario y contraseña son correctos, pero el no se encuentra activo";
        }else{
            $mensaje = "Usuario o contraseña invalidas";
        }
    }
}
echo $mensaje;


?>