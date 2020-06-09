<?php

#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");

if ($_POST) {
    $idArea = array_key_exists('idArea', $_POST) ? $_POST['idArea'] : null;
    if($idArea=="todas" || ctype_digit($idArea)){
        $recursos = recursosArea($idArea);
    }else{
        $recursos = recursosSubArea($idArea);
    }
    $resultado = "<input type='hidden' autofocus />"; $listarRecursos="";
    if ($recursos){
        foreach ($recursos as $value){
            $clase = normalizePhp($value['title']);
            $resultado .= '<div id="recursosAjax" autofocus><a id="recursoEducativo" '
                    . 'href="verRecurso.php?id='.$value['id'].'" '
                    . 'class="'.$clase.'" ><h3><b>Título: </b>'
                    .$value['title'].'</h3><p><b>Descripción: </b>'.$value['description']
                    .'</p></div></a>';
            $listarRecursos .= rtrim($value['title']).", ";
        }   
    }else{
        $resultado = "No hay recursos educativos disponible en esta sub area de conocimiento.";
    }
    echo $resultado."<input type='hidden' id='paraSintetizador' value='".$listarRecursos."' >";
}

?>