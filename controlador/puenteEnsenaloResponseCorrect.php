<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
session_start();
# Se recibe por sesión el nombre, id_rol, título y id de actividad.
$nombre = $_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
$titulo = $_SESSION['titulo'];
if ($nombre==null) { include("cierre.php");}
$id = $_SESSION['id'];
$nombreCorto = explode(" ", $nombre);
$nombreCortoTam = count($nombreCorto);

$nombreCorto = $nombreCorto[0];


$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('puenteEnsenaloResponseCorrect.twig.html');
#echo $template->render(array("titulo"=>$titulo, 'tmp'=>$dato));
echo $template->render(array('nombreCorto'=>$nombreCorto,"titulo"=>$titulo, 'rol' => $idRol, "id"=>$id));
?>
