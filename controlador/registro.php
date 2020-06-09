<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array('cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
$mensaje = ""; $listarOpcionesNeed="";
$need = listaNeed();$listaNeed = "";
foreach ($need as $value){
    $clase = normalizePhp($value['name']); 
    $listaNeed .= "<option id='".$clase."' value='".$value['id']."'>".$value['name']."</option>";
    $listarOpcionesNeed .= rtrim($value['name']).", ";
}
if ($_POST) {
    $idNombre = array_key_exists('nombre', $_POST) ? $_POST['nombre'] : null;
    $idApellido = array_key_exists('apellido', $_POST) ? $_POST['apellido'] : null;
    $idCorreo = array_key_exists('correo', $_POST) ? $_POST['correo'] : null;
    $idGenero = array_key_exists('genero', $_POST) ? $_POST['genero'] : null;
    $idFecha = array_key_exists('fecha_nacimiento', $_POST) ? $_POST['fecha_nacimiento'] : null;
    $idInstitucion = array_key_exists('institucion', $_POST) ? $_POST['institucion'] : null;
    $idNivel = array_key_exists('nivel', $_POST) ? $_POST['nivel'] : null;
    $idNeed = array_key_exists('need', $_POST) ? $_POST['need'] : null;
    $idUsuario = array_key_exists('user', $_POST) ? $_POST['user'] : null;
    $idClave= array_key_exists('clave', $_POST) ? $_POST['clave'] : null;
    if(verificarEmail($idCorreo)){
        $mensaje = "No es posible crear el usuario, el correo ya fue registrado con otro usuario";
    }else{
        if(verificarUsuario($idUsuario)){
            $mensaje = "No es posible crear el usuario, el nombre de usuario ya fue registrado con otro usuario";
        }else{
            $mensaje = crearUsu($idNombre, $idApellido, $idCorreo, $idGenero, $idFecha, 
                    $idInstitucion, $idNivel, $idNeed, $idUsuario, $idClave, 'true');
        }
    }
}

$template = $twig->loadTemplate('registro.twig.html');
echo $template->render(array( 'mensaje' => $mensaje, 'usuario'=>$idUsuario, 'clave'=>$idClave, 'need' => $listaNeed, 'opcionesNeed'=>$listarOpcionesNeed));

?>