<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
session_start();
$nombre =$_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
if ($nombre==null) { include("cierre.php");}
$noGuardo = 0; $modificado=0; $origen=''; $imagen=''; $redireccionar=null;
if ($_POST) {
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $existente = array_key_exists('existente', $_POST) ? $_POST['existente'] : null;
    $idItem = array_key_exists('idItem', $_POST) ? $_POST['idItem'] : null;
    $modificado = array_key_exists('modificado', $_POST) ? $_POST['modificado'] : null;
    $ruta = array_key_exists('ruta', $_POST) ? $_POST['ruta'] : null;
    $origen = array_key_exists('origen', $_POST) ? $_POST['origen'] : '';
    $pagina = array_key_exists('pagina', $_POST) ? $_POST['pagina']+1 : 1;//verificar
    $imagCarg = array_key_exists('imagCarg', $_POST) ? $_POST['imagCarg'] : null;//verificar
    $posicion = array_key_exists('posicion', $_POST) ? $_POST['posicion']+1 : null;
    if($posicion==null){ $posicion = posicionItem($id); }
    if($existente!='0' && $modificado=='0' && $origen==''){
        $dato = itemRecurso($idItem);
        $tituloCapitulo = $dato['pregunta'];
        $idContenido = respuestaRecurso($idItem)['respuesta'];
        $imagen = respuestaRecurso($idItem)['imagen'];
    }else{
        $idContenido = array_key_exists('contenido', $_POST) ? $_POST['contenido'] : null;
        $tituloCapitulo = array_key_exists('tituloCapitulo', $_POST) ? $_POST['tituloCapitulo'] : null;
    }
    if($imagCarg=='1'){
        #$_FILES['archivo']['name'] = $idItem;
        #echo $_FILES['archivo']['name'];
        if($_FILES['archivo']['name']!=''){
            $rutaTemp= $_FILES['archivo']['tmp_name'];
            $rutaFinal='../imageSupport/'.$_FILES['archivo']['name'];
            move_uploaded_file($rutaTemp,$rutaFinal);
        }else{ $rutaFinal=null; }
    }else{ $rutaFinal=null; }
    if($idContenido!=null){
        if($existente!='0' && $origen==''){
            if ($modificado!='0'){
                modificarPregunta($idItem, $tituloCapitulo, $idContenido, null, 5, null, $rutaFinal, null);
                $noGuardo = 1;
                $redireccionar = 1;
            }
        }else{
            guardarPregunta($id, $tituloCapitulo, $idContenido, null, 5, null, $rutaFinal, $pagina-1, $posicion);
            $noGuardo = 1;
        }
    }
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('libro.twig.html');
echo $template->render(array("titulo"=>$titulo, 'rol' => $idRol, "posicion"=>$posicion, "tituloCapitulo"=>$tituloCapitulo, 
    "idContenido"=>$idContenido, "imagen"=>$imagen, "origen"=>$origen, "existente"=>$existente, "volver"=>$redireccionar, 
    "id"=>$id, "noGuardo"=>$noGuardo, "idItem"=>$idItem, "modificado"=>$modificado, "pagina"=>$pagina));
?>