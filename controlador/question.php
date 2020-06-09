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
if ($_POST){
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('question.twig.html');
#echo $template->render(array("titulo"=>$titulo, 'tmp'=>$dato));
echo $template->render(array("titulo"=>$titulo, 'rol' => $idRol, "id"=>$id));
?>