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

$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('listarRecurso.twig.html');
echo $template->render(array("idUsuario"=>$idUsuario, 'rol' => $idRol, "ruta"=>"crearRecurso.php")); #se envia el idUsuario con el fin de identificar el autoro de los objetos
?>
