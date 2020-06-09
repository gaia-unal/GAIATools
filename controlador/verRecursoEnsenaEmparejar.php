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
$idCuest=""; $validar=""; $retorno=""; $datosOpcion=""; $datosCuest=""; $autor=""; $retro=""; 
$pos=1; $siguiente=1; $mensaje=""; $conteoCorrectos=0; $conteoErroneo=0; $respAbierta=""; $capitulos=""; $Correct_a = ''; $Correct_b = ''; $Correct_c = ''; $bandera1 = ''; $bandera2 = ''; $bandera3 = '';
$a = ''; $b = ''; $c = ''; $d = ''; $idRol = ''; $estilo = ''; $idUsuario='';

if (isset($_SESSION['nombre'])) {
    # code
    $nombre = $_SESSION['nombre'];
    $idRol = $_SESSION['id_rol'];
    $retorno = "listarRecurso.php";
    $estilo = "1";
}else{
    $idRol = null;
    $estilo = "2";
    $retorno = "index.php";
}

if($_GET){
    $validar = array_key_exists('validar', $_GET) ? $_GET['validar'] : null;
    $id = array_key_exists('id', $_GET) ? $_GET['id'] : null;
    $pos = array_key_exists('pos', $_GET) ? $_GET['pos'] : null;
    $head = array_key_exists('head', $_GET) ? $_GET['head'] : null;
    if (isset($_GET['g'])) { 
        $conteoCorrectos = (int) ($_GET['g']);
    }
    # Si viene vacío el parámetro de pos en la URL
    if (isset($_GET['b'])) {
        $conteoErroneo = (int) ($_GET['b']);
    }
    $numHeads = numHeadByRecourse($id);
    $datosCuest = listaItemsPorActividad($head);  //en $datos cuest se almacena el ítem de la actividad
    $tam = $numHeads; // en $tam el número de ítems de la actividad

    # Si viene vacío el parámetro de pos en la URL 
    $titulo = nombreRE($id); // en $título el nombre de la actividad
    $autor = autorRE($id); // en $autor el autor de la actividad
    $autor = $autor['name'].' '.$autor['surname'];
    /*if ($pos != null and $pos < $tam) {
        $minuscula = strtolower($datosCuest[$pos]['content']); // se convierte la cadena del nombre de la pregunta a minúscula
        $reemplazos = array([$pos][0] => $minuscula); // se asígna la mínuscula a la posición donde está el título
        array_replace($datosCuest, $reemplazos);
   }*/ 
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
    $respuestaEscribeSenas = array_key_exists('respuestaEscribeSenas', $_POST) ? $_POST['respuestaEscribeSenas'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;

    $a = $datosCuest[0]['content']; // valor del primer ítem
    $b = $datosCuest[1]['content']; // valor del segundo ítem
    $c = $datosCuest[2]['content']; // valor del tercer ítem

    #recibe las preguntas codificadas.
    $datosCuest = actividades($id);

    $option1 = strtolower($_POST['option1']); // Se almacena en $option1 el valor de la primer casilla
    $option2 = strtolower($_POST['option2']); // Se almacena en $option2 el valor de la segunda casilla
    $option3 = strtolower($_POST['option3']); // Se almacena en $option3 el valor de la tercera casilla

   
    $CorrectLast_aLet = $_POST['a']; // Se almacena en $CorrectLast_aLet el valor que emite el primer avatar
    $CorrectLast_bLet = $_POST['b']; // Se almacena en $CorrectLast_bLet el valor que emite el segundo avatar
    $CorrectLast_cLet = $_POST['c']; // Se almacena en $CorrectLast_cLet el valor que emite el tercer avatar

    $CorrectLast_aOpt = $_POST['Correct_a']; // Se almacena en $CorrectLast_aOpt el valor que está bajo la primer casilla
    $CorrectLast_bOpt = $_POST['Correct_b']; // Se almacena en $CorrectLast_bOpt el valor que está bajo la segunda casilla
    $CorrectLast_cOpt = $_POST['Correct_c']; // Se almacena en $CorrectLast_cOpt el valor que está bajo la tercera casilla

    $bandera = null; // inica como true, si se pone false en algún momento es porque respondió mal

    #Valida si la respuesta que eligió en el primer campo concuerda con la del avatar correcto
    if ($option1 == 'a') { // si respuesta elegida es igual a 'a'
        if ($CorrectLast_aOpt != $CorrectLast_aLet){ //pregunta que si el valor de la primer casilla es diferente a el valor del avatar de 'a'
            $bandera1 = false; // si es diferente es porque se equivocó y la bandera la pone en false

        }
        else{
            $bandera1 = true;
        }
    }
    elseif ($option1 == 'b') {
        if ($CorrectLast_aOpt != $CorrectLast_bLet){
            $bandera1 = false;
        }
        else{
            $bandera1 = true;
        }
    }
    elseif ($option1 == 'c') {
        if ($CorrectLast_aOpt != $CorrectLast_cLet){

            $bandera1 = false;
        }
        else{
            $bandera1 = true;
        }
    }

    #Valida si la respuesta que eligió en el segundo campo concuerda con la del avatar correcto
    if ($option2 == 'a') {
        if ($CorrectLast_bOpt != $CorrectLast_aLet){
            $bandera2 = false;
        }else{
            $bandera2 = true;
        }
    }
    elseif ($option2 == 'b') {
        if ($CorrectLast_bOpt != $CorrectLast_bLet){
            $bandera2 = false;
        }else{
            $bandera2 = true;
        }
    }
    elseif ($option2 == 'c') {
        if ($CorrectLast_bOpt != $CorrectLast_cLet){
            $bandera2 = false;
        }else{
            $bandera2 = true;
        }
    }

    #Valida si la respuesta que eligió en el tercer campo concuerda con la del avatar correcto
    if ($option3 == 'a') {
        if ($CorrectLast_cOpt != $CorrectLast_aLet){
            $bandera3 = false;
        }else{
            $bandera3 = true;
        }
    }
    elseif ($option3 == 'b') {
        if ($CorrectLast_cOpt != $CorrectLast_bLet){
            $bandera3 = false;
        }else{
            $bandera3 = true;
        }
    }
    elseif ($option3 == 'c') {
        if ($CorrectLast_cOpt != $CorrectLast_cLet){
            
            $bandera3 = false;
        }else{
            $bandera3 = true;
        }
    }

//Si todas son buenas $bandera es true y manda mensaje de respuesta correcta
// de lo contrario $bandera = false y manda mensaje de respuesta errónea
if ($bandera1 and $bandera2 and $bandera3) {
    $bandera = true;
}
else{
    $bandera = false;
}

   
    
    #Lo siguiente con la función rand se hace para generar un número aleatorio entre 0 y 2 con el fin de que cada ítem tome una posición aleatoria para su visualización
    $asocia1 = rand(0, 2);     
    $asocia2 = rand(0, 2);
    $asocia3 = rand(0, 2);

    // la idea es que $asocia1, $asocia2 y $asocia3 tengan asignados números diferentes por lo que se valida que sean diferentes, llamándo nuevamente la función en caso de que hayan repetidos
    while ($asocia1 == $asocia2 or $asocia2 == $asocia3 or $asocia1 == $asocia3) {
        $asocia2 = rand(-1, 1);
        $asocia3 = rand(-1, 1);
    }
    if (!isset($datosCuest)) {
        
        $Correct_a = $datosCuest[$asocia1]['content']; // se almacena en $Correct_a la respuesta correcta de la primer casilla 
        $Correct_b = $datosCuest[$asocia2]['content']; // se almacena en $Correct_b la respuesta correcta de la segunda casilla
        $Correct_c = $datosCuest[$asocia3]['content']; // se almacena en $Correct_c la respuesta correcta de la tercer casilla

    }
    

    // bandera = true significa que encontró una respuesta correcta
    if ($bandera) {
        $respuesta = 't'; // se almacena en $respuesta el valor de 't' que significa respuesta correcta
        $conteoCorrectos++; // se incrementa el número respuestas correctas
        $mensaje = 'CORRECTO'; // el mensaje será alusivo a la respuesta correcta
        //echo '<script>alert ("FELICIDADES!!! Respuesta Correcta");</script>';
        if ($pos > 1) {
            $pos-=1;
        }
    }
    elseif($bandera == false){  // bandera = false significa que no encontró una respuesta correcta
        $respuesta ='f'; // se almacena en $respuesta el valor de 'f' que significa respuesta correcta
        $conteoErroneo++; // se incrementa el número respuestas erroneas
        $mensaje = 'INCORRECTO'; // el mensaje será alusivo a la respuesta incorrecta
        if ($pos > 1) {
            $pos-=1;
        }
    }
    else{
        $respuesta = null;
    }
    $head+=1;
     

}
if($validar){
    $template = $twig->addGlobal("session", $_SESSION);
}


if($pos<=$tam){#permite controlar si muestra si la respuesta es correcta y retroalimenta o continua con la siguiente pregunta

if (isset($datosCuest[0]['content'])) {
    $a = $datosCuest[0]['content']; // valor del primer ítem
    $b = $datosCuest[1]['content']; // valor del segundo ítem
    $c = $datosCuest[2]['content']; // valor del tercer ítem 
}

    
    
    #Lo siguiente con la función rand se hace para generar un número aleatorio entre 0 y 2 con el fin de que cada ítem tome una posición aleatoria para su visualización
    $asocia1 = rand(0, 2);
    $asocia2 = rand(0, 2);
    $asocia3 = rand(0, 2);

    // la idea es que $asocia1, $asocia2 y $asocia3 tengan asignados números diferentes por lo que se valida que sean diferentes, llamándo nuevamente la función en caso de que hayan repetidos
    while ($asocia1 == $asocia2 or $asocia2 == $asocia3 or $asocia1 == $asocia3) {
        $asocia2 = rand(0, 2);
        $asocia3 = rand(0, 2);
    }
    
    if (isset($datosCuest[0]['content'])) {

    $Correct_a = $datosCuest[$asocia1]['content']; // se almacena en $Correct_a la respuesta correcta de la primer casilla
    $Correct_b = $datosCuest[$asocia2]['content']; // se almacena en $Correct_b la respuesta correcta de la segunda casilla
    $Correct_c = $datosCuest[$asocia3]['content']; // se almacena en $Correct_c la respuesta correcta de la tercera casilla
    }


    
}elseif($pos>$tam){
        $siguiente=2; #me mostrara al usuario que ha finalizado el cuestionario
    }

   if($pos==''){
    $pos=1;
   }

   $file_nameA = $Correct_a."_".$id;
   $file_nameB = $Correct_b."_".$id;
   $file_nameC = $Correct_c."_".$id;

$retro = $datosCuest[$pos-1]['retro'];
$template = $twig->loadTemplate('verRecursoEnsenaEmparejar.twig.html');
echo $template->render(array("idCuest"=>$idCuest, 'rol' => $idRol, "validar"=>$validar, 
    "retorno"=>$retorno, "a"=>$a, "b"=>$b, "c"=>$c,"file_nameA"=>$file_nameA,"file_nameB"=>$file_nameB,"file_nameC"=>$file_nameC, "datosOpcion"=>$datosOpcion, 
    "id"=>$id, "pos"=>$pos, "siguiente"=>$siguiente, "mensaje"=>$mensaje, "Correct_a"=>$Correct_a,"Correct_b"=>$Correct_b, "Correct_c"=>$Correct_c,"autor"=>$autor, 
    "conteoCorrectos"=>$conteoCorrectos, "conteoErroneo"=>$conteoErroneo, "titulo"=>$titulo, 
    "respAbierta"=>$respAbierta, "estilo"=>$estilo, "capitulos"=>$capitulos,"retro"=>$retro, "head"=>$head));
?>

