<?php 
    include("../bd/funcionesRaim.php");
    #posibles problemas con los tipos de datos
    $data = array_key_exists('data', $_POST) ? $_POST['data'] : null; #llegada del json
    
   
    //return true;
    
    if($data!=null){
        $gaiaTools = 4;#codigo de gaiatools en raim
        $atributos = array();#los datos que se necesitan para el sql
        $idNeed = 1; #Por defecto no tiene
        $datos = json_decode($data);
        $need = $datos->need; #stdClass
        $need = $need[0];
        $exist = strtolower($need->NEED);
        if($exist==="si"){#identificación del código de la necesidad especial de educación
            $visual = strtolower($need->V); #codigo 2
            if($visual=="si"){ $idNeed = 2; }
            $auditivo = strtolower($need->A); #codigo 3
            if($auditivo=="si"){ $idNeed = 3; }
            $cognitivo = strtolower($need->C); #codigo 4
            if($cognitivo=="si"){ $idNeed = 4; }
        }
        $aplication = $datos->aplication;
        $aplicacion = $aplication->id;
        $tablas = $aplication->tablas; 
        $tablas = $tablas[0]; #las modificaciones que necesito
        $tabla = $tablas->name;
        $datos = $tablas->fields_tables;
        if($aplicacion===$gaiaTools){
            foreach ($datos as $otro) {
                $array = array( 'atributo'=>$otro->name_db, 'dato'=>$otro->value );
                array_push($atributos, $array);#la clave es el atributo y el valor es el valor
            }
            #revisar la contraseña....
            crearUsuario($tabla, $atributos, $idNeed);
            $file = fopen("archivo.txt", "w");
            fwrite($file, (string) $sql . PHP_EOL);
            fclose($file);
            return true;
            
        }
    }
 ?>