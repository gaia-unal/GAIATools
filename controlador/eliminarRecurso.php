<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
session_start();
$nombre = $_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usu'];
if ($nombre==null) { include("cierre.php");}
$mensaje="";
if($_POST){
    $idRecurso = array_key_exists('idRecurso', $_POST) ? $_POST['idRecurso'] : null;
    if ($idRecurso!=null){
        $datos = explode(',', $idRecurso);
        $idRecurso = $datos[0];
        $roap = $datos[1];
        if($roap=='f'){
            eliminarRecurso($idRecurso);
            $mensaje = "Recurso educativo eliminado con éxito.";
        }else{
            bloquearRecurso($idRecurso);
            $mensaje = "El recurso educativo NO puede ser eliminado, ya que este es visualizado"
                    . " desde el repositorio ROAP, pero a sido inhabilitada su visualización en esta plataforma.";
        }
    }
    
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('eliminarRecurso.twig.html');
echo $template->render(array("idUsuario"=>$idUsuario, 'rol' => $idRol, "mensaje"=>$mensaje,"ruta"=>"crearRecurso.php")); #se envia el idUsuario con el fin de identificar el autoro de los objetos
?>
