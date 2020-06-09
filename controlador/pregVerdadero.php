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
$noGuardo = 0; $pregunta=""; $respuesta=""; $retroalimentacion=""; $actividad=""; $modificado=0; $origen=''; $redireccionar=null;
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
    if($existente!=null && $modificado==0 && $origen==''){
        $dato = itemRecurso($idItem);
        $pregunta = $dato['pregunta'];
        $retroalimentacion = $dato['retroalimentacion'];
        $respuesta = respuestaRecurso($idItem)['respuesta'];
    }else{
        $pregunta = array_key_exists('pregunta', $_POST) ? $_POST['pregunta'] : null;
        $respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
        $opciones = array_key_exists('respuestas1', $_POST) ? $_POST['respuestas1'] : null;
        $retroalimentacion = array_key_exists('retroalimentacion', $_POST) ? $_POST['retroalimentacion'] : null;
    }
        $pregunta = str_replace("'", " ", $pregunta);
        $retroalimentacion = str_replace("'", " ", $retroalimentacion);
        $respuesta = str_replace("'", " ", $respuesta);
        #$opciones = str_replace("'", " ", $opciones);
    if($pregunta!=null && $respuesta!=null){
        if($existente!=null && $origen==''){
            if ($modificado!=0){
                modificarPregunta($idItem, $pregunta, $respuesta, $retroalimentacion, 3, null, null, null);
                $noGuardo = 1;
                $redireccionar = 1;
            }
        }else{
            guardarPregunta($id, $pregunta, $respuesta, $retroalimentacion, 3, $opciones, null, null, $posicion);
            $noGuardo = 1;
            if($existente==='1' && $origen==='existe' && $modificado==='1'){
                $redireccionar=1;
            }
        }
    }
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('pregVerdadero.twig.html');
echo $template->render(array("titulo"=>$titulo, 'rol' => $idRol, "pregunta"=>$pregunta, "origen"=>$origen, "volver"=>$redireccionar, 
    "respuesta"=>$respuesta, "posicion"=>$posicion, "retroalimentacion"=>$retroalimentacion, "existente"=>$existente, 
    "id"=>$id, "noGuardo"=>$noGuardo, "idItem"=>$idItem, "actividad"=>$actividad, "modificado"=>$modificado));
?>