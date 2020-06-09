<?php
require_once '../Twig/Autoloader.php';
#error_reporting(E_ERROR | E_WARNING | E_PARSE);// evita que salgan mensajes noticiosos del código en el servidor provocando mala experiencia en el usuario.

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");

session_start();
$banderaSenaA = false; // se inicia la bandera (banderaSenaA) en false que permitirá conocer si existe una seña para el primer valor
$banderaSenaB = false; // se inicia la bandera (banderaSenaB) en false que permitirá conocer si existe una seña para el segundo valor
$banderaSenaC = false; // se inicia la bandera (banderaSenaC) en false que permitirá conocer si existe una seña para el tercer valor
$banderaSenaD = false; // se inicia la bandera (banderaSenaD) en false que permitirá conocer si existe una seña para el cuarto valor
$nombre = $_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usu'];
$nombreCorto = explode(" ", $nombre);
$nombreCortoTam = count($nombreCorto);

$nombreCorto = $nombreCorto[0];
$noGuardo = 0; $pregunta=""; $respuesta=""; $retroalimentacion=""; $actividad=""; $modificado=0; $origen=''; $guardarCerrada=''; $msgA=''; $msgB=''; $msgC=''; $msgD='';

if ($_POST){
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $existente = array_key_exists('existente', $_POST) ? $_POST['existente'] : null;
    $idItem = array_key_exists('idItem', $_POST) ? $_POST['idItem'] : null;
    $modificado = array_key_exists('modificado', $_POST) ? $_POST['modificado'] : null;
    $ruta = array_key_exists('ruta', $_POST) ? $_POST['ruta'] : null;
    $origen = array_key_exists('origen', $_POST) ? $_POST['origen'] : '';
    $posicion = array_key_exists('posicion', $_POST) ? $_POST['posicion']+1 : null;
    $guardarCerrada = array_key_exists('guardarCerrada', $_POST) ? $_POST['guardarCerrada'] : null;
    $finalizarCerrada = array_key_exists('finalizarCerrada', $_POST) ? $_POST['finalizarCerrada'] : null;
    $correct = array_key_exists('correct', $_POST) ? $_POST['correct'] : null;// se recibe la 
    $a = array_key_exists('a', $_POST) ? $_POST['a'] : null;// respuesta casilla a
    $b = array_key_exists('b', $_POST) ? $_POST['b'] : null;// resppuesta casilla b
    $c = array_key_exists('c', $_POST) ? $_POST['c'] : null;// respuesta casila c
    $d = array_key_exists('d', $_POST) ? $_POST['d'] : null;// respuesta casila d
    $uploadedfileA = array_key_exists('uploadedfileA', $_FILES) ? $_FILES['uploadedfileA'] : null;// archvivo A
    $uploadedfileB = array_key_exists('uploadedfileB', $_FILES) ? $_FILES['uploadedfileB'] : null;// archvivo B
    $uploadedfileC = array_key_exists('uploadedfileC', $_FILES) ? $_FILES['uploadedfileC'] : null;// archvivo c
    $uploadedfileD = array_key_exists('uploadedfileD', $_FILES) ? $_FILES['uploadedfileD'] : null;// archvivo D
    $retroalimentacion = array_key_exists('retroalimentacion', $_POST) ? $_POST['retroalimentacion'] : null;


    
    //$guardarCerrada = $_POST['guardarCerrada'];
    //$finalizarCerrada = $_POST['finalizarCerrada'];

    $falsas = array();
    //$correct = $_POST['correct'];
    //$a= $_POST['a'];
    $a = quitar_tildes($a);
    $a = strtolower($a);
    $a = trim($a); 
    //$b= $_POST['b'];
    $b = quitar_tildes($b);
    $b = strtolower($b);
    $b = trim($b); 
    //$c= $_POST['c'];
    $c = quitar_tildes($c);
    $c = strtolower($c);
    $c = trim($c);
    //$d= $_POST['d'];
    $d = quitar_tildes($d);
    $d = strtolower($d);
    $d = trim($d);

    $restA = substr($a, 0,1);  // Se toma el primer caracter del primer valor
    $restB = substr($b, 0,1);  // Se toma el primer caracter del segundo valor
    $restC = substr($c, 0,1);  // Se toma el primer caracter del tercer valor
    $restD = substr($d, 0,1);  // Se toma el primer caracter del cuarto valor

    // si el primer caracter no es una letra del alfabeto (se excluye la ñ) entonces asigna la letra 'a' a este caracter con el fin de que no muestre un error y busque en esta carpeta en la de números (en caso de que sea número) y en alfabeto, y simplemente si no encentra muestra el mensaje
// ---------------------------------------------------
         if (!ctype_alpha($restA)) { 
            $restA = 'a';
        }
         if (!ctype_alpha($restB)) {
            $restB = 'a';
        }
         if (!ctype_alpha($restC)) {
            $restC = 'a';
        }
        if (!ctype_alpha($restD)) {
            $restD = 'a';
        }
// --------------------------------------------------

    $directorioA = 'lengua/'.$restA.'/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor a
    $directorioB = 'lengua/'.$restB.'/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor b
    $directorioC = 'lengua/'.$restC.'/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor c
    $directorioD = 'lengua/'.$restD.'/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor d

    $directorioNum = 'lengua/numeros/';  // se elige el directorio con la carpeta numeros
    $directorioAlf = 'lengua/alfabeto/'; // se elige el directorio con la carpeta alfabeto

    $ficherosA  = scandir($directorioA); // Almacena en $ficherosA los archivos contenidos en $directorioA
    $ficherosB  = scandir($directorioB); // Almacena en $ficherosB los archivos contenidos en $directorioB
    $ficherosC  = scandir($directorioC); // Almacena en $ficherosC los archivos contenidos en $directorioC
    $ficherosD  = scandir($directorioD); // Almacena en $ficherosC los archivos contenidos en $directorioD

    $ficherosNum  = scandir($directorioNum); // Almacena en $ficherosNum los archivos contenidos en el directorio de numeros
    $ficherosAlf  = scandir($directorioAlf); // Almacena en $ficherosAlf los archivos contenidos en el directorio de alfabeto
    $arrayImageT = array();
    $arrayImageF = array();

    if (in_array("".$a.".jpg", $ficherosA)) { // si existe el archivo jpg con el nombre del valor uno en el fichero indicado la $banderaSenaA cambia a true es decir encontró la seña
        $banderaSenaA = true;
    }elseif (in_array("".$a.".jpg", $ficherosNum)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de números la $banderaSenaA cambia a true es decir encontró la seña
        $banderaSenaA = true;
    }elseif (in_array("".$a.".jpg", $ficherosAlf)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de alfabeto la $banderaSenaA cambia a true es decir encontró la seña
        $banderaSenaA = true;
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
    }
    elseif (in_array("".$c.".jpg", $ficherosAlf)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de alfabeto la $banderaSenaC cambia a true es decir encontró la seña
        $banderaSenaC = true;
    }
    if (in_array("".$d.".jpg", $ficherosD)) { // si existe el archivo jpg con el nombre del valor uno en el fichero indicado la $banderaSenaD cambia a true es decir encontró la seña
        $banderaSenaD = true;
    }elseif (in_array("".$d.".jpg", $ficherosNum)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de números la $banderaSenaD cambia a true es decir encontró la seña
        $banderaSenaD = true;
    }elseif (in_array("".$d.".jpg", $ficherosAlf)) { // si existe el archivo jpg con el nombre del valor uno en el fichero de alfabeto la $banderaSenaD cambia a true es decir encontró la seña
        $banderaSenaD = true;
    }

    // si $correct == es igual a alguna de las variables se almacena en $respuestaCorrect
    if ($correct == 'a'){
        $respuestaCorrect = $a;
        $file_nameA=$respuestaCorrect."_".$id;
        $file_nameA = rutaImagen($file_nameA);
        array_push($arrayImageT, $file_nameA);
    }else {
        array_push($falsas, $a);
        $file_nameA=$a."_".$id;
        $file_nameA = rutaImagen($file_nameA);
        array_push($arrayImageF, $file_nameA);
    }
    if ($correct == 'b') {
        $respuestaCorrect = $b;
        $file_nameB=$respuestaCorrect."_".$id;
        $file_nameB = rutaImagen($file_nameB);
        array_push($arrayImageT, $file_nameB);
    }else{
        array_push($falsas, $b);
        $file_nameB=$b."_".$id;
        $file_nameB = rutaImagen($file_nameB);
        array_push($arrayImageF, $file_nameB);
    }
    if ($correct == 'c') {
        $respuestaCorrect = $c;
        $file_nameC=$respuestaCorrect."_".$id;
        $file_nameC = rutaImagen($file_nameC);
        array_push($arrayImageT, $file_nameC);
    }else{
        array_push($falsas, $c);
        $file_nameC=$c."_".$id;
        $file_nameC = rutaImagen($file_nameC);
        array_push($arrayImageF, $file_nameC);
    }
    if ($correct == 'd') {
        $respuestaCorrect = $d;
        $file_nameD=$respuestaCorrect."_".$id;
        $file_nameD = rutaImagen($file_nameD);
        array_push($arrayImageT, $file_nameD);
    }else {
        array_push($falsas, $d);
        $file_nameD=$d."_".$id;
        $file_nameD = rutaImagen($file_nameD);
        array_push($arrayImageF, $file_nameD);
    }

    /**
    $file_name = recibe el nombre de la imágen
    $type = recibe el tipo de la imágen
    $tName = recibe el nombre temporal de la imágen
    $msg = recibe el mensaje luego invocar la función que mueve la imágen
    **/
    if($a!=null and $msgA == ''){
    $file_nameA=$a."_".$id;
    $uploadedfile_sizeA=$uploadedfileA['size'];
    $typeA = $uploadedfileA['type'];
    $tNameA = $uploadedfileA['tmp_name'];
    $msgA = validarSenaeImagen($file_nameA, $uploadedfile_sizeA, $typeA, $tNameA, $banderaSenaA);
    }

    if($b!=null and $msgB == ''){
    $file_nameB=$b."_".$id;
    $uploadedfile_sizeB=$uploadedfileB['size'];
    $typeB = $uploadedfileB['type'];
    $tNameB = $uploadedfileB['tmp_name'];
    $msgB = validarSenaeImagen($file_nameB, $uploadedfile_sizeB, $typeB, $tNameB, $banderaSenaB);
    }   

    if($c!=null and $msgC == ''){
    $file_nameC=$c."_".$id;
    $uploadedfile_sizeC=$uploadedfileC['size'];
    $typeC = $uploadedfileC['type'];
    $tNameC = $uploadedfileC['tmp_name'];
    $msgC = validarSenaeImagen($file_nameC, $uploadedfile_sizeC, $typeC, $tNameC, $banderaSenaC);
    }

    if($d!=null and $msgD == ''){
    $file_nameD=$d."_".$id;
    $uploadedfile_sizeD=$uploadedfileD['size'];
    $typeD = $uploadedfileD['type'];
    $tNameD = $uploadedfileD['tmp_name'];
    $msgD = validarSenaeImagen($file_nameD, $uploadedfile_sizeD, $typeD, $tNameD, $banderaSenaD);
    }      




    //$retroalimentacion = $_POST['retroalimentacion']; // se recibe la retroalimentación
    $retroalimentacion = str_replace("'", "", $retroalimentacion);  // se reemplazan las comillas por barras inclinadas
    $retroalimentacion = str_replace("\"", "", $retroalimentacion); // se quitan las barras inclinadas de una cadena de texto
    if ($msgA == null and $msgA == '' and $msgB == null and $msgB == '' and $msgC == null and $msgC == '' and $msgD == null and $msgD == '' and $retroalimentacion != null and $retroalimentacion != '' and $a != null and $a != '' and $b != null and $b != '' and $c != null and $c != '' and $d != null and $d != ''){

    if ($retroalimentacion != null and $retroalimentacion != '') {

    // se insertan todas las opciones referentes a la actividad con id head a la tabla body
    InsertarHeadOptionCorrect($respuestaCorrect, $retroalimentacion);

    $fetch_SelectContent = listarHead();

    $Stringvalue = (string) $fetch_SelectContent['content'];
    $head_id = (integer) $fetch_SelectContent['id'];
    // se insertan todas las opciones referentes a la actividad con id head a la tabla body
    InsertarBodyOCCorrect($head_id, $Stringvalue, $arrayImageT[0]);
    

    $max = sizeof($falsas);

    $i=0;
    while ($i < $max) {
        // se insertan todas las opciones escritas a la tabla head
        $boolean = 'FALSE';
        InsertarBodyOCCorrectFalsas($head_id, $falsas[$i], $arrayImageF[$i]);
        
        $i++;

    }
    if ($head_id != null and $head_id != ''){
        // se insertan todas las opciones escritas a la tabla recourse_activity
        InsertRecourse($head_id, $id, $posicion);
    }
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
$template = $twig->loadTemplate('ensenaloOC.twig.html');
echo $template->render(array('a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d,'banderaSenaA'=>$banderaSenaA,'banderaSenaB'=>$banderaSenaB,'banderaSenaC'=>$banderaSenaC, 'banderaSenaD'=>$banderaSenaD, 'nombreCorto'=>$nombreCorto, "msgA"=>$msgA,"msgB"=>$msgB,"msgC"=>$msgC,"msgD"=>$msgD,"titulo"=>$titulo, "rol"=>$idRol, "pregunta"=>$pregunta, "opciones"=>$opciones,
    "respuesta"=>$respuesta, "posicion"=>$posicion, "retroalimentacion"=>$retroalimentacion, "existente"=>$existente,  "origen"=>$origen,
    "id"=>$id, "noGuardo"=>$noGuardo, "idItem"=>$idItem, "actividad"=>$actividad, "modificado"=>$modificado));
?>
<?php
function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

?>
