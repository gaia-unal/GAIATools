<?php
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
if ($_POST) {
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $recursos = todosUsuarios($id);
    $resultado = "<table border=2><tr><th>Autorizado</th><th>Nombre y apellido</th><th>Correo electronico</th><th>Nombre de Usuario</th><th>Institución Educativa</th></tr>";
    if ($recursos){
        foreach ($recursos as $value){
            $resultado .= '<tr><td><input type="checkbox" name="usuario[]" value="'.$value['id'];
            if($value['valid']==='t' ){$resultado .= '" checked>';}else{$resultado .= '" >';}
            $resultado .= '</td><td>'.$value['name'].' '.$value['surname'].'</td><td>'.$value['mail'].'</td><td>'.$value['user_name'].'</td><td>'.$value['institution'].'</td></tr>';
        } $resultado .= "</table>";
    }else{ $resultado = "No existe ningun usuario que haya solicitado acceso a la herramienta"; }
    echo $resultado;
}
?>