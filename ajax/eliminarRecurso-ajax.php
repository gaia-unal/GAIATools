<?php

#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");

if ($_POST) {
    $idArea = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $recursos = recursosAutor($idArea);
    $resultado = ""; $listarRecursos="";
    if ($recursos){
        foreach ($recursos as $value){
            $clase = normalizePhp($value['title']);
            $resultado .= '<div id="eliminarRecursos"><input type="radio" name="idRecurso" '
                    . 'class="'.$clase.'"'.' value="'.$value['id'].','.$value['roap'].'" />'.$value['title']
                    .': '.$value['description'].'</div>';
            $listarRecursos .= rtrim($value['title']).", ";
        }   
    }else{
        $resultado = "No tienes ningún recurso educativo creado en esta plataforma";
    }
    echo $resultado."<input type='hidden' id='paraSintetizador' value='".$listarRecursos."' >";
}

?>