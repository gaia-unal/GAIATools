<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array('cache' => 'cache','debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
session_start();
$nombre =$_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
if ($nombre==null) { include("cierre.php");}
$noGuardo = 0; $pregunta=""; $respuesta=""; $retroalimentacion=""; $modificado=0; $origen=''; $redireccionar=null;
if ($_POST){
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $existente = array_key_exists('existente', $_POST) ? $_POST['existente'] : null;
    $idItem = array_key_exists('idItem', $_POST) ? $_POST['idItem'] : null;
    $modificado = array_key_exists('modificado', $_POST) ? $_POST['modificado'] : null;
    $ruta = array_key_exists('ruta', $_POST) ? $_POST['ruta'] : null;
    $origen = array_key_exists('origen', $_POST) ? $_POST['origen'] : '';
    $posicion = array_key_exists('posicion', $_POST) ? $_POST['posicion']+1 : null;
    if($posicion==null){ $posicion = posicionItem($id); }
    if($existente!=0 && $modificado==0 && $origen==''){
        $dato = itemRecurso($idItem);
        $nombre = $dato['pregunta'];
        $descripcion = respuestaRecurso($idItem)['respuesta'];
    }else{
        $nombre = array_key_exists('nombre', $_POST) ? $_POST['nombre'] : null;
        $descripcion = array_key_exists('descripcion', $_POST) ? $_POST['descripcion'] : null;
    }
    if($nombre!=null){
        if($existente!=0 && $origen==''){
            if ($modificado!=0){
                modificarPregunta($idItem, $nombre, $descripcion, null, 6, null, null, null);
                $noGuardo = 1;
                $redireccionar = 1;
            }
        }else{
            guardarPregunta($id, $nombre, $descripcion, null, 6, null, null, null, $posicion);
            $noGuardo = 1;
        }
    }
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('escribelo.twig.html');
#echo $template->render(array("titulo"=>$titulo, 'tmp'=>$dato));
echo $template->render(array("titulo"=>$titulo, 'rol' => $idRol, "posicion"=>$posicion, "volver"=>$redireccionar, 
    "pregunta"=>$nombre, "origen"=>$origen, "respuesta"=>$descripcion, "existente"=>$existente, 
    "id"=>$id, "noGuardo"=>$noGuardo, "idItem"=>$idItem, 
    "modificado"=>$modificado));
?>