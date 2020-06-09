<?php

#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");

if ($_POST) {
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $item = listarItem($id);
    $resultado = "";
    if ($item){
        foreach ($item as $value){
            $resultado .= '<div id="todoItemEdit"><div id="radioEditar" >'
                    . '<input type="radio" name="idItem" value="'.$value['id']
                    .','.$value['idtipo'].'"/></div><div id="itemEditar" ><b>'
                    .$value['tipo'].': </b>'
                    .$value['pregunta'].'</div></div><br>';
        }   
    }else{
        $resultado = "No tienes ningún ítem correspondiente a este recurso educativo creado en esta plataforma";
    }
    echo $resultado;
}

?>