<?php

#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");

if ($_POST) {
    $idArea = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $ruta = array_key_exists('ruta', $_POST) ? $_POST['ruta'] : null;
    $recursos = recursosAutor($idArea);
    $resultado = ""; $listarRecursos="";
    if ($recursos){
        $clase=0;
        foreach ($recursos as $value){
            #$clase = normalizePhp($value['title']);
            $clase++;
            $resultado .= '<div id="recursosAjax"><a id="recursoEducativo" '
                    . 'href="'.$ruta.'?validar=true&id='.$value['id'].'" '
                    . 'class="'.$clase.'"><h3><b>Título: '
                    . '</b>'.$value['title'].'</h3><p><b>Descripción: </b>'
                    .$value['description'].'<br><b>Necesidad de educación: </b>'
                    .$value['need'].'<br><b>Estado de Visibilidad: </b>'.$value['estado']
                    .'<br><b>Área de Conocimiento: </b>'.$value['conocimiento']
                    .'<br><b>Herramienta de autor: </b>'.$value['tipo_recurso'].'</p></a></div>';
            $listarRecursos .= "Recurso ".$clase.": ".rtrim($value['title']).", ";
        }   
    }else{
        $resultado = "No tienes ningún recurso educativo creado en esta plataforma";
    }
    echo $resultado."<input type='hidden' id='paraSintetizador' value='".$listarRecursos."' >";
}

?>