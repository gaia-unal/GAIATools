<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
session_start();

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
include("mover.php");
$idCuest=""; $validar=""; $retorno=""; $datosPreg=""; $datosOpcion=""; $datosCuest=""; $autor=""; 
$pos=0; $siguiente=1; $mensaje=""; $conteoCorrectos=0; $conteoErroneo=0; $respAbierta=""; $capitulos=""; $idRol = ''; $estilo = ''; $idUsuario='';

if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    $idRol = $_SESSION['id_rol'];
    $estilo = "1";
    $retorno = "listarRecurso.php";

}else{
    $idRol = null;
    $estilo = "2";
    $retorno = "index.php";
}

if($_GET){
    $validar = array_key_exists('validar', $_GET) ? $_GET['validar'] : null;
    $id = array_key_exists('id', $_GET) ? $_GET['id'] : null;
    
    $datosCuest = actividades($id);
    $tam = count($datosCuest);
    $titulo = nombreRE($id);
    $autor = autorRE($id);
    $autor = $autor['name'].' '.$autor['surname'];
        
    $minuscula = strtolower($datosCuest[$pos]['pregunta']);
    $reemplazos = array([$pos][0] => $minuscula);
    array_replace($datosCuest, $reemplazos);

}
if($_POST){
    $siguiente = 1;
    $validar = array_key_exists('validar', $_POST) ? $_POST['validar'] : null;
    $idCuest = array_key_exists('idCuestionario', $_POST) ? $_POST['idCuestionario'] : null;
    $respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
    $conteoCorrectos = array_key_exists('correctos', $_POST) ? $_POST['correctos'] : null;
    $conteoErroneo = array_key_exists('erroneos', $_POST) ? $_POST['erroneos'] : null;
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $respCorr = array_key_exists('respCorr', $_POST) ? $_POST['respCorr'] : null;
    $estilo = array_key_exists('estilo', $_POST) ? $_POST['estilo'] : null;
    $autor = array_key_exists('autor', $_POST) ? $_POST['autor'] : null;
    $respuestaEscribeSenas = array_key_exists('respuestaEscribeSenas', $_POST) ? $_POST['respuestaEscribeSenas'] : null;
    #recibe las preguntas codificadas.
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $datosCuest = actividades($id);

    $respuestaEscribeSenas = strtolower($respuestaEscribeSenas);

    /*$minuscula = strtolower($datosCuest[$pos]['pregunta']);
    $reemplazos = array([$siguiente][0] => $minuscula);
    array_replace($datosCuest, $reemplazos);*/


    $tam = count($datosCuest); // en $tam el número de ítems de la actividad
    $pos = array_key_exists('pos', $_POST) ? $_POST['pos'] : null;


    /* Se asigna a la variable $siguiente un identificador para saber si es el último ítem de la actividad o no, además para saber si viene una respuesta o no
    * Si es 0 significa que viene una respuesta pero no es la última
    * Si es 1 significa que no viene respuesta pero n es la última
    * Si es 2 significa que viene respuesta y es la última
    */
    if($respuesta==null and $respuestaEscribeSenas != null){ $siguiente=0; }else{ $siguiente=1; }
    if ($respuestaEscribeSenas == $datosCuest[$pos-1]['pregunta']){
            $conteoCorrectos++;
            $mensaje = "CORRECTO";  // mensaje que indica que se respondió correctamente
        }elseif ($respuestaEscribeSenas != null){ 
            $conteoErroneo++;
            $mensaje = "INCORRECTO"; // mensaje que indica que no se respondió correctamente
            
        }
    

}
if($validar){
    $template = $twig->addGlobal("session", $_SESSION);
}
if($pos<$tam && $siguiente==1 ){#permite controlar si muestra si la respuesta es correcta y retroalimenta o continua con la siguiente pregunta
    $datosPreg = $datosCuest[$pos];#al entrear en este if, quiere decir que se continua conla siguiente item.
    $pos++;
    $idCuest = $datosPreg['tipo'];
    $datosOpcion = item($datosPreg['id']);
    if ($idCuest==4 || $idCuest==6){
        $respAbierta = $datosOpcion[0]['opcion'];
        if ($idCuest==4){ $respAbierta = str_replace(" ","%",$respAbierta); }
    }elseif ($idCuest==5) {
        $capitulos = capitulosLibro($id);
    }
}else{
    if($pos==$tam){
        $siguiente=2; #me mostrara al usuario que ha finalizado el cuestionario
    }
}



$retro = $datosCuest[$pos-1]['retro'];
$template = $twig->loadTemplate('verRecursoEnsenaEscribir.twig.html');
echo $template->render(array("idCuest"=>$idCuest, 'rol' => $idRol, "validar"=>$validar, 
    "retorno"=>$retorno, "datosPreg"=>$datosPreg, "datosOpcion"=>$datosOpcion, 
    "id"=>$id, "pos"=>$pos, "siguiente"=>$siguiente, "mensaje"=>$mensaje, "autor"=>$autor, 
    "conteoCorrectos"=>$conteoCorrectos, "conteoErroneo"=>$conteoErroneo, "titulo"=>$titulo, 
    "respAbierta"=>$respAbierta, "estilo"=>$estilo, "capitulos"=>$capitulos,"retro"=>$retro));
?>

