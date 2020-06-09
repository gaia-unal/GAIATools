<?php
/**
 * Plugin  : Autocompletar con jQuery
 *   Autor : Lucas Forchino
 * WebSite : http://www.tutorialjquery.com
 * version : 1.0
 * Licencia: Pueden usar libremenete este código siempre y cuando no sea para 
 *           publicarlo como ejemplo de autocompletar en otro sitio.
 */

// limpio la palabra que se busca
$search= trim($_GET['search']);

// la busco 
$result= search($search);

// seteo la cabecera como json
header('Content-type: application/json; charset=utf-8');

//imprimo el resultado como un json
echo json_encode($result);


/**
 *  Funcion que busca en los datos un resultado  que tenga que ver
 *  con la busqueda, si los datos vinieran de base no seria necesario esto
 *  ya que lo podriamos resolver directamente por sql
 */
function search($searchWord)
{
    $tmpArray=array();
    /**
     * Obtengo los datos almacenados en el array
     */
    if ($searchWord != null) {

    $data=getData();
    
    /*
     * Recorro el array para ver si hay palabras que empiecen con lo que viene
     * por parametros
     */
    foreach($data as $word)
    {
        // obtengo el tamaño de la palabra que se busca.
        $searchWordSize=strlen($searchWord);
        // corto la palabra que viene del array y la dejo del mismo tamaño que 
        // la que se busca de manera de poder comparar.
        $tmpWord=substr($word, 0,$searchWordSize);
        // si son iguales la guardo para devolverla
        if (strtolower($tmpWord) == strtolower($searchWord))
        {
            // guardo la palabra original sin cortar.
            $tmpArray[]=$word;
        }
    }
    
    return $tmpArray;
}
}


/**
 * Retorna los datos, podria ser una base de datos
 * para simplificar solo hice esta funcion que devuelve
 * un array ordenado
 */
function getData()
{


    $result=array();


    $directorioA = 'lengua/a/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor a
    $directorioB = 'lengua/b/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor B
    $directorioC = 'lengua/c/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valorC
    $directorioD = 'lengua/d/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valorD
    $directorioE = 'lengua/e/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor E
    $directorioF = 'lengua/f/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor F
    $directorioG = 'lengua/g/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor G
    $directorioH = 'lengua/h/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor H
    $directorioI = 'lengua/i/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor I
    $directorioJ = 'lengua/j/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor J
    $directorioK = 'lengua/k/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor K
    $directorioL = 'lengua/l/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor L
    $directorioM = 'lengua/m/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor M
    $directorioN = 'lengua/n/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor N
    $directorioO = 'lengua/o/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor O
    $directorioP = 'lengua/p/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor P
    $directorioQ = 'lengua/q/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor Q
    $directorioR = 'lengua/r/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor R
    $directorioS = 'lengua/s/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor S
    $directorioT = 'lengua/t/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor T
    $directorioU = 'lengua/u/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor U
    $directorioV = 'lengua/v/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor V
    $directorioW = 'lengua/w/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor W
    $directorioX = 'lengua/x/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor X
    $directorioY = 'lengua/y/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor Y
    $directorioZ = 'lengua/z/'; // se elige el directorio con la carpeta cuyo nombre empieza con la primer letra del valor Z
    $directorioNum = 'lengua/numeros/';  // se elige el directorio con la carpeta numeros
    $directorioAlf = 'lengua/alfabeto/'; // se elige el directorio con la carpeta alfabeto

    $ficherosA  = scandir($directorioA); // Almacena en $ficherosA los archivos contenidos en $directorioA
    $ficherosB  = scandir($directorioB); // Almacena en $ficherosA los archivos contenidos en $directorioB
    $ficherosC  = scandir($directorioC); // Almacena en $ficherosA los archivos contenidos en $directorioC
    $ficherosD  = scandir($directorioD); // Almacena en $ficherosA los archivos contenidos en $directorioD
    $ficherosE  = scandir($directorioE); // Almacena en $ficherosA los archivos contenidos en $directorioE
    $ficherosF  = scandir($directorioF); // Almacena en $ficherosA los archivos contenidos en $directorioF
    $ficherosG  = scandir($directorioG); // Almacena en $ficherosA los archivos contenidos en $directorioG
    $ficherosH  = scandir($directorioH); // Almacena en $ficherosA los archivos contenidos en $directorioH
    $ficherosI  = scandir($directorioI); // Almacena en $ficherosA los archivos contenidos en $directorioI
    $ficherosJ  = scandir($directorioJ); // Almacena en $ficherosA los archivos contenidos en $directorioJ
    $ficherosK  = scandir($directorioK); // Almacena en $ficherosA los archivos contenidos en $directorioK
    $ficherosL  = scandir($directorioL); // Almacena en $ficherosA los archivos contenidos en $directorioL
    $ficherosM  = scandir($directorioM); // Almacena en $ficherosA los archivos contenidos en $directorioM
    $ficherosN  = scandir($directorioN); // Almacena en $ficherosA los archivos contenidos en $directorioN
    $ficherosO  = scandir($directorioO); // Almacena en $ficherosA los archivos contenidos en $directorioO
    $ficherosP  = scandir($directorioP); // Almacena en $ficherosA los archivos contenidos en $directorioP
    $ficherosQ  = scandir($directorioQ); // Almacena en $ficherosA los archivos contenidos en $directorioQ
    $ficherosR  = scandir($directorioR); // Almacena en $ficherosA los archivos contenidos en $directorioR
    $ficherosS  = scandir($directorioS); // Almacena en $ficherosA los archivos contenidos en $directorioS
    $ficherosT  = scandir($directorioT); // Almacena en $ficherosA los archivos contenidos en $directorioT
    $ficherosU  = scandir($directorioU); // Almacena en $ficherosA los archivos contenidos en $directorioU
    $ficherosV  = scandir($directorioV); // Almacena en $ficherosA los archivos contenidos en $directorioV
    $ficherosW  = scandir($directorioW); // Almacena en $ficherosA los archivos contenidos en $directorioW
    $ficherosX  = scandir($directorioX); // Almacena en $ficherosA los archivos contenidos en $directorioX
    $ficherosY  = scandir($directorioY); // Almacena en $ficherosA los archivos contenidos en $directorioY
    $ficherosZ  = scandir($directorioZ); // Almacena en $ficherosA los archivos contenidos en $directorioZ
    $ficherosNum  = scandir($directorioNum); // Almacena en $ficherosA los archivos contenidos en $directorioZ
    $ficherosAlf  = scandir($directorioAlf); // Almacena en $ficherosA los archivos contenidos en $directorioZ


    foreach ($ficherosA as $valor) {
        $newphraseA = reemplazosDirectorio($valor);
        if ($newphraseA != '.' and $newphraseA != '..') {
            array_push($result, $newphraseA);
        }
    }
    foreach ($ficherosB as $valor) {
        $newphraseB = reemplazosDirectorio($valor);
        if ($newphraseB != '.' and $newphraseB != '..') {
            array_push($result, $newphraseB);
        }
    }
    foreach ($ficherosC as $valor) {
        $newphraseC = reemplazosDirectorio($valor);
        if ($newphraseC != '.' and $newphraseC != '..') {
            array_push($result, $newphraseC);
        }
    }
    foreach ($ficherosD as $valor) {
        $newphraseD = reemplazosDirectorio($valor);
        if ($newphraseD != '.' and $newphraseD != '..') {
            array_push($result, $newphraseD);
        }
    }
    foreach ($ficherosE as $valor) {
        $newphraseE = reemplazosDirectorio($valor);
        if ($newphraseE != '.' and $newphraseE != '..') {
            array_push($result, $newphraseE);
        }
    }
    foreach ($ficherosF as $valor) {
        $newphraseF = reemplazosDirectorio($valor);
        if ($newphraseF != '.' and $newphraseF != '..') {
            array_push($result, $newphraseF);
        }
    }
    foreach ($ficherosG as $valor) {
        $newphraseG = reemplazosDirectorio($valor);
        if ($newphraseG != '.' and $newphraseG != '..') {
            array_push($result, $newphraseG);
        }
    }
    foreach ($ficherosH as $valor) {
        $newphraseH = reemplazosDirectorio($valor);
        if ($newphraseH != '.' and $newphraseH != '..') {
            array_push($result, $newphraseH);
        }
    }
    foreach ($ficherosI as $valor) {
        $newphraseI = reemplazosDirectorio($valor);
        if ($newphraseI != '.' and $newphraseI != '..') {
            array_push($result, $newphraseI);
        }
    }
    foreach ($ficherosJ as $valor) {
        $newphraseJ = reemplazosDirectorio($valor);
        if ($newphraseJ != '.' and $newphraseJ != '..') {
            array_push($result, $newphraseJ);
        }
    }
    foreach ($ficherosK as $valor) {
        $newphraseK = reemplazosDirectorio($valor);
        if ($newphraseK != '.' and $newphraseK != '..') {
            array_push($result, $newphraseK);
        }
    }
    foreach ($ficherosL as $valor) {
        $newphraseL = reemplazosDirectorio($valor);
        if ($newphraseL != '.' and $newphraseL != '..') {
            array_push($result, $newphraseL);
        }
    }
    foreach ($ficherosM as $valor) {
        $newphraseM = reemplazosDirectorio($valor);
        if ($newphraseM != '.' and $newphraseM != '..') {
            array_push($result, $newphraseM);
        }
    }
    foreach ($ficherosN as $valor) {
        $newphraseN = reemplazosDirectorio($valor);
        if ($newphraseN != '.' and $newphraseN != '..') {
            array_push($result, $newphraseN);
        }
    }
    foreach ($ficherosO as $valor) {
        $newphraseO = reemplazosDirectorio($valor);
        if ($newphraseO != '.' and $newphraseO != '..') {
            array_push($result, $newphraseO);
        }
    }
    foreach ($ficherosP as $valor) {
        $newphraseP = reemplazosDirectorio($valor);
        if ($newphraseP != '.' and $newphraseP != '..') {
            array_push($result, $newphraseP);
        }
    }
    foreach ($ficherosQ as $valor) {
        $newphraseQ = reemplazosDirectorio($valor);
        if ($newphraseQ != '.' and $newphraseQ != '..') {
            array_push($result, $newphraseQ);
        }
    }
    foreach ($ficherosR as $valor) {
        $newphraseR = reemplazosDirectorio($valor);
        if ($newphraseR != '.' and $newphraseR != '..') {
            array_push($result, $newphraseR);
        }
    }
    foreach ($ficherosS as $valor) {
        $newphraseS = reemplazosDirectorio($valor);
        if ($newphraseS != '.' and $newphraseS != '..') {
            array_push($result, $newphraseS);
        }
    }
    foreach ($ficherosT as $valor) {
        $newphraseT = reemplazosDirectorio($valor);
        if ($newphraseS != '.' and $newphraseS != '..') {
            array_push($result, $newphraseS);
        }
    }
    foreach ($ficherosU as $valor) {
        $newphraseU = reemplazosDirectorio($valor);
        if ($newphraseU != '.' and $newphraseU != '..') {
            array_push($result, $newphraseU);
        }
    }
    foreach ($ficherosV as $valor) {
        $newphraseV = reemplazosDirectorio($valor);
        if ($newphraseV != '.' and $newphraseV != '..') {
            array_push($result, $newphraseV);
        }
    }
    foreach ($ficherosW as $valor) {
        $newphraseW = reemplazosDirectorio($valor);
        if ($newphraseW != '.' and $newphraseW != '..') {
            array_push($result, $newphraseW);
        }
    }
    foreach ($ficherosX as $valor) {
        $newphraseX = reemplazosDirectorio($valor);
        if ($newphraseX != '.' and $newphraseX != '..') {
            array_push($result, $newphraseX);
        }
    }
    foreach ($ficherosY as $valor) {
        $newphraseY = reemplazosDirectorio($valor);
        if ($newphraseY != '.' and $newphraseY != '..') {
            array_push($result, $newphraseY);
        }
    }
    foreach ($ficherosZ as $valor) {
        $newphraseZ = reemplazosDirectorio($valor);
        if ($newphraseZ != '.' and $newphraseZ != '..') {
            array_push($result, $newphraseZ);
        }
    }
    foreach ($ficherosNum as $valor) {
        $newphraseNum = reemplazosDirectorio($valor);
        if ($newphraseNum != '.' and $newphraseNum != '..') {
            array_push($result, $newphraseNum);
        }
    }
    foreach ($ficherosAlf as $valor) {
        $newphraseAlf = reemplazosDirectorio($valor);
        if ($newphraseAlf != '.' and $newphraseAlf != '..') {
            array_push($result, $newphraseAlf);
        }
    }

    
    asort($result);
    return $result;
}

function reemplazosDirectorio($phrase){
        $newphrase = str_replace('.jpg', '', $phrase);
        $newphrase = str_replace('n-', 'ñ', $newphrase);
        $newphrase = str_replace('_', ' ', $newphrase);
        $newphrase = strtolower ($newphrase);
        return($newphrase);
}