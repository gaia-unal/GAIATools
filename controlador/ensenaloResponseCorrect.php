<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
#error_reporting(E_ERROR | E_WARNING | E_PARSE); // evita que salgan mensajes noticiosos del código en el servidor provocando mala experiencia en el usuario.
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
session_start();
$banderaSenaA = false; // se inicia la bandera (banderaSenaA) en false que permitirá conocer si existe una seña para el primer valor
$nombre = $_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
$nombreCorto = explode(" ", $nombre);
$nombreCortoTam = count($nombreCorto);
$nombreCorto = $nombreCorto[0];
$noGuardo = 0; $pregunta=""; $respuesta=""; $retroalimentacion=""; $actividad=""; $modificado=0; $origen='';
if ($_POST) {
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $posicion = array_key_exists('posicion', $_POST) ? $_POST['posicion']+1 : null;
    $guardarCerrada = array_key_exists('guardarCerrada', $_POST) ? $_POST['guardarCerrada'] : null;
    $finalizarCerrada = array_key_exists('finalizarCerrada', $_POST) ? $_POST['finalizarCerrada'] : null;
    $respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
    $retroalimentacion = array_key_exists('retroalimentacion', $_POST) ? $_POST['retroalimentacion'] : null;
      $existente = array_key_exists('existente', $_POST) ? $_POST['existente'] : null;
        $idItem = array_key_exists('idItem', $_POST) ? $_POST['idItem'] : null;
        $modificado = array_key_exists('modificado', $_POST) ? $_POST['modificado'] : null;
        $ruta = array_key_exists('ruta', $_POST) ? $_POST['ruta'] : null;
        $origen = array_key_exists('origen', $_POST) ? $_POST['origen'] : '';

    //$guardarCerrada = $_POST['guardarCerrada'];
    //$finalizarCerrada = $_POST['finalizarCerrada'];
    //$respuesta = $_POST['respuesta'];
    $respuesta = quitar_tildes($respuesta);
    $respuesta = strtolower($respuesta);
    $respuesta = deEspacioAguion($respuesta); // llama función que convierte espacios por raya baja
    $restA = substr($respuesta, 0,1);  // Se toma el primer caracter del primer valor
    if (!ctype_alpha($restA)) { $restA = 'a'; }// si el primer caracter no es una letra del alfabeto (se excluye la ñ) entonces asigna la letra 'a' a este caracter con el fin de que no muestre un error y busque en esta carpeta en la de números (en caso de que sea número) y en alfabeto, y simplemente si no encentra muestra el mensaje
    $directorioA = 'lengua/'.$restA.'/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor a
    $directorioNum = 'lengua/numeros/';  // se elige el directorio con la carpeta numeros
    $directorioAlf = 'lengua/alfabeto/'; // se elige el directorio con la carpeta alfabeto
    $ficherosA  = scandir($directorioA); // Almacena en $ficherosA los archivos contenidos en $directorioA
    $ficherosNum  = scandir($directorioNum); // Almacena en $ficherosNum los archivos contenidos en el directorio de numeros
    $ficherosAlf  = scandir($directorioAlf); // Almacena en $ficherosAlf los archivos contenidos en el directorio de alfabeto
    if (in_array("".$respuesta.".jpg", $ficherosA)) { // si existe el archivo jpg con el nombre del valor uno en el fichero indicado la $banderaSenaA cambia a true es decir encontró la seña
        $banderaSenaA = true;
    }elseif (in_array("".$respuesta.".jpg", $ficherosNum)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de números la $banderaSenaA cambia a true es decir encontró la seña
        $banderaSenaA = true;
    }elseif (in_array("".$respuesta.".jpg", $ficherosAlf)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de alfabeto la $banderaSenaA cambia a true es decir encontró la seña
        $banderaSenaA = true;
    }
    $file_nameA=$respuesta;
    $msgA = validarSenaEscribir($banderaSenaA, $posicion);
    //$retroalimentacion = $_POST['retroalimentacion']; // se recibe la retroalimentación
    $retroalimentacion = str_replace("'", "", $retroalimentacion); // se reemplazan las comillas por barras inclinadas
    $retroalimentacion = str_replace("\"", "", $retroalimentacion); // se quitan las barras inclinadas de una cadena de texto
    if ($msgA != 'El sistema no cuenta con una seña para este valor, intenta insertando un valor diferente'){
        if ($retroalimentacion != null and $retroalimentacion != '') {// se insertan todas las opciones referentes a la actividad con id head a la tabla body
            InsertarHeadResponseCorrect($respuesta, $retroalimentacion);
            $fetch_SelectContent = listarHead(); #como sabe que el encabezado es el primero???? función listarItem es igual??
            $String = (string) $fetch_SelectContent['content'];
            $head_id = (integer) $fetch_SelectContent['id'];
            // se insertan todas las opciones referentes a la actividad con id head a la tabla body
            $boolean = TRUE;
            InsertarBodyRCorrect($head_id, $String);
            if ($head_id != null and $head_id != ''){// se insertan todas las opciones escritas a la tabla recourse_activity
                InsertRecourse($head_id, $id, $posicion);
            }
        }
        if ($guardarCerrada == null and $finalizarCerrada != null) {
            $pagina = "finalizar.php?titulo=$titulo&id=$id";
            header("location: $pagina");
        }
      
    }
}
if ($_POST){//para que otro post???

    if($posicion==null){ $posicion = posicionItem($id); }
    if($existente!=null && $modificado==0 && $origen==''){
        $dato = itemRecurso($idItem);
        $pregunta = $dato['pregunta'];
        $retroalimentacion = $dato['retroalimentacion'];
        $opciones = opciones($idItem);
        $respuesta = respuestaRecurso($idItem)['respuesta'];
    }else{
        $pregunta = array_key_exists('pregunta', $_POST) ? $_POST['pregunta'] : null;
        $respuesta = array_key_exists('respuesta', $_POST) ? $_POST['respuesta'] : null;
        $opciones = array_key_exists('respuestas1', $_POST) ? $_POST['respuestas1'] : null;
        $retroalimentacion = array_key_exists('retroalimentacion', $_POST) ? $_POST['retroalimentacion'] : null;
    }
    if($pregunta!=null && $respuesta!=null){
        if($existente!=null && $origen==''){
            if ($modificado!=0){
                modificarPregunta($idItem, $pregunta, $respuesta, $retroalimentacion, 1, $opciones, null, null);
                $noGuardo = 1;
            }
        }else{
            guardarPregunta($id, $pregunta, $respuesta, $retroalimentacion, 1, $opciones, null, null, $posicion);
            $noGuardo = 1;
        }
    }
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('ensenaloRC.twig.html');
echo $template->render(array('respuesta'=>$respuesta,'banderaSenaA'=>$banderaSenaA, 
    "msgA"=>$msgA,'nombreCorto'=>$nombreCorto, "titulo"=>$titulo, "rol"=>$idRol, 
    "pregunta"=>$pregunta, "opciones"=>$opciones, "respuesta"=>$respuesta, "posicion"=>$posicion, 
    "retroalimentacion"=>$retroalimentacion, "existente"=>$existente, "origen"=>$origen, 
    "id"=>$id, "noGuardo"=>$noGuardo, "idItem"=>$idItem, "actividad"=>$actividad, "modificado"=>$modificado));
?>
