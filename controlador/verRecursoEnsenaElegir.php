<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE); // evita que salgan mensajes noticiosos del código en el servidor provocando mala experiencia en el usuario.

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
//require_once("../configuracion/conexionBD.php");//Se incluye la conexión con la bodega

#Se incluye al archivo (mover.php) que permite la animación del los avatar
include("mover.php");
$idCuest=""; $validar=""; $retorno=""; $datosPreg=""; $datosOpcion=""; $datosCuest=""; $autor=""; 
$pos=0; $siguiente=1; $mensaje=""; $conteoCorrectos=0; $conteoErroneo=0; $respAbierta=""; $capitulos=""; $idRol = ''; $estilo = ''; $idUsuario='';

if (isset($_SESSION['nombre'])) {
    # code
    $nombre = $_SESSION['nombre'];
    $idRol = $_SESSION['id_rol'];
    $retorno = "listarRecurso.php";
    if ($nombre==null) { }
    $estilo = "1";
}else{
    $idRol = null;
    $estilo = "2";
    $retorno = "index.php";
}

if($_GET){
    $validar = array_key_exists('validar', $_GET) ? $_GET['validar'] : null;
    $id = array_key_exists('id', $_GET) ? $_GET['id'] : null;
    
    $datosCuest = actividades($id); //en $datos cuest se almacena el ítem de la actividad 

    $tam = count($datosCuest); // en $tam el número de ítems de la actividad
    $titulo = nombreRE($id); // en $título el nombre de la actividad
    $autor = autorRE($id); // en $autor el autor de la actividad
    $autor = $autor['name'].' '.$autor['surname'];
        
   /* $minuscula = strtolower($datosCuest[$pos]['pregunta']); // se convierte la cadena del nombre de la pregunta a minúscula
    $reemplazos = array([$pos][0] => $minuscula); // se asígna la mínuscula a la posición donde está el título
    array_replace($datosCuest, $reemplazos);*/

    $fetch_comprueboEnsena1 = SelectHeadRecourse($id);

    $head_id = (String) $fetch_comprueboEnsena1['head_id'];



}
if($_POST){
    $siguiente = 1;
    $validar = array_key_exists('validar', $_POST) ? $_POST['validar'] : null;
    $idCuest = array_key_exists('idCuestionario', $_POST) ? $_POST['idCuestionario'] : null;
    $respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
    $a = array_key_exists('a', $_POST) ? $_POST['a'] : null;
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


    $tam = count($datosCuest);  // en $tam el número de ítems de la actividad
    $pos = array_key_exists('pos', $_POST) ? $_POST['pos'] : null;

    /* Se asigna a la variable $siguiente un identificador para saber si es el último ítem de la actividad o no, además para saber si viene una respuesta o no
    * Si es 0 significa que viene una respuesta pero no es la última
    * Si es 1 significa que no viene respuesta pero n es la última
    * Si es 2 significa que viene respuesta y es la última
    */
    if($respuesta != null){ $siguiente=0; }else{ $siguiente=1; }
     if ($respuesta == 't'){ // si viene respuesta y es 't' significa que la respuesta es correcta
            $conteoCorrectos++;
            $mensaje = "CORRECTO"; // mensaje que indica que se respondió correctamente
        }elseif ($respuesta == 'f'){ // si viene respuesta y es 'f' significa que la respuesta no es correcta
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

if (isset($datosOpcion[0]['opcion']) and isset($datosOpcion[1]['opcion']) and isset($datosOpcion[2]['opcion']) and isset($datosOpcion[3]['opcion'])) {
    # code...
$datosOpcion[0]['image'] = $datosOpcion[0]['opcion']."_".$id;
$datosOpcion[1]['image'] = $datosOpcion[1]['opcion']."_".$id;
$datosOpcion[2]['image'] = $datosOpcion[2]['opcion']."_".$id;
$datosOpcion[3]['image'] = $datosOpcion[3]['opcion']."_".$id;
}

$retro = $datosCuest[$pos-1]['retro'];
$template = $twig->loadTemplate('verRecursoEnsenaElegir.twig.html');
echo $template->render(array("idCuest"=>$idCuest, 'rol' => $idRol, "validar"=>$validar, 
    "retorno"=>$retorno, "datosPreg"=>$datosPreg, "datosOpcion"=>$datosOpcion, 
    "id"=>$id, "pos"=>$pos, "siguiente"=>$siguiente, "mensaje"=>$mensaje, "autor"=>$autor, 
    "conteoCorrectos"=>$conteoCorrectos, "conteoErroneo"=>$conteoErroneo, "titulo"=>$titulo, 
    "respAbierta"=>$respAbierta, "estilo"=>$estilo, "capitulos"=>$capitulos,"retro"=>$retro));
?>

