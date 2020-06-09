<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array('cache' => 'cache', 'debug' => 'true'));	

require_once("../configuracion/clsBD.php");
session_start();
$nombre = $_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
if ($nombre==null) { include("cierre.php");}

$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('principal.twig.html');
echo $template->render(array( 'nombre' => $nombre, 'rol' => $idRol ));

?>