<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array('cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
session_start();
$nombre = $_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
if ($nombre==null) { include("cierre.php");}
$nombreCorto = explode(" ", $nombre);
$nombreCortoTam = count($nombreCorto);
//echo($nombreCorto);
$nombreCorto2 = $nombreCorto[0]." ".$nombreCorto[1];
$nombreCorto1 = $nombreCorto[0];

if ($nombreCortoTam < 4) {
    # code...
    $nombreCorto2 = $nombreCorto[0];
}

if ($_POST) {
    //$retroalimentacion = $_POST['retroalimentacion'];
    //$guardo = "INSERT into head values (default,'$respuesta',null,'$retroalimentacion',9,1)";
    //$exe_Guardo = pg_query($guardo);
    //$fetch_Guardo = pg_fetch_array($exe_Guardo);
}


if ($_POST){
    $titulo = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $_SESSION['titulo'] = $titulo;
    $_SESSION['id'] = $id;
    $description = $_SESSION['description'];
}


$idUsuario = $_SESSION['id_usu'];
$know = listarAreas(); $need = listaNeed();
$listaKnow = ""; $listaNeed = ""; $estados=''; $title=""; $idItem=0; $siguiente='0'; $actividad=""; $ruta=""; $idRecurso=0; $datosRE=""; $listaEstado=""; $existente='0';

/*
if ($_GET){
    $idRecurso = array_key_exists('id', $_GET) ? $_GET['id'] : null;
    $datosRE = datosRE($idRecurso);
    #$datoSiguiente = definirUrl($idRecurso, null);
    $actividad = "listarItems.php";#$datoSiguiente['url'];
    #$idItem = $datoSiguiente['id'];
    $title = $datosRE['title'];
    $estados = listarEstados();
}
if($estados!=''){
    foreach ($estados as $value){
        $listaEstado .= "<option value='".$value['id'];
        if ($value['id']==$datosRE['reference_condition_id']) {$listaEstado .= "' selected='selected";}
        $listaEstado .= "'>".$value['name']."</option>";
    }
}
foreach ($know as $value){
    $listaKnow .= "<option value='".$value['id'];
    if($datosRE!=""){if ($value['id']==$datosRE['reference_area_knowledge_id']) {$listaKnow .= "' selected='selected";}}
    $listaKnow .= "'>".$value['name']."</option>";
}
foreach ($need as $value){
    $listaNeed .= "<option value='".$value['id'];
    if($datosRE!=""){if ($value['id']==$datosRE['reference_need_id']) {$listaNeed .= "' selected='selected";}}
    $listaNeed .= "'>".$value['name']."</option>";
}
if ($_POST){
    $title = array_key_exists('title', $_POST) ? $_POST['title'] : null;
    $description = array_key_exists('description', $_POST) ? $_POST['description'] : null;
    $category = array_key_exists('category', $_POST) ? $_POST['category'] : null;
    $need = array_key_exists('need', $_POST) ? $_POST['need'] : null;
    $ruta = array_key_exists('ruta', $_POST) ? $_POST['ruta'] : null;
    $estado = array_key_exists('estado', $_POST) ? $_POST['estado'] : null;
    $existente = array_key_exists('existente', $_POST) ? $_POST['existente'] : null;
    $idRecurso = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $actividad = array_key_exists('actividad', $_POST) ? $_POST['actividad'] : null;
    #$idItem = array_key_exists('idItem', $_POST) ? $_POST['idItem'] : null;
    if($existente=='0'){
        $idRecurso = crearRecurso($title, $description, $category, $need, $estado, $idUsuario);
        $siguiente='1';
    }else{
        $idRecurso = updateRecurso($title, $description, $category, $need, $estado, $idRecurso);
        $siguiente='1';
    }
}

*/
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('traductor.twig.html');
echo $template->render(array('know' => $listaKnow, 'rol' => $idRol, 'existente'=>$existente,
    'siguiente'=>$siguiente,'nombreCorto2'=>$nombreCorto2,'nombreCorto'=>$nombreCorto1, 'actividad'=>$actividad, 'estado'=>$listaEstado,
    'need' => $listaNeed, 'datosRE'=>$datosRE, 'ruta'=>$ruta, 'id'=>$idRecurso,
    'titulo'=>$title, 'idItem'=>$idItem));
?>
