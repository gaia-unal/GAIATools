<?php
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");

if ($_POST) {
    $idArea = array_key_exists('idArea', $_POST) ? $_POST['idArea'] : null;
    $recursos = listarSubAreasConocimiento($idArea);
    $listarAreas = listarAreasConocimiento();
    $resultado = ""; $listarRecursos=""; $listarNAreas=""; $clase=0; $clase2=0;
    for($i=0; $i<$idArea; $i++){
        $value=$listarAreas[$i];
        #$clase = normalizePhp($value['name']);
        if ($value['count']>0){ $clase++; }
        $resultado .='<h2 class="h2niv" ><a onclick="consultarOA('.$value['id'].');";"'.'><input type="hidden" ';
        if ($value['count']>0){ $resultado .= ' class="'.$clase; }
        $resultado .= '" value="'.$value['id'].'"/>'.$value['name'].'('.$value['count'].' Objetos aprendizaje)</a></h2>';
        if ($value['count']>0){ $listarNAreas .= " Área ".$clase.": ".rtrim($value['name'])." "; }
    }
    if ($recursos){
        foreach ($recursos as $value){
            #$clase = normalizePhp($value['name']);
            if ($value['count']>0){ $clase2++; }
            $variable= "'".$value['name']."'";
            $resultado .= '<h3 class="h2niv" ><a id="subarea" onclick="consultarOA('.$variable.');"'.'><input type="hidden" ';
            if ($value['count']>0){ $resultado .= 'class="B'.$clase2; }
            $resultado .= '" value='.$variable.'/>'.$value['name'].'('.$value['count'].' Objetos aprendizaje)</a></h3>';
            if($value['count']>0){ $listarRecursos .= " Área ".$clase2.": ".rtrim($value['name']).". ";}
        }   
    }else{ $resultado = "No tienes ningún recurso educativo creado en esta plataforma"; }
    $resultado .= "<br>";
    for($i=$idArea; $i<count($listarAreas); $i++){
        $value=$listarAreas[$i];
        #$clase = normalizePhp($value['name']);
        if ($value['count']>0){ $clase++; }
        $resultado .='<h2 class="h2niv" ><a onclick="consultarOA('.$value['id'].');";"'.'><input type="hidden" ';
        if ($value['count']>0){ $resultado .= 'class="'.$clase; }
        $resultado .= '" value="'.$value['id'].'"/>'.$value['name'].'('.$value['count'].' Objetos aprendizaje)</a></h2>';
        if($value['count']>0){ $listarNAreas .= " Área ".$clase.": ".rtrim($value['name'])." "; }
    }
    echo $resultado."<input type='hidden' id='paraSintetizadorSubAreas' value='".$listarRecursos."' />"
            ."<input type='hidden' id='paraSintetizadorAreas' value='".$listarNAreas."' />";
}
?>