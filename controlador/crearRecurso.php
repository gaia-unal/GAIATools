<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array('cache' => 'cache', 'debug' => 'true'));	
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
session_start();
$nombre = $_SESSION['nombre']; $idRol = $_SESSION['id_rol']; $idUsuario = $_SESSION['id_usu'];
if ($nombre==null) { include("cierre.php");}
$know = listarAreas(); $need = listaNeed(); $areasReprod=""; $needReprod=""; $listaSubKnow=""; $areaConocimiento=0;
$listaKnow = ""; $category=""; $listaNeed = ""; $estados=''; $title=""; $idItem=0; $siguiente='0'; $actividad=""; $ruta=""; $idRecurso=0; $datosRE=""; $listaEstado=""; $existente='0'; 
if ($_GET){
    $idRecurso = array_key_exists('id', $_GET) ? $_GET['id'] : null;
    $datosRE = datosRE($idRecurso);
    $areaConocimiento = idKnowledge($datosRE['reference_area_knowledge_id']);
    #$datoSiguiente = definirUrl($idRecurso, null);
    $actividad = "listarItems.php";#$datoSiguiente['url'];
    #$idItem = $datoSiguiente['id'];
    $title = $datosRE['title'];
    $estados = listarEstados();
    $subAreas = listarSubareas($areaConocimiento);
    $clase=0;
    foreach ($subAreas as $value){
        #$clase = normalizePhp($value['name']);
        $clase++;
        $listaSubKnow .= "<option value='".$value['id']."' class='".$clase;
        if($datosRE!=""){
            if ($value['id']==$datosRE['reference_area_knowledge_id']) {
                $listaSubKnow .= "' selected='selected";
            }
        }
        $listaSubKnow .= "'>".$value['name']."</option>";
        $areasReprod .= "Opción: ".$clase.".  ".rtrim($value['name']).", ";
    }
}
if($estados!=''){
    foreach ($estados as $value){
        $listaEstado .= "<option value='".$value['id'];
        if ($value['id']===$datosRE['reference_condition_id']) {$listaEstado .= "' selected='selected";}
        $listaEstado .= "'>".$value['name']."</option>";
    }
}
    #$listaKnow .="<option>Seleccionar...</option>";
$clase=0;
foreach ($know as $value){
    #$clase = normalizePhp($value['name']);
    $clase++;
    $listaKnow .= "<option value='".$value['id']."' class='".$clase;
    if($datosRE!=""){if ($value['id']==$areaConocimiento) {$listaKnow .= "' selected='selected";}}
    $listaKnow .= "'>".$value['name']."</option>";
    $areasReprod .= "Opción: ".$clase.".  ".rtrim($value['name']).", ";
}
    #$listaNeed .="<option>Seleccionar...</option>";
$clase=0;
foreach ($need as $value){
    #$clase = normalizePhp($value['name']);
    $clase++;
    $listaNeed .= "<option value='".$value['id']."'. class='".$clase;
    if($datosRE!=""){if ($value['id']==$datosRE['reference_need_id']) {$listaNeed .= "' selected='selected";}}
    $listaNeed .= "'>".$value['name']."</option>";
    $needReprod .= "Opción: ".$clase.".  ".rtrim($value['name']).", ";
}
$need="";
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
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('crearRecurso.twig.html');
echo $template->render(array('know' => $listaKnow, 'sKnow'=>$listaSubKnow, 'rol' => $idRol, 'existente'=>$existente,
    'siguiente'=>$siguiente, 'actividad'=>$actividad, 'estado'=>$listaEstado, 'areasReprod'=>$areasReprod, 
    'need' => $listaNeed, 'datosRE'=>$datosRE, 'ruta'=>$ruta, 'id'=>$idRecurso, 'needReprod'=>$needReprod,
    'titulo'=>$title, 'idItem'=>$idItem, 'categoriaEle'=>$category, 'needEle'=>$need));
?>