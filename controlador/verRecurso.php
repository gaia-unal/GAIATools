<?php
require_once '../Twig/Autoloader.php'; Twig_Autoloader::register();
//error_reporting(E_ERROR | E_WARNING | E_PARSE); // evita que salgan mensajes noticiosos del código en el servidor provocando mala experiencia en el usuario.
$loader = new Twig_Loader_Filesystem('../templates'); 
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
//require_once("../configuracion/conexionBD.php");//Se incluye la conexión con la bodega
$idCuest=""; $validar=""; $retorno=""; $datosPreg=""; $datosOpcion=""; $datosCuest=""; $autor=""; $mensajeRetro="";
$pos=0; $siguiente=0; $mensaje=""; $conteoCorrectos=0; $conteoErroneo=0; $respAbierta=""; $capitulos=""; 
if($_GET){
    $validar = array_key_exists('validar', $_GET) ? $_GET['validar'] : null;
    $id = array_key_exists('id', $_GET) ? $_GET['id'] : null;
    $head_id = cosasAdrian($id);
    if ($head_id != '' and $head_id != null) {
        $comprueboEnsena2 = "SELECT reference_type_activity_id from head where id = $head_id";
        $exe_comprueboEnsena2 = pg_query($comprueboEnsena2);
        $fetch_comprueboEnsena2 = pg_fetch_array($exe_comprueboEnsena2);
        $referenceActivity = $fetch_comprueboEnsena2['reference_type_activity_id'];
        if ($referenceActivity == '9') {
            header("Location: verRecursoEnsenaEscribir.php?validar=true&id=$id&head=$head_id");
        }elseif ($referenceActivity == '10') {
            header("Location: verRecursoEnsenaElegir.php?validar=true&id=$id&head=$head_id");
        }elseif ($referenceActivity == '11') {
           header("Location: verRecursoEnsenaEmparejar.php?validar=true&id=$id&head=$head_id");
        }
        $datosCuest = actividades($id); $tam = count($datosCuest); $titulo = nombreRE($id); 
        $autor = autorRE($id); $autor = $autor['name'].' '.$autor['surname']; $siguiente=1;
    }else{ header("Location: listarRecurso.php"); }
}
if($_POST){
    $validar = array_key_exists('validar', $_POST) ? $_POST['validar'] : null;
    $idCuest = array_key_exists('idCuestionario', $_POST) ? $_POST['idCuestionario'] : null;
    $respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
    $conteoCorrectos = array_key_exists('correctos', $_POST) ? $_POST['correctos'] : null;
    $conteoErroneo = array_key_exists('erroneos', $_POST) ? $_POST['erroneos'] : null;
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $respCorr = array_key_exists('respCorr', $_POST) ? $_POST['respCorr'] : null;
    $estilo = array_key_exists('estilo', $_POST) ? $_POST['estilo'] : null;
    $autor = array_key_exists('autor', $_POST) ? $_POST['autor'] : null;
    #recibe las preguntas codificadas.
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null; $datosCuest = actividades($id); 
    $tam = count($datosCuest); $pos = array_key_exists('pos', $_POST) ? $_POST['pos'] : null;
    if($respuesta!=null){ $siguiente=0; }else{ $siguiente=1; }
    if ($idCuest<5){
        if ($respuesta=='t'){
            $conteoCorrectos++; $mensaje = "FELICIDADES!!! Respuesta Correcta";
        }elseif ($respuesta=='f'){
            $conteoErroneo++; $mensaje = "Lo siento. Respuesta erronea. "; $mensajeRetro = "Recuerda: ";
            if($datosCuest[$pos-1]['retro']==null){ $mensajeRetro .= str_replace("%"," ",$respCorr);  }else{ $mensajeRetro .= $datosCuest[$pos-1]['retro']; }
        }
    }
}
if($validar){
    session_start(); $nombre = $_SESSION['nombre']; $idRol = $_SESSION['id_rol']; $idUsuario = $_SESSION['id_usu'];
    if ($nombre==null) { include("cierre.php");}
    $template = $twig->addGlobal("session", $_SESSION); $retorno = "listarRecurso.php"; $estilo = "1";
}else{ $idRol = null; $estilo = "2"; $retorno = "index.php"; }
if($pos<$tam && $siguiente==1 ){#permite controlar si muestra si la respuesta es correcta y retroalimenta o continua con la siguiente pregunta
    $datosPreg = $datosCuest[$pos];#al entrear en este if, quiere decir que se continua conla siguiente item.
    $pos++; $idCuest = $datosPreg['tipo']; $datosOpcion = item($datosPreg['id']);
    if ($idCuest==4 || $idCuest==6){
        $respAbierta = $datosOpcion[0]['opcion'];
        if ($idCuest==4){ $respAbierta = str_replace(" ","%",$respAbierta); }
    }elseif ($idCuest==5) { $capitulos = capitulosLibro($id); }
}else{ if($pos==$tam){ $siguiente=2; } } #me mostrara al usuario que ha finalizado el cuestionario
$template = $twig->loadTemplate('verRecurso.twig.html');
echo $template->render(array("idCuest"=>$idCuest, 'rol' => $idRol, "validar"=>$validar, "retorno"=>$retorno, 
    "datosPreg"=>$datosPreg, "datosOpcion"=>$datosOpcion, "autor"=>$autor, "id"=>$id, "pos"=>$pos, "estilo"=>$estilo, 
    "siguiente"=>$siguiente, "mensaje"=>$mensaje, "mensajeRetro"=>$mensajeRetro, "conteoCorrectos"=>$conteoCorrectos, 
    "conteoErroneo"=>$conteoErroneo, "titulo"=>$titulo, "respAbierta"=>$respAbierta, "capitulos"=>$capitulos));

?>

