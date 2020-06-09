<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array( 'cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
include("../bd/funciones.php");
session_start();
$nombre = $_SESSION['nombre'];
$idRol = $_SESSION['id_rol'];
$idUsuario = $_SESSION['id_usu']; 
if ($nombre==null) { include("cierre.php");}
#if ($nombre==null) { header("Location: cierre.php"); }
$idItem = '0'; $url=""; $tipos=array(); $mensaje="";
if ($_POST){
    $title = array_key_exists('titulo', $_POST) ? $_POST['titulo'] : null;
    $id = array_key_exists('id', $_POST) ? $_POST['id'] : null;
    $existente = array_key_exists('existente', $_POST) ? $_POST['existente'] : null;
    $idItem = array_key_exists('idItem', $_POST) ? $_POST['idItem'] : null;
    $modificado = array_key_exists('modificado', $_POST) ? $_POST['modificado'] : null;
    $editar = array_key_exists('editar', $_POST) ? $_POST['editar'] : null;
    $eliminar = array_key_exists('eliminar', $_POST) ? $_POST['eliminar'] : null;
    $subir = array_key_exists('subir', $_POST) ? $_POST['subir'] : null;
    $bajar = array_key_exists('bajar', $_POST) ? $_POST['bajar'] : null;
    $tiposActividades = tiposActividad($id);
    foreach ($tiposActividades as $value){ array_push($tipos, $value['reference_type_activity_id']); }
    if ($idItem!=null){ $datos = explode(',', $idItem); $idItem = $datos[0]; }
    if($editar!=null){ if ($idItem!=null){$url = $datos[1];}
    }elseif($eliminar!=null){ 
        if ($idItem!=null){ 
            if(union($idItem)) {
                $mensaje = eliminarItemIntegrado($idItem, $id);
            }else{
                $mensaje = eliminarItem($idItem);
            }
        }
    }elseif($subir!=null){ if ($idItem!=null){subirItem($idItem, $id);}
    }elseif($bajar!=null){ if ($idItem!=null){bajarItem($idItem, $id);}
    }
}
$template = $twig->addGlobal("session", $_SESSION);
$template = $twig->loadTemplate('listarItems.twig.html');
echo $template->render(array("idUsuario"=>$idUsuario, "rol" => $idRol, "id"=>$id, "titulo"=>$title, "tipos"=>$tipos, 
    "mensaje"=>$mensaje, "existente"=>$existente, "modificado"=>$modificado, "idItem"=>$idItem, "url"=>$url)); 
#se envia el idUsuario con el fin de identificar el autoro de los objetos
?>