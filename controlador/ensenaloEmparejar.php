<?php
require_once '../Twig/Autoloader.php'; session_start();
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
$banderaSenaA = false; // se inicia la bandera (banderaSenaA) en false que permitirá conocer si existe una seña para el primer valor
$banderaSenaB = false; // se inicia la bandera (banderaSenaB) en false que permitirá conocer si existe una seña para el segundo valor
$banderaSenaC = false; // se inicia la bandera (banderaSenaC) en false que permitirá conocer si existe una seña para el tercer valor
$nombre = $_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usu'];
$nombreCorto = explode(" ", $nombre); // separa el nombre por espacios, primer nombre, segundo nombre.
$nombreCorto = $nombreCorto[0]; // asigna a la variable $nombreCorto el primer nombre
$noGuardo = 0; $pregunta=""; $respuesta=""; $retroalimentacion=""; $actividad=""; $modificado=0; $origen=''; $msgA=''; $msgB=''; $msgC=''; $file_nameA = ''; $file_nameB = ''; $file_nameC = '';
if ($_POST){
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $existente = array_key_exists('existente', $_POST) ? $_POST['existente'] : null;
    $idItem = array_key_exists('idItem', $_POST) ? $_POST['idItem'] : null;
    $modificado = array_key_exists('modificado', $_POST) ? $_POST['modificado'] : null;
    $ruta = array_key_exists('ruta', $_POST) ? $_POST['ruta'] : null;
    $origen = array_key_exists('origen', $_POST) ? $_POST['origen'] : '';
    $posicion = array_key_exists('posicion', $_POST) ? $_POST['posicion'] : null;
    $guardarCerrada = array_key_exists('guardarCerrada', $_POST) ? $_POST['guardarCerrada'] : null;
    $finalizarCerrada = array_key_exists('finalizarCerrada', $_POST) ? $_POST['finalizarCerrada'] : null;
    $correct = array_key_exists('correct', $_POST) ? $_POST['correct'] : null;// se recibe la 
    $a = array_key_exists('a', $_POST) ? $_POST['a'] : null;// respuesta casilla a
    $b = array_key_exists('b', $_POST) ? $_POST['b'] : null;// resppuesta casilla b
    $c = array_key_exists('c', $_POST) ? $_POST['c'] : null;// respuesta casila c
    $uploadedfileA = array_key_exists('uploadedfileA', $_FILES) ? $_FILES['uploadedfileA'] : null;// archvivo A
    $uploadedfileB = array_key_exists('uploadedfileB', $_FILES) ? $_FILES['uploadedfileB'] : null;// archvivo B
    $uploadedfileC = array_key_exists('uploadedfileC', $_FILES) ? $_FILES['uploadedfileC'] : null;// archvivo c

    $retroalimentacion = array_key_exists('retroalimentacion', $_POST) ? $_POST['retroalimentacion'] : null;// se recibe la retroalimentación

    # condicional permite que no avance la posición si hubo un error, también que la primera vez es 1, las demás veces incremental.
    
    $responses = array(); // para almacenar las respuestas correctas
    $a = quitar_tildes($a); //quita todo tipo de tildes al valor de (a)
    $a = strtolower($a); // convierte el valor de (a) en minúscula
    $a = deEspacioAguion($a); // llama función que convierte espacios por raya baja
    $b = quitar_tildes($b); //quita todo tipo de tildes al valor de (b)
    $b = strtolower($b); // convierte el valor de (b) en minúscula
    $b = deEspacioAguion($b); // llama función que convierte espacios por raya baja  //$b = trim($b); 
    $c = quitar_tildes($c);  //quita todo tipo de tildes al valor de (c)
    $c = strtolower($c); // convierte el valor de (c) en minúscula
    $c = deEspacioAguion($c); // llama función que convierte espacios por raya baja  //$c = trim($c);
    $restA = substr($a, 0,1);  // Se toma el primer caracter del primer valor
    $restB = substr($b, 0,1);  // Se toma el primer caracter del segundo valor
    $restC = substr($c, 0,1);  // Se toma el primer caracter del tercer valor
// si el primer caracter no es una letra del alfabeto (se excluye la ñ) entonces asigna la letra 'a' a este caracter con el fin de que no muestre un error y busque en esta carpeta en la de números (en caso de que sea número) y en alfabeto, y simplemente si no encentra muestra el mensaje ctype_alpha(): Verifica si todos los caracteres entregados son alfabéticos.
// ---------------------------------------------------
    if (!ctype_alpha($restA)) { $restA = 'a'; }
    if (!ctype_alpha($restB)) { $restB = 'a'; }
    if (!ctype_alpha($restC)) { $restC = 'a'; }
// --------------------------------------------------
    $directorioA = 'lengua/'.$restA.'/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor a
    $directorioB = 'lengua/'.$restB.'/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor b
    $directorioC = 'lengua/'.$restC.'/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor c
    $directorioNum = 'lengua/numeros/';  // se elige el directorio con la carpeta numeros
    $directorioAlf = 'lengua/alfabeto/'; // se elige el directorio con la carpeta alfabeto
    $ficherosA  = scandir($directorioA); // Almacena en $ficherosA los archivos contenidos en $directorioA
    $ficherosB  = scandir($directorioB); // Almacena en $ficherosB los archivos contenidos en $directorioB
    $ficherosC  = scandir($directorioC); // Almacena en $ficherosC los archivos contenidos en $directorioC
    $ficherosNum  = scandir($directorioNum); // Almacena en $ficherosNum los archivos contenidos en el directorio de numeros
    $ficherosAlf  = scandir($directorioAlf); // Almacena en $ficherosAlf los archivos contenidos en el directorio de alfabeto
    if (in_array("".$a.".jpg", $ficherosA)) { $banderaSenaA = true; // si existe el archivo jpg con el nombre del valor uno en el fichero indicado la $banderaSenaA cambia a true es decir encontró la seña
    }elseif (in_array("".$a.".jpg", $ficherosNum)) { $banderaSenaA = true;// si existe el archivo jpg con el nombre del valor uno en el fichero de números la $banderaSenaA cambia a true es decir encontró la seña
    }elseif (in_array("".$a.".jpg", $ficherosAlf)) { $banderaSenaA = true;// si existe el archivo jpg con el nombre del valor uno en el fichero de alfabeto la $banderaSenaA cambia a true es decir encontró la seña
    }
    if (in_array("".$b.".jpg", $ficherosB)) { // si existe el archivo jpg con el nombre del valor uno en el fichero indicado la $banderaSenaB cambia a true es decir encontró la seña
        $banderaSenaB = true;
    }elseif (in_array("".$b.".jpg", $ficherosNum)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de números la $banderaSenaB cambia a true es decir encontró la seña
        $banderaSenaB = true;
    }elseif (in_array("".$b.".jpg", $ficherosAlf)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de alfabeto la $banderaSenaB cambia a true es decir encontró la seña
        $banderaSenaB = true;
    }
    if (in_array("".$c.".jpg", $ficherosC)) { // si existe el archivo jpg con el nombre del valor uno en el fichero indicado la $banderaSenaC cambia a true es decir encontró la seña
        $banderaSenaC = true;
    }elseif (in_array("".$c.".jpg", $ficherosNum)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de números la $banderaSenaC cambia a true es decir encontró la seña
        $banderaSenaC = true;
    }elseif (in_array("".$c.".jpg", $ficherosAlf)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de alfabeto la $banderaSenaC cambia a true es decir encontró la seña
        $banderaSenaC = true;
    }
    array_push($responses, $a); array_push($responses, $b); array_push($responses, $c);

    /**
    $file_name = recibe el nombre de la imágen
    $type = recibe el tipo de la imágen
    $tName = recibe el nombre temporal de la imágen
    $msg = recibe el mensaje luego invocar la función que mueve la imágen
    **/
    if($a!=null and $msgA == ''){
        $file_nameA=$a."_".$id;
        $uploadedfile_sizeA=$uploadedfileA['size']; // almacena en uploadedfile_sizeA el tamaño del archivo recibido
        $typeA = $uploadedfileA['type']; // almacena en typeA el tipo del archivo recibido
        $tNameA = $uploadedfileA['tmp_name']; // almacena en tNameA el nombre del archivo recibido
        $msgA = validarSenaeImagen($file_nameA, $uploadedfile_sizeA, $typeA, $tNameA, $banderaSenaA); //llama la función que valida si el valor y la imágen ingresados.

    }
    if($b!=null and $msgB == ''){
        $file_nameB=$b."_".$id;
        $uploadedfile_sizeB=$uploadedfileB['size'];
        $typeB = $uploadedfileB['type'];
        $tNameB = $uploadedfileB['tmp_name'];
        $msgB = validarSenaeImagen($file_nameB, $uploadedfile_sizeB, $typeB, $tNameB, $banderaSenaB); //llama la función que valida si el valor y la imágen ingresados.

    }
    if($c!=null  and $msgC == ''){
        $file_nameC=$c."_".$id;
        $uploadedfile_sizeC=$uploadedfileC['size'];
        $typeC = $uploadedfileC['type'];
        $tNameC = $uploadedfileC['tmp_name'];
        $msgC = validarSenaeImagen($file_nameC, $uploadedfile_sizeC, $typeC, $tNameC, $banderaSenaC); //llama la función que valida si el valor y la imágen ingresados.

    }
    $title = $titulo."_".($posicion);

if ($file_nameA != null and $file_nameB != null and $file_nameC != null and $file_nameA != '' and $file_nameB != '' and $file_nameC != '') {
    # code...
    $rutaImagenA = rutaImagen($file_nameA);
    $rutaImagenB = rutaImagen($file_nameB);
    $rutaImagenC = rutaImagen($file_nameC);
    $arrayImage = array($rutaImagenA, $rutaImagenB, $rutaImagenC);

}
    

    $retroalimentacion = str_replace("'", "\"", $retroalimentacion);  // se reemplazan las comillas por barras inclinadas
    $retroalimentacion = addslashes($retroalimentacion); // se quitan las barras inclinadas de una cadena de texto
    if ($msgA == null and $msgA == '' and $msgB == null and $msgB == '' and $msgC == null and $msgC == '' and $retroalimentacion != null and $retroalimentacion != '' and $a != null and $a != '' and $b != null and $b != '' and $c != null and $c != ''){
        if ($retroalimentacion != null and $retroalimentacion != '') {
            $max = sizeof($responses);
            // se insertan todas las opciones escritas a la tabla head
            InsertarHeadEmparejar($title, $retroalimentacion); $i=0;
            while ($i < $max) {
                // se insertan todas las opciones referentes a la actividad con id head a la tabla body
                $fetch_SelectContent = listarHeadEmparejar();
                $String = (string) $fetch_SelectContent['content'];
                $head_id = (integer) $fetch_SelectContent['id'];
                if ($head_id != 0){ InsertarBodyEmparejar($head_id, $responses[$i], $arrayImage[$i]); }
                $i++;
            }
            if ($head_id != null and $head_id != ''){ InsertRecourse($head_id, $id, $posicion); } // se insertan todas las opciones escritas a la tabla recourse_activity
        }
        if ($guardarCerrada == null and $finalizarCerrada != null) {
            $pagina = "finalizar.php?titulo=$titulo&id=$id";
            header("location: $pagina");
        }
    }
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

$posicion = numHeadByRecourse($id);
    if ($posicion == 0) {
        $posicion = 1;
    }
    else{
        $posicion+=1;
    }
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('ensenaloEmp.twig.html');
echo $template->render(array('a'=>$a,'b'=>$b,'c'=>$c,'banderaSenaA'=>$banderaSenaA,'banderaSenaB'=>$banderaSenaB,'banderaSenaC'=>$banderaSenaC,'nombreCorto'=>$nombreCorto,"msgA"=>$msgA,"msgB"=>$msgB,"msgC"=>$msgC,"titulo"=>$titulo, "rol"=>$idRol, "pregunta"=>$pregunta, "opciones"=>$opciones,
    "respuesta"=>$respuesta, "posicion"=>$posicion, "retroalimentacion"=>$retroalimentacion, "existente"=>$existente,  "origen"=>$origen, "id"=>$id, "noGuardo"=>$noGuardo, "idItem"=>$idItem, "actividad"=>$actividad, "modificado"=>$modificado));
?>