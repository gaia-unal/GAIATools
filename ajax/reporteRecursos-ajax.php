<?php
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
if ($_POST) {
    $recursos = reporteRecursos();
    $total = 0;
    $resultado = "<table border=2><tr><th>Area de conocimiento</th><th>Estado actual</th>"
                . "<th>Necesidad educativa que atiende</th>"./*<th>Cantidad de items</th>*/"<th>Cantidad de recursos</th></tr>";
    if ($recursos){
        foreach ($recursos as $value){
            $resultado .= '<tr><td>'.$value['area'].'</td><td>'.$value['estado'].'</td><td>'.$value['need']
                         .'</td><td>'/*.$value['items'].'</td><td>'*/.$value['cant'].'</td></tr>';
            $total = $total+$value['cant'];
        }
        $resultado .= "</table><label>El total de recursos educativos existentes es: $total</label><br><br>";
    }else{
        $resultado = "No existe ningun usuario que haya solicitado acceso a la herramienta";
    }
    echo $resultado;
}
?>