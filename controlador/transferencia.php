<?php
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array('cache' => 'cache', 'debug' => 'true'));
#Carga de funciones para la conección a la base de datos
session_start();
include("../bd/funciones.php"); 

if($_POST){ 
    $id = array_key_exists("id", $_POST) ? $_POST["id"] : NULL;
    publicar($id, 1);
    $datosRE = datosRE($id);
    $estructura = 'atomic'; #'collection'
    $nivel = 1; #se puede categorizar por numero de items? 2,3,4;
    $entidad = "Grupo de Ambientes Inteligentes Adaptativos - GAIA";
    $hoy = getdate();
    $titulo = $datosRE['title'];
    $descripcion = $datosRE['description'];
    $tiempo = posicionItem($id);# = relacionar 1 minuto por item;
    $banderaInteractividad =false;
    $tiposActividades = cantActividad($id);
    foreach ($tiposActividades as $key){
        $tipo = $key['tipo'];
        if ($tipo==5 || $tipo==6){
            if($banderaInteractividad){
                $interactividad = "mixed";
            }else{
                $interactividad = "expositive";
                $ejercicio = "lecture";
            }
        }else{
            $banderaInteractividad = true;
            $interactividad = "active";
            $ejercicio = "exercise";
        }
        if($tipo==9 || $tipo==10 || $tipo==11){
            $lenguaSenas = "si";
        }else{
            $lenguaSenas = "no";
        }
    }
    if($tiempo>0 && $tiempo<10){
        if(!$banderaInteractividad){
            $nivelSemantica= "very low";
        }else{
            $nivelInteractividad = "very low";
        }
    }elseif($tiempo>9 && $tiempo<20){
        if(!$banderaInteractividad){
            $nivelSemantica= "low";
        }else{
            $nivelInteractividad = "low";
        }
    }elseif($tiempo>19 && $tiempo<30){
        if(!$banderaInteractividad){
            $nivelSemantica= "medium";
        }else{
            $nivelInteractividad = "medium";
        }
    }elseif($tiempo>29 && $tiempo<40){
        if(!$banderaInteractividad){
            $nivelSemantica= "high";
        }else{
            $nivelInteractividad = "high";
        }
    }elseif($tiempo>39 && $tiempo<50){
        if(!$banderaInteractividad){
            $nivelSemantica= "very high";
        }else{        
            $nivelInteractividad = "very high";
        }
    }
    $lom = array(
            'general' => array(
                'title'=>$titulo, 
                'language'=>'es', 
                'description'=>$descripcion, 
                'structure'=>$estructura,
                'aggregationlevel'=>$nivel
            ),
            'lifecycle' => array(
                'version'=>1, #preguntar a Valentina y Nestor, si es Bueno guarder modificaciones de OA como un OA nuevo
                'status'=>'final',
                'contribute'=> array(
                    'role'=>'autor',
                    'date'=> $hoy['mday']."/".$hoy['mon']."/".$hoy['year'],#deberia de almacenar la fecha en que se creo el oa?
                    'entity'=>$entidad  #la entidad del usuario? o la de gaia o RAIM?
                )
            ),
            'metametadata' => array(
                'identifier' => array(
                    'catalog' => 'URL',
                    'entry' => "http://froac.manizales.unal.edu.co/GAIATools/controlador/verRecurso.php?id=".$id,
                ),
                'contribute' => array(
                    'role' => 'creador',
                    'date'=> $hoy['mday']."/".$hoy['mon']."/".$hoy['year'],#deberia de almacenar la fecha en que se creo el oa?
                    'entity'=>$entidad  #la entidad del usuario? o la de gaia o RAIM?
                ),
                'metadataschema' => 'LOMv1.0',
                'language'=>'es'
            ),
            'technical' => array( #preguntar a valen
                'format' => 'Web',
                'size' => '40 Kb',
                'location' => "http://froac.manizales.unal.edu.co/GAIATools/controlador/verRecurso.php?id=".$id,
                'duration' => $tiempo,
                'otherplatformrequirements' => 'Navegador Web',
                'requirements' => array(
                    'type' => 'Navegador',
                    'name' => 'Google Chrome',
                    'minimumversion' => '4.0',
                    'maximumversion' => 'Actual'
                )
            ),
            'educational' => array(
                'interactivitytype' => $interactividad,
                'learningresourcetype' => $ejercicio,
                'interactivitylevel' => $nivelInteractividad,
                'semanticdensity' => $nivelSemantica,
                'typicallearningtime' => $tiempo,
                'language' => 'es'
            ),
            'rights' => array(
                'cost' => 'no',
                'copyrightandotherrestrictions' => 'no',
                'description' => 'Desarrollado con una herramienta libre llamada GAIATools en marco del proyecto RAIM'
            ),
            'relation' => array(
                'kind'=>'basa en',
                'resource' => array(
                    'description' => $descripcion
                )
            ),
            'annotation' => array(
                'role'=>'autor',
                'date'=> $hoy['mday']."/".$hoy['mon']."/".$hoy['year'],#deberia de almacenar la fecha en que se creo el oa?
                'description'=>$descripcion  #la entidad del usuario? o la de gaia o RAIM?
            ),
            'classification' => array(
                'purpose'=>'educational objective'
            ),
            'accessibility' => array(
                'presentationmode' => array(
                    'auditory' => 'voz',
                    'textual' => 'si',
                    'visual' => 'si',
                ),
                'interactionmode' => array(
                    'keyboard' => 'si',
                    'mouse' => 'si',
                    'voicerecognition' => 'si',
                ),
                'adaptationtype' => array(
                    'audiodescription' => 'si',
                    'hearingalternative' => 'si',
                    'textualalternative' => 'si',
                    'signlanguage' => $lenguaSenas,
                    'subtitles' => 'si'
                )
            )
        );
    $lomCod = json_encode($lom);
    #Carga las 'vistas'
    $template = $twig->loadTemplate('transferencia.twig.html');
    echo $template->render(array('json'=>$lomCod));
}else{
    echo "Error de transferencia, intentar nuevamente";
}


?>