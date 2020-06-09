<?php

    require_once("../configuracion/clsBD.php");

    
    /*
     * Esta función es utilizada para la validación de usuarios desde la plataforma 
     * RAIM.
     * 
     * @param   string  $user   Nombre del ususario en el sistema
     *          string  $pass   Clave del usuario para la validación
     * 
     * @return  array con datos del usuario, como id, nombre, apellido y el id del rol
     * 
     */
    function validarUsuario($user, $pass){
        $objDatos = new clsDatos();
        $sql = "SELECT id, name, surname, reference_role_id FROM users  
            WHERE valid=true AND user_name ='$user' AND password = MD5('$pass') ";
        $usuario = $objDatos->consultarUnRegistro($sql);
        return $usuario;
    }
    
    /*
     * Esta función es utilizada en controlador/validar.php, la cual es utilizada 
     * para verificar si el usuario existe en el sistema, pero este no ha sido 
     * autorizado en su acceso para el administrador.
     * 
     * @param   string  $user   Nombre del ususario en el sistema
     *          string  $pass   Clave del usuario para la validación
     * 
     * @return  array con datos del usuario, como id, nombre, apellido y el id del rol
     * 
     */
    function usuarioExistente($user, $pass){
        $objDatos = new clsDatos();
        $sql = "SELECT id, name, surname, reference_role_id FROM users  
            WHERE user_name ='$user' AND password = MD5('$pass') ";
        $usuario = $objDatos->consultarUnRegistro($sql);
        return $usuario;
    }
    
    
    /*
     * Esta función es utilizada para la creacion de usuarios desde la plataforma RAIM.
     * 
     * @param   string  $tabla      Nombre de la tabla para la creación de ususario
     *          array   $atributos  lista de atributo y valor para la tabla
     *          int     $idNeed     Identificador de la necesidad especialñ de educacion
     * 
     * @return  null    Crea el usuario en la tabla users
     * 
     */
    function crearUsuario($tabla, $atributos, $idNeed){
        $objDatos = new clsDatos();
        #creando el SQL
        $sql = "INSERT INTO ".$tabla." (";
        #foreach ($atributos as $value) { $sql .= $value['atributo'].", "; }
        $sql1 .= "reference_role_id, valid, reference_need_id) VALUES (";
        foreach ($atributos as $value) {
			$sql .= $value['atributo'].", ";
            if($value['atributo']==='password'){ $sql1.="MD5('".$value['dato']."'), "; }else{ $sql1 .= "'".$value['dato']."', "; }
        }
        $sql = $sql.$sql1." 2, 'true', ".$idNeed.")";
        #se usa el rol administrador solo para marcar cuales fueron los usuarios de prueba con RAIM
        $objDatos->operacionesCrud($sql);
        //return $sql;
    }
    
?>