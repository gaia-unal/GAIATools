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
if ($_POST){
    $title = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $existente = array_key_exists('existente', $_POST) ? $_POST['existente'] : null;
    $modificado = array_key_exists('modificado', $_POST) ? $_POST['modificado'] : null;
    $categoriaEle = array_key_exists('categoriaEle', $_POST) ? $_POST['categoriaEle'] : null;
    $needEle = array_key_exists('needEle', $_POST) ? $_POST['needEle'] : null;
    $agregar = array_key_exists('agregar', $_POST) ? $_POST['agregar'] : null;
    $idItem = array_key_exists('idItem', $_POST) ? $_POST['idItem'] : null;
    $objetosPosibles = listarOASIntegrar($categoriaEle, $needEle, $idUsuario, $id);
    if($agregar!=NULL){
        $mensaje = agregarActividad($id, $idItem);
    }
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('ensamblar.twig.html');
echo $template->render(array("idUsuario"=>$idUsuario, "rol" => $idRol, "id"=>$id, 
    "titulo"=>$title, "existente"=>$existente, "recursos"=>$objetosPosibles, 
    "categoriaEle"=>$categoriaEle, "needEle"=>$needEle, "mensaje"=>$mensaje)); #se envia el idUsuario con el fin de identificar el autoro de los objetos
?>