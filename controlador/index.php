<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array('cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
$listarAreas = listarAreasConocimiento();
$listaCategorias = ""; $listarRecursos=""; $clase=0;
foreach ($listarAreas as $value){
    #$clase = normalizePhp($value['name']);
    if($value['count']>0){ $clase++; } 
    $listaCategorias .='<h2 class="h2niv" ><a onclick="consultarOA('.$value['id'].');"'.'><input type="hidden" ';
    if($value['count']>0){ $listaCategorias .= 'class="'.$clase; }
    $listaCategorias .= '" value="'.$value['id'].'"/>'.$value['name'].'('.$value['count'].' Objetos aprendizaje)</a></h2>';
    if($value['count']>0){ $listarRecursos .= " Área ".$clase.": ".rtrim($value['name'])." "; }
}
$listaCategorias .= "<input type='hidden' id='paraSintetizadorAreas' value='".$listarRecursos."' >";
#Carga las 'vistas'
$template = $twig->loadTemplate('index.twig.html');
echo $template->render(array( 'areas' => $listaCategorias));
?> 