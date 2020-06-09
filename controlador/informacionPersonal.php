<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array('cache' => 'cache', 'debug' => 'true'));
include("../bd/funciones.php");
session_start();
$nombre = $_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usu'];
if ($nombre==null) { include("cierre.php");}
$mensaje="";
if ($_POST) {
    $idNombre = array_key_exists('nombre', $_POST) ? $_POST['nombre'] : null;
    $idApellido = array_key_exists('apellido', $_POST) ? $_POST['apellido'] : null;
    $idCorreo = array_key_exists('correo', $_POST) ? $_POST['correo'] : null;
    $idGenero = array_key_exists('genero', $_POST) ? $_POST['genero'] : null;
    $idFecha = array_key_exists('fecha_nacimiento', $_POST) ? $_POST['fecha_nacimiento'] : null;
    $idInstitucion = array_key_exists('institucion', $_POST) ? $_POST['institucion'] : null;
    $idNivel = array_key_exists('nivel', $_POST) ? $_POST['nivel'] : null;
    $idNeed = array_key_exists('need', $_POST) ? $_POST['need'] : null;
    $mensaje = modificarUsu($idNombre, $idApellido, $idCorreo, $idGenero, $idFecha, $idInstitucion, $idNivel, $idNeed, $idUsuario);
}
$datos = datosPersonales($idUsuario);
$need = listaNeed(); $listarOpcionesNeed="";
$listaNeed = ""; $needActual="";
foreach ($need as $value){
    $clase = normalizePhp($value['name']); 
    $listaNeed .= "<option value='".$value['id']."' id='".$clase;
    if($value['id']==$datos['reference_need_id']){ $listaNeed .= "' selected>"; $needActual=$value['name'];}else{ $listaNeed .= "'>"; }
    $listaNeed .= $value['name']."</option>";
    $listarOpcionesNeed .= rtrim($value['name']).", ";
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('informacionPersonal.twig.html');
echo $template->render(array( 'nombre' => $nombre, 'rol' => $idRol, 'need' => $listaNeed, 'mensaje'=>$mensaje,
        'nombre'=>$datos['name'], 'apellido'=>$datos['surname'], 'correo'=>$datos['mail'], 'needActual'=>$needActual, 
        'genero'=>$datos['gender'], 'pais'=>$datos['country'], 'fecha'=>$datos['dates_birth'], 
        'instituto'=>$datos['institution'], 'nivel'=>$datos['educational_level'], 'opcionesNeed'=>$listarOpcionesNeed));
?>