<?php
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
if ($_POST) {
    $need = array_key_exists('need', $_POST) ? $_POST['need'] : null;
    $resultado="";
    if ($need==null){
        $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(preguntalo);' src='../images/pregunta-lo.png' alt='logo aplicativo preguntas' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
        $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(escribelo);'  src='../images/escribe-lo.png' alt='logo aplicativo escribelo' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
        $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(libro);'      src='../images/libro.png' alt='logo aplicativo libro' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
        $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(ensamblar);'  src='../images/integra-lo.png' alt='logo aplicativo integrador' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
        $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(enseñalo);'   src='../images/traductor.png' alt='logo aplicativo de la lengua de señas colombiano' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
        $resultado .= "<input type='hidden' id='aplicacionesSintetizador' value='Preguntalo, Escribelo, Libro, Intégralo, Enseñalo.' />";
    }else{
        switch ($need) {
            case 1:#Sin discapacidad
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(preguntalo);' src='../images/pregunta-lo.png' alt='logo aplicativo preguntas' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(escribelo);'  src='../images/escribe-lo.png' alt='logo aplicativo escribelo' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(libro);'      src='../images/libro.png' alt='logo aplicativo libro' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(ensamblar);'  src='../images/integra-lo.png' alt='logo aplicativo integrador' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(enseñalo);'   src='../images/traductor.png' alt='logo aplicativo de la lengua de señas colombiano' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<input type='hidden' id='aplicacionesSintetizador' value='Preguntalo, Escribelo, Libro, Enseñalo.' />";
                break;
            case 2:#Discapacidad Visual
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(preguntalo);' src='../images/pregunta-lo.png' alt='logo aplicativo preguntas' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(escribelo);'  src='../images/escribe-lo.png' alt='logo aplicativo escribelo' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(libro);'      src='../images/libro.png' alt='logo aplicativo libro' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo'                                    src='../images/integra-lo-gris.png' alt='logo aplicativo integrador inhabilitado' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo'                                    src='../images/traductor-gris.png' alt='logo aplicativo de la lengua de señas colombiano inhabilitado' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<input type='hidden' id='aplicacionesSintetizador' value='Preguntalo, Escribelo, Libro.' />";
                break;
            case 3:#Discapacidad Auditiva
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo'                                  src='../images/pregunta-lo-gris.png' alt='logo aplicativo preguntas inhabilitado' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo'                                  src='../images/escribe-lo-gris.png' alt='logo aplicativo escribelo inhabilitado' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo'                                  src='../images/libro-gris.png' alt='logo aplicativo libro inhabilitado' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo'                                  src='../images/integra-lo-gris.png' alt='logo aplicativo integralo inhabilitado' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' onclick='guardarTemp(enseñalo);' src='../images/traductor.png' alt='logo aplicativo de la lengua de señas colombiano' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<input type='hidden' id='aplicacionesSintetizador' value='Enseñalo.' />";
                break;
            case 4:#Discapacidad Cognitiva
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' src='../images/pregunta-lo-gris.png' alt='logo aplicativo preguntas' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' src='../images/escribe-lo-gris.png' alt='logo aplicativo escribelo' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' src='../images/libro-gris.png' alt='logo aplicativo libro' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' src='../images/integra-lo-gris.png' alt='logo aplicativo libro' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<h3 id='actividad'><input type='image' id='logo-aplicativo' src='../images/traductor-gris.png' alt='logo aplicativo del lenguaje de señas colombiano' style='width: 5em; display: inline; margin-left: 0em;'/></h3>";
                $resultado .= "<input type='hidden' id='aplicacionesSintetizador' value='Actualmente no hay aplicaciones específicas para esta discapacidad.' />";
                break;
        }
    }
    echo $resultado;
}
?>