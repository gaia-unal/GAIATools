<?php

#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");

if ($_POST) {
    $idArea = array_key_exists('idArea', $_POST) ? $_POST['idArea'] : null;
    $recursos = listarSubAreasConocimiento($idArea);
    $resultado = '<select id="subAreasConocimiento"  class="category" name="category" autofocus >'; $areasReprod="";
    if ($recursos){
        $clase=0;
        foreach ($recursos as $value){
            #$clase = normalizePhp($value['name']);
            $clase++;
            $resultado .= '<option value="'.$value['id'].'" class="'.$clase.'" >'.$value['name'].'</option>';
            $areasReprod .= "Opción: ".$clase.".  ".rtrim($value['name']).". ";
        }   
    }else{
        $resultado = "No tienes ningún recurso educativo creado en esta plataforma";
    }
    echo $resultado.'</select><input type="hidden" id="subAreas" value="'.$areasReprod.'" />';
}

?>