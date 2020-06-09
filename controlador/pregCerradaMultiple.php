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
if ($nombre==null) { include("cierre.php");}
$tmp="";
if ($_POST) {
    $dato = array_key_exists('datos', $_POST) ? $_POST['datos'] : null;
    #$pregunta = array_key_exists('pregunta', $_POST) ? $_POST['pregunta'] : null;
    #$respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
    $tmp = stripslashes($dato); 
    $tmp = urldecode($tmp); 
    $datos = unserialize($tmp);
    $titulo = $datos['titulo'];
    /*if($pregunta!=null && $respuesta!=null){
        $item = array('aplicacion'=>'question', 'actividad'=>4, 'pregunta'=>$pregunta, 'respuesta'=>$respuesta);
        $datos = array_merge($datos, $item);
        $tmp = serialize($datos); 
        $tmp = urlencode($tmp);
    }*/
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('pregCerradaMultiple.twig.html');
echo $template->render(array("titulo"=>$titulo, 'rol' => $idRol, 'tmp'=>$tmp));
?>