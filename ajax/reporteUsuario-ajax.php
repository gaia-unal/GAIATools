<?php
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
if ($_POST) {
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $recursos = reporteUsuarios($id);
    $total = 0;
    $resultado = "<table border=2><tr><th>Nombre de usuario</th><th>Nombre de autor</th>"
                . "<th>Cantidad de recursos construidos</th></tr>";
    if ($recursos){
        foreach ($recursos as $value){
            $resultado .= '<tr><td>'.$value['usuario'].'</td><td>'.$value['nombre'].' '.$value['apellido']
                    .'</td><td>'.$value['cant'].'</td></tr>';
            $total = $total+$value['cant'];
        }
        $resultado .= "</table><label>El total de recursos educativos existentes es: $total</label><br><br>";
    }else{
        $resultado = "No existe ningun usuario que haya solicitado acceso a la herramienta";
    }
    echo $resultado;
}
?>