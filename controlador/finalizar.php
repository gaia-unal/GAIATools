<?php
require_once '../Twig/Autoloader.php'; Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php"); $cantidad=0;
session_start();
$nombre = $_SESSION['nombre']; $idRol = $_SESSION['id_rol'];
if ($nombre==null) { include("cierre.php");}
$nombreCorto = explode(" ", $nombre); $nombreCortoTam = count($nombreCorto);
$nombreCorto = $nombreCorto[0]; $mensaje='';
if ($_GET){
    $titulo = array_key_exists('titulo', $_GET) ? $_GET['titulo'] : null;
    $id = array_key_exists('id', $_GET) ? $_GET['id'] : null;
    $estado = array_key_exists('estado', $_GET) ? $_GET['estado'] : null;
}
if ($_POST){
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $estado = array_key_exists('estado', $_POST) ? $_POST['estado'] : null;
}
if($titulo!=null && $id!=null){
    $cantidad = cantidadItems($id);
    if ($estado!=null){
        publicar($id, $estado);
        $mensaje = "Este recurso educativo ya es Público";
    }
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('finalizar.twig.html');
echo $template->render(array("usuario"=>$idRol,"nombreCorto"=>$nombreCorto,"titulo"=>$titulo, 'rol' => $idRol, "id"=>$id, "cantidad"=>$cantidad, "mensaje"=>$mensaje));
?>