<?php
    require_once("../configuracion/clsBD.php");
    $objDatos = new clsDatos();
    #no muestra los errores del sistema
    error_reporting(0);

    /*
     * Se utiliza para la creación del usuario. en controlador/registro.php
     * En esta funcion se registran de forma predeterminada los usuarios con un 
     * rol de AUTOR, ya que el ADMINISTRADOR es una persona unica y esta es 
     * predefinida en el sistema.
     *
     * @param   string  $idNombre            nombre completo del usuario
     *          string  $idApellido          apellido completo del usuario
     *          string  $idCorreo            correo electrónico de contacto del usuario
     *          string  $idGenero            Identificación del genero sexual del usuario
     *          string  $idFecha             Fecha de nacimiento del usuario
     *          string  $idInstitucion       Institución educativa a la que pertenece el usuario
     *          string  $idNivel             Nivel educativo del usuario
     *          string  $idNeed              Identificación de la necesidad especial educativa, 
     *                                          previamente definida desde la base de datos y con 
     *                                          copia en la pagina de registro.twig.html en la carpeta twig
     *          string  $idUsuario           Nombre del usuario en el sistema
     *          string  $idClave             Clave de seguridad para validación de usuario
     * 
     * @return Mensaje de confirmación de efectividad en la creación del usuario
     */
    function crearUsu($idNombre, $idApellido, $idCorreo, $idGenero, $idFecha, $idInstitucion, 
            $idNivel, $idNeed, $idUsuario, $idClave, $valid){
        $objDatos = new clsDatos();	
        $sql= "INSERT INTO users (name, surname, mail,";
        if($idGenero!=null){$sql .= " gender,";}
        if($idFecha!=null){$sql .= " dates_birth,";}
        if($idInstitucion!=null){$sql .= " institution,";}
        $sql .= " user_name, password, educational_level, reference_role_id, reference_need_id, valid) "
                . "VALUES ('$idNombre', '$idApellido', '$idCorreo',";
        if($idGenero!=null){$sql .= "'$idGenero', ";}
        if($idFecha!=null){$sql .= "'$idFecha', ";}
        if($idInstitucion!=null){$sql .= "'$idInstitucion', ";}
        $sql .= "'$idUsuario', MD5('$idClave'), '$idNivel', 2, $idNeed, '$valid');";
        /*Se utiliza el rol 2 ya que todos los usuarios que se registran por la página son autores, y hay un unico administrador.*/
        $objDatos->operacionesCrud($sql);
        $sql = "select count(id) from users where mail='$idCorreo' and user_name='$idUsuario'";
        $resultado = (int)$objDatos->consultarUnRegistro($sql)['count'];
        if ($resultado>0){ 
            $mensaje = "Usuario creado con exito, a continuación se validara de forma automática su usuario.";
        } else {
            $mensaje = "Inconvenientes con el registro, intenta más tarde o contacta soporte técnico";
        }
        return $mensaje;
    }

    /*
     * Se utiliza para la actualización de los datos personales  del usuario. 
     * En esta funcion se registran de forma predeterminada los usuarios con un 
     * rol de AUTOR, ya que el ADMINISTRADOR es una persona unica y esta es 
     * predefinida en el sistema.
     *
     * @param   string  $idNombre            nombre completo del usuario
     *          string  $idApellido          apellido completo del usuario
     *          string  $idCorreo            correo electrónico de contacto del usuario
     *          string  $idGenero            Identificación del genero sexual del usuario
     *          string  $idFecha             Fecha de nacimiento del usuario
     *          string  $idInstitucion       Institución educativa a la que pertenece el usuario
     *          string  $idNivel             Nivel educativo del usuario
     *          string  $idNeed              Identificación de la necesidad especial educativa, 
     *                                          previamente definida desde la base de datos y con 
     *                                          copia en la pagina de registro.twig.html en la carpeta twig
     * 
     * @return Mensaje de confirmación de efectividad en la creación del usuario
     */
    function modificarUsu($idNombre, $idApellido, $idCorreo, $idGenero, $idFecha, 
            $idInstitucion, $idNivel, $idNeed, $id){
        $objDatos = new clsDatos();	
        $sql= "UPDATE users SET name='$idNombre', surname='$idApellido', mail='$idCorreo', 
                                gender='$idGenero', dates_birth='$idFecha', institution='$idInstitucion', 
                                educational_level='$idNivel', reference_need_id=$idNeed
                WHERE id=$id";
        $objDatos->operacionesCrud($sql);
        $mensaje = "Datos actualizados";
        return $mensaje;
    }
    
    
    /*
     * Esta funcion es utilizada para listar las necesidades especiales existentes en la bd
     * 
     * @param   null
     * 
     * @return  array id    name    de la necesidad
     * 
     */
    function listaNeed(){
        $objDatos = new clsDatos();	
        $sql = "SELECT id, name FROM reference_need WHERE id<>4 ORDER BY 1";
        return $objDatos->executeQuery($sql) ;
    }

    /*
     * Esta función es utilizada principalmente por el index-ajax.php para 
     * consultar una lista de los recursos educativos construidos en la herramienta
     * que esten catalogados en un area de aprendizaje específico
     * 
     * @param   string  $idArea     Identificación unica del area de conocimientos
     * 
     * @return  array   lista de recursos educativos, id, title, description
     * 
     * Se pregunta que el estado del objeto sea publico, puesto que es posible 
     * que el autor deba dejar incompletos los recursos
     */
    function recursosArea($idArea){
        $objDatos = new clsDatos();
        $idCondicion = 1;
        $sql = "SELECT e.id, e.title, e.description 
                FROM educational_resource e, reference_subarea_knowledge k 
                WHERE e.show='t' AND e.reference_area_knowledge_id=k.id
                AND e.reference_condition_id=$idCondicion ";
        if ($idArea!="todas"){
            $sql .= "AND k.reference_area_knowledge_id=$idArea";
        }
        return $objDatos->executeQuery($sql) ;
    }
    
    /*
     * Verificar si un correo electrónico ya existe
     * 
     * @param   string  $idCorreo     Identificación del correo electrónico
     * 
     * @return  boolean               Identificar true si ya existe, false si no existe
     */
    function verificarEmail($idCorreo){
        $objDatos = new clsDatos();
        $sql = "SELECT count(mail) as total
                FROM users  
                WHERE mail='$idCorreo'";
        $cantidad = $objDatos->consultarUnRegistro($sql)['total'];
        if($cantidad>0){
            return true;
        }else{
            return false;
        }
    }
    
    /*
     * Verificar si nombre de usuario ya existe
     * 
     * @param   string  $idUsuario    Identificación del nombre de usuario
     * 
     * @return  boolean               Identificar true si ya existe, false si no existe
     */
    function verificarUsuario($idUsuario){
        $objDatos = new clsDatos();
        $sql = "SELECT count(user_name) as total
                FROM users  
                WHERE user_name='$idUsuario'";
        $cantidad = $objDatos->consultarUnRegistro($sql)['total'];
        if($cantidad>0){
            return true;
        }else{
            return false;
        }
    }
    
    /*
     * Esta función es utilizada principalmente por el index-ajax.php para 
     * consultar una lista de los recursos educativos construidos en la herramienta
     * que esten catalogados en un area de aprendizaje específico
     * 
     * @param   string  $idArea     Identificación unica del area de conocimientos
     * 
     * @return  array   lista de recursos educativos, id, title, description
     * 
     * Se pregunta que el estado del objeto sea publico, puesto que es posible 
     * que el autor deba dejar incompletos los recursos
     */
    function recursosSubArea($idArea){
        $objDatos = new clsDatos();
        $idCondicion = 1;
        $sql = "SELECT e.id, e.title, e.description 
                FROM educational_resource e, reference_subarea_knowledge k 
                WHERE e.show='t' AND e.reference_area_knowledge_id=k.id
                AND e.reference_condition_id=$idCondicion 
                AND k.name='$idArea'";
        return $objDatos->executeQuery($sql) ;
    }
    
    /*
     * Esta función es utilizada principalmente por el listarRecUuario-ajax.php para 
     * consultar una lista de los recursos educativos construidos en la herramienta
     * por el autor que esta validado
     * 
     * @param   string  $idArea     Identificación unica del area de conocimientos
     * 
     * @return  array   lista de recursos educativos con el id, title, 
     *                  description, estado, area de conocimiento, need
     *  
     */
    function recursosAutor($id){
        $objDatos = new clsDatos();
        $sql = "SELECT e.id as id, e.title as title, e.description as description,
                        n.name as need, c.name as estado, k.name as conocimiento, 
                        e.existing_repository as roap 
                FROM educational_resource e, reference_need n, 
                        reference_condition c, reference_subarea_knowledge k
                WHERE e.reference_need_id=n.id AND e.reference_condition_id=c.id 
                        AND e.show='t' AND e.reference_area_knowledge_id=k.id 
                        AND user_id_author=$id
                ORDER BY 1";
        $recursos = $objDatos->executeQuery($sql);
        $datos = array();
        #var_dump($recursos);
        foreach ($recursos as $key){
            $tipoEjercicio = cantActividad($key["id"]);
            #var_dump($tipoEjercicio);
            $banderaIntegralo = false;
            $memoria=0;
            foreach ($tipoEjercicio as $value){
                $tipo=(int)$value['tipo'];
                if($tipo<5){
                    if($banderaIntegralo === true && memoria>0 && memoria<5){
                        $nombreHerramienta = "Integra-lo";
                    }else{
                        #$memoria = $tipo;
                        $banderaIntegralo = true;
                        $nombreHerramienta = "Pregunta-lo";
                    }
                }elseif($tipo===5){
                    if($banderaIntegralo === true){
                        $nombreHerramienta = "Integra-lo";
                    }else{
                        $memoria = $tipo;
                        $banderaIntegralo = true;
                        $nombreHerramienta = "Libro";
                    }
                }elseif($tipo===6){
                   if($banderaIntegralo === true){
                        $nombreHerramienta = "Integra-lo";
                    }else{
                        $memoria = $tipo;
                        $banderaIntegralo = true;
                        $nombreHerramienta = "Escríbe-lo";
                    }
                }elseif($tipo===7){
                    if($banderaIntegralo === true){
                        $nombreHerramienta = "Integra-lo";
                    }else{
                        $memoria = $tipo;
                        $banderaIntegralo = true;
                        $nombreHerramienta = "Emparéja-lo";
                    }
                }elseif ($tipo===8) {
                    if($banderaIntegralo === true){
                        $nombreHerramienta = "Integra-lo";
                    }else{
                        $memoria = $tipo;
                        $banderaIntegralo = true;
                        $nombreHerramienta = "Ordena-lo";
                    }
                }elseif ($tipo>8 && $tipo<12){
                    if($banderaIntegralo === true){
                        $nombreHerramienta = "Integra-lo";
                    }else{
                        $memoria = $tipo;
                        $banderaIntegralo = true;
                        $nombreHerramienta = "En-seña-lo";
                    }
                }
            }
            $dato = array("id"=>$key["id"], "title"=>$key["title"], "description"=>$key["description"],
                "need"=>$key["need"], "estado"=>$key["estado"], "conocimiento"=>$key["conocimiento"],
                "roap"=>$key["roap"], "tipo_recurso"=>$nombreHerramienta);
            #$datos = array_push($datos, $dato);
            $datos = array_merge($datos, array($dato));
        }
        return  $datos;
    }

    /*
     * Esta función es utilizada en controlador/validar.php, la cual es utilizada para validar
     * el ingreso de los usuarios.
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
     * Es necesario listar las areas de conocimientos y contar la cantidad de recursos existentes
     * sobre las cuales se realizan
     * los recursos educativos.
     * 
     * @param   
     * 
     * @return  array con datos cantidad de recursos, nombre del area de conocimiento
     * 
     */
    function listarAreasConocimiento(){
        $objDatos = new clsDatos();
        $idCondicion = 1;
        $sql = "SELECT COUNT(e.id), ka.id, ka.name 
                FROM educational_resource e 
                RIGHT OUTER JOIN reference_subarea_knowledge k 
                    ON e.reference_area_knowledge_id=k.id 
                    AND e.show='t' AND e.reference_condition_id=$idCondicion
                JOIN reference_area_knowledge ka
                    ON ka.id=k.reference_area_knowledge_id
                GROUP BY 2, 3 ORDER BY 2";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * Es necesario listar las sub areas de conocimientos y contar la cantidad de recursos existentes
     * sobre las cuales se realizan los recursos educativos.
     * 
     * @param   int      $idArea     identificación del area de conocimeinto específicada.
     * 
     * @return  array con datos cantidad de recursos, nombre del area de conocimiento
     * 
     */
    function listarSubAreasConocimiento($idArea){
        $objDatos = new clsDatos();
        $idCondicion = 1;
        $sql = "SELECT COUNT(e.id), k.id, k.name, k. reference_area_knowledge_id
                FROM educational_resource e 
                RIGHT JOIN reference_subarea_knowledge k 
                    ON e.show='t' 
                    AND e.reference_area_knowledge_id=k.id 
                    AND e.reference_condition_id=$idCondicion 
                GROUP BY 2
                HAVING k.reference_area_knowledge_id=$idArea 
                ORDER BY 2";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * Es necesario listar las areas de conocimientos sobre las cuales se realizan
     * los recursos educativos.
     * 
     * @param   
     * 
     * @return  array con datos cantidad de recursos, nombre del area de conocimiento
     * 
     */
    function listarAreas(){
        $objDatos = new clsDatos();
        $sql = "SELECT k.id, k.name FROM reference_area_knowledge k";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * Es necesario listar los posibles estados de un 
     * los recursos educativos.
     * 
     * @param   
     * 
     * @return  array id, nombre del estado (privado, publico)
     * 
     */
    function listarEstados(){
        $objDatos = new clsDatos();
        $sql = "SELECT id, name FROM reference_condition ";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * funcion crear recurso
     * 
     * utilizado para guradar los datos de titulo, descripcion, categoia de 
     * conocimiento, necesidad y autor en la bd
     * 
     * retorna el id que creo con el recurso educativo.
     */
    function crearRecurso($titulo, $descripcion, $conocimiento, $need, $estado, $idUsuario){
        $objDatos = new clsDatos();
        $sql = "INSERT INTO educational_resource (title, description, "
                . "reference_area_knowledge_id, reference_need_id, "
                . "reference_condition_id, user_id_author, existing_repository, show) "
                . "VALUES ('".$titulo."', '".$descripcion."', ".$conocimiento.", "
                . $need.", ".$estado.", ".$idUsuario.", 'f', 't')";
        $objDatos->operacionesCrud($sql);
        $sql = "SELECT id FROM educational_resource "
                ."WHERE title='".$titulo."' AND description='".$descripcion."' "
                . "AND reference_area_knowledge_id=".$conocimiento." "
                . "AND reference_need_id=". $need." AND user_id_author=".$idUsuario;
        return $objDatos->consultarUnRegistro($sql)['id'];
    }
    
    /*
     * funcion modificar un recurso educativo
     * 
     * utilizado para guradar los datos de titulo, descripcion, categoia de 
     * conocimiento, necesidad y autor en la bd
     * 
     * retorna el id que creo con el recurso educativo.
     */
    function updateRecurso($titulo, $descripcion, $conocimiento, $need, $estado, $id){
        $objDatos = new clsDatos();
        $sql = "UPDATE educational_resource SET title='".$titulo."', description='".$descripcion."', 
                        reference_area_knowledge_id=".$conocimiento.", reference_need_id=".$need.", 
                        reference_condition_id=".$estado."
                    WHERE id=$id";
        $objDatos->operacionesCrud($sql);
        return $id;
    }
    
    /*
     * funcion guardar diferentes actividades:
     * Question: pregunta abierta, cerrada unica respuesta, falso verdadero.
     * Escribelo
     * 
     * utilizada para almacenar la pregunta, respuesta, retroalimentacion, tipo de actividad
     * y esta actividad a que recurso educativo coresponde.
     * 
     * sin retorno
     */
    function guardarPregunta($idRecurso, $pregunta, $respuesta, $retroalimentacion, 
            $tipoActividad, $opciones, $imagenSoporte, $pagina, $posicion){
        $objDatos = new clsDatos();
        $sql = "SELECT id FROM head WHERE content='".$pregunta."' AND feedback='"
                .$retroalimentacion."' AND reference_type_activity_id=$tipoActividad";
        $existe = $objDatos->executeQuery($sql);
        if(!$existe){
            $sql = "INSERT INTO head (content, feedback, reference_type_activity_id";
            if($pagina!=null){$sql .= ", description";}
            $sql .= ") VALUES ('".$pregunta."', '".$retroalimentacion."', ".$tipoActividad;
            if($pagina!=null){$sql .= ", '".$pagina."'";}
            $sql .= ")";
            $objDatos->operacionesCrud($sql);
            $sql = "SELECT id FROM head WHERE content='".$pregunta."' AND feedback='".
                    $retroalimentacion."' AND reference_type_activity_id=".$tipoActividad;
            $idPregunta = $objDatos->consultarUnRegistro($sql)['id'];
            $pos=0; $tam=0; $opcion = array(0);
            if ($opciones!=null){
                $opcion =  explode(",-%", $opciones);
                $tam = count($opcion);
            }
            $sql = "INSERT INTO body (head_id, content, response";
            if($imagenSoporte!=null){$sql .= ", image_support";}
            $sql .= ") VALUES ";
            do{
                $sql .= "(".$idPregunta.", '";
                if ($opciones==null || $respuesta==$opcion[$pos]){
                    $sql .= $respuesta."', true";
                }else{
                    $sql .= $opcion[$pos]."', false";
                }
                $pos++;
                if($imagenSoporte!=null){$sql .= ", '".$imagenSoporte."'";}
                $sql .= "),";
            }while($pos<$tam);
            $sql = rtrim($sql, ", ");
            $objDatos->operacionesCrud($sql);
            $sql = "INSERT INTO recourse_activity VALUES (".$idPregunta.", ".$idRecurso.", ".$posicion.") ";
            $objDatos->operacionesCrud($sql);
        }
    }
    
    
    /*
     * funcion para guardar las modificacions de las diferentes actividades:
     * Question: pregunta abierta, cerrada unica respuesta, falso verdadero.
     * Escribelo
     * 
     * utilizada para almacenar la pregunta, respuesta, retroalimentacion, tipo de actividad
     * y esta actividad a que recurso educativo coresponde.
     * 
     * sin retorno
     * 
     * @param       $idRecurso              int         id_head
     *              $pregunta               string      la pregunta modificada
     *              $respuesta              string      la respuesta modificada
     *              $retroalimentacion      string      la retroalimentacion modificada
     *              $tipoActividad          int         el codigo del tipo de actividad para la tabla de referencia --no se puede modificar por el usuario---
     *              $opciones               array       las opciones modificadas.
     * 
     * @return      null
     */
    function modificarPregunta($idRecurso, $pregunta, $respuesta, $retroalimentacion, $tipo, $opciones, $imagenSoporte, $pagina){
        $objDatos = new clsDatos();
        $sql = "UPDATE head SET content='".$pregunta."', feedback='".$retroalimentacion."' WHERE id=$idRecurso";
        $objDatos->operacionesCrud($sql);
        if($tipo==4 || $tipo==6 || $tipo==5){
            $sql = "UPDATE body SET content='".$respuesta;
            if($imagenSoporte!=null){$sql .= "' , image_support='".$imagenSoporte;}
            $sql .= "' WHERE head_id=$idRecurso";
        }elseif($tipo==3){
            $sql = "UPDATE body SET response='f' WHERE head_id=$idRecurso";
            $objDatos->operacionesCrud($sql);
            $sql = "UPDATE body SET response='t' WHERE head_id=$idRecurso AND content='".$respuesta."'";
        }elseif ($tipo==1) {
            $sql = "DELETE FROM body WHERE head_id=$idRecurso";
            $objDatos->operacionesCrud($sql);
            $pos=0; $tam=0; $opcion = array(0);
            if ($opciones!=null && $opciones!=""){ $opcion =  explode(",-%", $opciones); $tam = count($opcion); }
            $sql = "INSERT INTO body (head_id, content, response) VALUES ";
            do{
                if($opcion[$pos]!==''){
                    $sql .= "(".$idRecurso.", '";
                    if ($opciones==null || $respuesta==$opcion[$pos]){ $sql .= $respuesta."', true),"; }else{ $sql .= $opcion[$pos]."', false),"; }
                }
                $pos++;
            }while($pos<$tam);
            $sql = rtrim($sql, ", ");
            echo $sql;
        }
        $objDatos->operacionesCrud($sql);
    }
    
    /*
     * Cantidad de items, reporta la cantidad de elementos que componenen un recurso educativo construido.
     * 
     * 
     * 
     */
    function cantidadItems($id){
        $objDatos = new clsDatos();
        $sql = "SELECT DISTINCT count(head_id) as id FROM recourse_activity WHERE educational_resource_id=".$id;
        return $objDatos->consultarUnRegistro($sql)['id'];
    }
    
    /*
     * modificar el estado de privado a publico del recurso educativo no retorna nada
     */
    function publicar($id, $estado){
        $objDatos = new clsDatos();
        $sql = "UPDATE educational_resource SET reference_condition_id=".$estado." WHERE id=".$id;
        $objDatos->operacionesCrud($sql);
    }
    
    /*
     * extrae los id de los items de un recurso educativo específico
     * 
     * @param  $id   número     identificador del recurso educativo
     * 
     * @return  retorna un arreglo con los ids, la pregunta, tipo de actividad, y la retroalimentacion de la tabla head
     *  
     */
    function actividades($id){
        $objDatos = new clsDatos();
        $sql = "SELECT DISTINCT h.id, h.content as pregunta, h.feedback as retro, 
                    h.reference_type_activity_id as tipo, ra.position as posicion 
                FROM recourse_activity ra, head h 
                WHERE ra.educational_resource_id=$id AND ra.head_id=h.id 
                ORDER BY position";
        return $objDatos->executeQuery($sql);
    }
    
    
    /*
     * extrae las cantidades de items clasificado por el id de la actividad de un recurso educativo específico
     * 
     * @param  $id   número     identificador del recurso educativo
     * 
     * @return  retorna un arreglo con la cantidad de items agrupados por tipo de actividad
     *  
     */
    function cantActividad($id){
        $objDatos = new clsDatos();
        $sql = "SELECT DISTINCT count(h.id) AS cant, h.reference_type_activity_id as tipo 
                FROM recourse_activity ra, head h 
                WHERE ra.educational_resource_id=$id AND ra.head_id=h.id 
                GROUP BY 2
                ORDER BY 2";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * extrae las opciones existentes en un item
     * 
     * @param       $id     identificador del item
     * 
     * @return      retorna las opciones y la respesta del item consultado
     * 
     */
    function item($id){
        $objDatos = new clsDatos();
        $sql = "SELECT DISTINCT content as opcion, response as respuesta FROM body WHERE head_id=$id";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * extrae el titulo del recurso eductativo
     * 
     * @param   $id     int     identificador del recurso en la tabla educational_resource
     * 
     * @return      $title      string      nombre o titulo del recurso educativo
     */
    function nombreRE($id){
        $objDatos = new clsDatos();
        $sql = "SELECT title FROM educational_resource WHERE id=$id";
        return $objDatos->consultarUnRegistro($sql)['title'];
    }
    
    /*
     * extrae el titulo del recurso eductativo
     * 
     * @param   $id     int     identificador del recurso en la tabla educational_resource
     * 
     * @return      $title      string      nombre o titulo del recurso educativo
     */
    function autorRE($id){
        $objDatos = new clsDatos();
        $sql = "SELECT name, surname 
                FROM educational_resource er, users u 
                WHERE er.user_id_author=u.id AND er.id=$id";
        return $objDatos->consultarUnRegistro($sql);
    }
    
    /*
     * extrae los datos del recurso educativo ya creado
     * 
     * @param   $id     int     identificador del recurso en la tabla educational_resource
     * 
     * @return   array      con los datos del titulo, descripcion, categoria, id area conocimeinto
     *                      id need del recurso educativo
     */
    function datosRE($id){
        $objDatos = new clsDatos();
        $sql = "SELECT title, description, reference_need_id, reference_condition_id, 
                        reference_area_knowledge_id 
                FROM educational_resource 
                WHERE id=$id";
        return $objDatos->consultarUnRegistro($sql);
    }
    
    /*
     * extrae los datos del recurso educativo ya creado
     * 
     * @param   $id     int     identificador del recurso en la tabla educational_resource
     * 
     * @return   array      con los datos del titulo, descripcion, categoria, id area conocimeinto
     *                      id need del recurso educativo
     */
    function idKnowledge($id){
        $objDatos = new clsDatos();
        $sql = "SELECT reference_area_knowledge_id 
                FROM reference_subarea_knowledge 
                WHERE id=$id";
        return $objDatos->consultarUnRegistro($sql)['reference_area_knowledge_id'];
    }
    
    /*
     * Entrega una lista de las subcategorias
     * 
     * @param   $id     int     id de la categoria principal
     * @return  array   datos de las subcategorias, id y nombre.
     */
    function listarSubareas($id){
        $objDatos = new clsDatos();
        $sql = "SELECT id, name  
                FROM reference_subarea_knowledge 
                WHERE reference_area_knowledge_id=$id 
                ORDER BY 1";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * extrae la url del tipo de actividad
     * 
     * @param   $id     int     
     * 
     */
    function definirUrl($id, $idHead){
        $objDatos = new clsDatos();
        $sql = "SELECT url, h.id as id 
                FROM reference_type_activity a, recourse_activity ra, head h 
                WHERE h.reference_type_activity_id=a.id AND h.id=ra.head_id AND ra.educational_resource_id=$id";
        if($idHead!=null){$sql .= " AND h.id>$idHead";}
        $sql .= " ORDER BY 2";
        return $objDatos->consultarUnRegistro($sql);
    }
    
    /*
     * extrae todas las caracteristicas de un item o una pregunta
     * 
     * @param $id   int     id del item, o el head
     * 
     * @return      $array  pregunta, retroalimentación   
     * 
     */
    function itemRecurso($id){
        $objDatos = new clsDatos();
        $sql = "SELECT content as pregunta, feedback as retroalimentacion
                FROM head  
                WHERE id=$id";
        return $objDatos->consultarUnRegistro($sql);
    }
    
    /*
     * extrae la respuesta correcta del item X
     * 
     * @param $id   int     id del item, o el head
     * 
     * @return      string  respuesta correcta   
     * 
     */
    function respuestaRecurso($id){
        $objDatos = new clsDatos();
        $sql = "SELECT content as respuesta, image_support as imagen
                FROM body  
                WHERE head_id=$id and response=true";
        return $objDatos->consultarUnRegistro($sql);
    }
    
    /*
     * lista los usuarios para el administrador, mostrando que usuarios estan aprobados y cuales no.
     * 
     * @param       $id             int         el idntificador del administrador
     * 
     * @return      $usuarios       array       lista de los usaurios, con el nombre de la persona, 
     *                                          nombre de usuario y correo electronico y validación
     * 
     */
    function todosUsuarios($id){
        $objDatos = new clsDatos();
        $sql = "SELECT DISTINCT id, valid, name, surname, mail, user_name, institution 
                FROM users 
                WHERE id!=$id AND reference_role_id!=1
                ORDER BY 1";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * habilitar los usuarios cuyos ids llegaron por post
     * 
     * @param       $ids        array       el identificador de todos los usuarios chequeados
     * 
     * @return      falso
     * 
     */
    function habilitarUsuarios($ids){
        $objDatos = new clsDatos();
        $sql = "UPDATE users SET valid='f' WHERE reference_role_id!=1";
        $objDatos->operacionesCrud($sql);
        if($ids!=null){
            $sql = "UPDATE users SET valid='t' WHERE ";
            foreach ($ids as $value){ $sql .= "id=$value OR "; }
            $sql = rtrim($sql, "OR ");
            $objDatos->operacionesCrud($sql);
        }
    }
    
    /*
     * Funcion para identificar algunos estadisticos iniciales de los recursos educativos existentes.
     * 
     * @param       null
     * 
     * @return      $datos      array       se identifica la cantidad de recursos educativos agrupados por
     *                                      el area de conocimiento, la necesidad especial de educación,
     *                                      la cantidad de items que lo componene, y el estado actual (publico o privado),
     *                                      pero tambien se identifican en el arreglo estos datos de agrupación
     * 
     */
    function reporteRecursos(){
        $objDatos = new clsDatos();
        $sql = "SELECT k.name as area, c.name as estado, n.name as need,". 
                        /*count(ra.head_id) as items,*/" count(er.id) as cant  
                FROM educational_resource er, "./*recourse_activity ra, */"reference_need n, 
                        reference_condition c, reference_area_knowledge k
                WHERE er.reference_need_id=n.id AND er.reference_condition_id=c.id AND 
                        er.reference_area_knowledge_id=k.id "./*AND er.id=ra.educational_resource_id*/
                "GROUP BY 1, 2, 3";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * Funcion para identificar algunos estadisticos iniciales de los recursos educativos existentes segun el autor
     * 
     * @param       null
     * 
     * @return      $datos      array       se identifica la cantidad de recursos educativos agrupados por
     *                                      el autor, pero tambien se identifican en el arreglo estos datos de agrupación.
     * 
     */
    function reporteUsuarios($id){
        $objDatos = new clsDatos();
        $sql = "SELECT u.name as nombre, u.surname as apellido, u.user_name as usuario, count(er.id) as cant  
                FROM educational_resource er 
                RIGHT OUTER JOIN  users u 
                        ON er.user_id_author=u.id AND u.id!=$id
                GROUP BY 1, 2, 3";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * Listar opciones de un item específico
     * 
     * @param       $id                 int             identificador del item a consultar
     * 
     * @return      $respuestaString     string         datos de la opcion, contenido separados por ",-%"
     * 
     */
    function opciones($id){
        $objDatos = new clsDatos();
        $sql = "SELECT content, response FROM body WHERE head_id=$id ORDER BY 2 DESC";
        $respuesta = $objDatos->executeQuery($sql);
        $respuestaString="";
        foreach ($respuesta as $value) {$respuestaString .= $value['content'].",-%";}
        $respuestaString = rtrim($respuestaString, ",-%");
        return $respuestaString;
    }
    
    /*
     * listar items de un recurso educativo específico
     * 
     * @param       $id         int             codigo del recurso educativo
     * 
     * @return      $lista      array           datos de los items del recurso educativo
     * 
     */
    function listarItem($id) {
        $objDatos = new clsDatos();
        $sql = "SELECT h.id as id, ra.position as posicion, h.content as pregunta, ta.url as idtipo, ta.name as tipo 
                FROM head h, reference_type_activity ta, recourse_activity ra 
                WHERE h.reference_type_activity_id=ta.id AND ra.head_id=h.id AND ra.educational_resource_id=$id
                ORDER BY 2";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * Eliminar un recurso educativo específico
     * 
     * @param       $id         int             codigo del recurso educativo
     * 
     * @return      null
     * 
     */
    function eliminarRecurso($id) {
        $objDatos = new clsDatos();
        $sql = "SELECT head_id FROM recourse_activity WHERE educational_resource_id=$id";
        #echo $sql;
        $actividades = $objDatos->executeQuery($sql);
        $sql = "SELECT count(head_id) As cantidad FROM recourse_activity WHERE head_id=".$actividades[0]['head_id'];
        $ensamblador = $objDatos->consultarUnRegistro($sql)['cantidad'];
        $sql = "DELETE FROM recourse_activity WHERE educational_resource_id=$id";
        $objDatos->operacionesCrud($sql);
        $sql = "DELETE FROM educational_resource WHERE id=$id;";
        $objDatos->operacionesCrud($sql);
        if($ensamblador<2){
            if($actividades){
                $sql1 = "DELETE FROM head WHERE id=";
                foreach ($actividades as $key => $value) {
                    $sql = "DELETE FROM body WHERE head_id=".$value['head_id'];
                    $objDatos->operacionesCrud($sql);
                    $sql1 .= $value['head_id']." OR id=";
                }
                $sql1 = rtrim($sql1, "OR id=");
                $objDatos->operacionesCrud($sql1);
            }
        }
        
    }
    
    /*
     * No permite la visualización del recurso educativo específico desde GAIATools,
     * esta funcion es ejecutada cuando el recurso esta publicado en froac.
     * 
     * @param       $id         int             codigo del recurso educativo
     * 
     * @return      null
     * 
     */
    function bloquearRecurso($id){
        $objDatos = new clsDatos();
        $sql = "UPDATE educational_resource SET show='f' WHERE id=$id";
        $objDatos->operacionesCrud($sql);
    }
    
    /*
     * 
     */
    function datosPersonales($id){
        $objDatos = new clsDatos();
        $sql = "SELECT name, surname, mail, gender, country, dates_birth, 
                        institution, educational_level, reference_need_id 
                FROM users 
                WHERE id=$id";
        return $objDatos->consultarUnRegistro($sql);    
    }
    
    /*
     * Funcion para normailizar palabras y eliminara espacios.
     * 
     * @param   $str    string      palabra a eliminar caracteres especiales
     * 
     * @return  string      palabra sin caracteres especiales ni espacios
     * 
     */
    function normalizePhp ($str) {
        $str = strtolower($str); 
        $from = array("Ã","À","Á","Ä","Â","È","É","Ë","Ê","Ì","Í","Ï","Î","Ò","Ó","Ö","Ô","Ù","Ú","Ü","Û","ã","à","á","ä","â","è","é","ë","ê","ì","í","ï","î","ò","ó","ö","ô","ù","ú","ü","û","Ç","ç","´","'","`",",",";",".",":","-","_","^","¨","{","}","[","]","*","+","~","¡","?","¿","!","#","$","%","&","/","(",")","=","°","!","|","ª"," ",'"',"'");
        $tam = count($from);
        $to = array("A","A","A","A","A","E","E","E","E","I","I","I","I","O","O","O","O","U","U","U","U","a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","u","u","u","u","c","c", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
        for ($i=0;$i<$tam;$i++){
            $str = str_replace($from[$i], $to[$i], $str);
        }
        return $str;
    }
    
    /*
     * Funcion para normailizar palabras y eliminara espacios.
     * 
     * @param   $id         int     identificador del recurso educativo a modificar
     * 
     * @return  $array      array   arreglo con una lista de los ids de tipos de 
     *                              actividades que componene el recurso educativo
     * 
     */
    function tiposActividad($id){
        $objDatos = new clsDatos();
        $sql = "SELECT h.reference_type_activity_id  
                FROM head h, recourse_activity ra 
                WHERE ra.head_id=h.id AND ra.educational_resource_id=$id
                GROUP BY 1";
        return $objDatos->executeQuery($sql);
    }
    
    
    /*
     * Eliminar un ítem correspondiente a un recurso educativo integrado, pero no lo elimina solo rompe la relacion entre ellos
     * 
     * @param       $id         int             codigo del ítem del recurso educativo
     * 
     * @return      $mensaje    string          mensaje reportando que fue eliminado el objeto
     * 
     */
    function eliminarItemIntegrado($idItem, $idRecurs){
        $objDatos = new clsDatos();
        $sql = "DELETE FROM recourse_activity WHERE head_id=$idItem AND educational_resource_id=$idRecurs";
        $objDatos->operacionesCrud($sql);
        return "Ítem eliminado con exito";
    }
    
    /*
     * Eliminar un ítem correspondiente a un recurso educativo específico
     * 
     * @param       $id         int             codigo del ítem del recurso educativo
     * 
     * @return      $mensaje    string          mensaje reportando que fue eliminado el objeto
     * 
     */
    function eliminarItem($id){
        $objDatos = new clsDatos();
        #primero se deben acomodar las posiciones.
        #$sql = "SELECT position FROM recourse_activity WHERE head_id=$id AND educational_resource_id=$idRec";
        #$posicion = $objDatos->consultarUnRegistro($sql)['position'];
        $sql = "DELETE FROM recourse_activity WHERE head_id=$id";
        $objDatos->operacionesCrud($sql);
        $sql = "DELETE FROM body WHERE head_id=$id";
        $objDatos->operacionesCrud($sql);
        $sql = "DELETE FROM head WHERE id=$id;";
        $objDatos->operacionesCrud($sql);
        return "Ítem eliminado con exito";
    }
    
    /*
     * extrae los id de los items de un recurso educativo específico
     * 
     * @param  $id   número     identificador del recurso educativo
     * 
     * @return  retorna un arreglo con los ids, la pregunta, tipo de actividad,
     *  y la retroalimentacion de la tabla head
     *  
     */
    function posicionOpciones($a, $idItem){
        $objDatos = new clsDatos();
        $sql = "SELECT id  
                FROM body 
                WHERE head_id=$idItem AND content='$a'";
        #echo $sql."<br>";
        return $objDatos->consultarUnRegistro($sql)['id'];
    }
    
    /*
     * extrae los id de los items de un recurso educativo específico
     * 
     * @param  $id   número     identificador del recurso educativo
     * 
     * @return  retorna un arreglo con los ids, la pregunta, tipo de actividad,
     *  y la retroalimentacion de la tabla head
     *  
     */
    function posicionItem($id){
        $objDatos = new clsDatos();
        $sql = "SELECT COUNT(head_id) as cantidad 
                FROM recourse_activity 
                WHERE educational_resource_id=$id";
        return $objDatos->consultarUnRegistro($sql)['cantidad'];
    }
    
    /*
     * Subir de posición un ítem respecto a su moemnto de presentación en un 
     * recurso educativo específico
     * 
     * @param       $id         int             codigo del ítem del recurso educativo
     * 
     * @return      null
     * 
     */
    function subirItem($id, $idRec){
        $objDatos = new clsDatos();
        $sql = "SELECT position FROM recourse_activity WHERE head_id=$id AND educational_resource_id=$idRec";
        $posicion = $objDatos->consultarUnRegistro($sql)['position'];
        if($posicion>1){
            $sql = "SELECT head_id FROM recourse_activity WHERE position=($posicion-1) AND educational_resource_id=$idRec";
            $idRecPrev = $objDatos->consultarUnRegistro($sql)['head_id'];
            $sql = "UPDATE recourse_activity SET position=($posicion-1) WHERE head_id=$id AND educational_resource_id=$idRec";
            $objDatos->operacionesCrud($sql);
            $sql = "UPDATE recourse_activity SET position=$posicion WHERE head_id=$idRecPrev AND educational_resource_id=$idRec";
            $objDatos->operacionesCrud($sql);
        }
    }
    
    /*
     * Bajar de posición un ítem respecto a su moemnto de presentación en un 
     * recurso educativo específico
     * 
     * @param       $id         int             codigo del ítem del recurso educativo
     * 
     * @return      null
     * 
     */
    function bajarItem($id, $idRec){
        $objDatos = new clsDatos();
        $sql = "SELECT position FROM recourse_activity WHERE head_id=$id AND educational_resource_id=$idRec";
        $posicion = $objDatos->consultarUnRegistro($sql)['position'];
        $sql = "SELECT head_id FROM recourse_activity WHERE position=($posicion+1) AND educational_resource_id=$idRec";
        $idHeadNext = $objDatos->consultarUnRegistro($sql)['head_id'];
        $sql = "SELECT count(educational_resource_id) as count FROM recourse_activity WHERE educational_resource_id=$idRec";
        $tam = $objDatos->consultarUnRegistro($sql)['count'];
        if($posicion<$tam){
            $sql = "UPDATE recourse_activity SET position=($posicion+1) WHERE head_id=$id AND educational_resource_id=$idRec";
            $objDatos->operacionesCrud($sql);
            $sql = "UPDATE recourse_activity SET position=$posicion WHERE head_id=$idHeadNext AND educational_resource_id=$idRec";
            $objDatos->operacionesCrud($sql);
        }
    }
    
    /*
     * Listar los títulos de capitulos de un libro
     * 
     * @param       $id         int             codigo del ítem del recurso educativo
     * 
     * @return      $array      array           id, conteninido, ordenado por la posicion
     * 
     */
    function capitulosLibro($id){
        $objDatos = new clsDatos();
        $sql = "SELECT h.id as id, b.id as idbody, h.content as capitulo, 
                b.content as contenido, b.image_support as imagen, ra.position as orden  
                FROM body b, head h, recourse_activity ra 
                WHERE b.head_id=h.id AND h.id=ra.head_id AND ra.educational_resource_id=$id 
                ORDER BY position";
        return $objDatos->executeQuery($sql);
    }
    
    /*
     * Listar recursos disponibles para ser integrados, entrega los objetos del mismo area de
     * conocimiento y que atieneden la misma necesidad.
     * 
     * @param       $categoriaEle       int     Codigo de la sub area de conocimeitnos a la que pertenece el oa
     *              $needEle            int     Codigo de la necesidad especial de educacion
     *              $idUsuario          int     Identrificador del autor.
     * 
     * @return      $lista              array   Lista de los objetos ya existentes, entrega
     *                                          id, nombre, descripción
     */
    function listarOASIntegrar($categoriaEle, $needEle, $idUsuario, $id){
        $objDatos = new clsDatos();
        $sql = "SELECT DISTINCT (er.id), er.title, er.description   
                FROM educational_resource er, recourse_activity ra
                WHERE er.user_id_author=$idUsuario AND er.reference_need_id=$needEle AND er.reference_area_knowledge_id=$categoriaEle AND er.id<>$id 
                 AND ra.educational_resource_id=er.id and ra.head_id not in(Select head_id from recourse_activity where educational_resource_id=$id) ";
        return $objDatos->executeQuery($sql);
    }
    
    
    /*
     * devuelve un true si es un head perteneciente a un recurso de multiples objetoss
     * 
     */
    function union($idItem){
        $objDatos = new clsDatos();
        $sql = "SELECT count(head_id) AS count FROM recourse_activity WHERE head_id=$idItem ";
        $cantidad = $objDatos->consultarUnRegistro($sql)['count'];
        if ($cantidad>1){
            return true;
        }else{
            return false;
        }
    }
    
    
    /*
     * 
     */
    function agregarActividad($id, $idItem){
        $objDatos = new clsDatos();
        $sql = "SELECT MAX(position) AS pos FROM recourse_activity WHERE educational_resource_id=$id";
        $posicion = $objDatos->consultarUnRegistro($sql)['pos'];
        #if($pos)
        $sql = "SELECT head_id AS id FROM recourse_activity where educational_resource_id=".$idItem;
        $datos = $objDatos->executeQuery($sql);
        if($datos){
            $sql = "INSERT INTO recourse_activity (head_id, educational_resource_id, position) VALUES ";
            foreach ($datos as $value){
                $posicion++;
                $sql .= "(".$value['id'].", ".$id.", ".$posicion."), ";
            }
            $sql = rtrim($sql, ", ");
        }
        $objDatos->operacionesCrud($sql);
        $mensaje = "Datos actualizados";
        return $mensaje;
    }
    
    
    /*
     * funciones de Adrian para agregar lengua de señas
     */
    
    /**
    * Permite subir una imagen tomada de formulario al servidor
    * con el fin de tenerla en un mismo sitio para el momento que
    * esta se necesite.
    * @param String $name - nombre de la imágen
    * @param String $size - tamaño de la imágen
    * @param String $type - tipo o extensión de la imágen
    * @param String $tName - nombre de la imágen dentro de la carpeta temporal 
    * @param String $bandera - permite saber si encontró el valor o no, si es false no lo encontró, de lo contrario sí.
    * @return $msg - mensaje informativo de la subida
    */
    function validarSenaeImagen($name, $size, $type, $tName, $bandera){
        $uploadedfileload="true"; $msg="";
        if ($bandera == false) {
            $msg = $msg."El sistema no cuenta con una seña para este valor, intenta insertando un valor diferente.";
        }
        if ($name != null and $name != '' and $size != null and $size != '' and $type!= null and $type!= '' and $tName != null and $tName != '') {
            if ($size>2000000){
                $msg=$msg." El archivo es mayor a 2 MB, debe reducirlo antes de subirlo. ";
                $uploadedfileload="false";
            }
            if (!($type =="image/jpeg" OR $type =="image/png")){
                $msg=$msg." El archivo tiene que ser JPG o PNG. ";
                $uploadedfileload="false";
            }
            $add="../images/all/$name.png";
            if($uploadedfileload=="true"){
                if(move_uploaded_file ($tName, $add)){

                }else{
                    $msg=$msg."Error al subir el archivo";
                }
            }
            return $msg;
        }
    }

    function rutaImagen($ruta){
        return '../images/all/'.$ruta.'.png';
    }
    /**
    * Permite mostrar un mensaje en caso de que el valor ingresado no fue encontrado para la actividad escribir
    * @param String $bandera - permite saber si encontró el valor o no, si es false no lo encontró, de lo contrario sí.
    * @param String $name - tamaño de la imágen
    * @param String $name - tipo o extensión de la imágen
    * @param String $name - nombre de la imágen dentro de la carpeta temporal 
    * @return $msg - mensaje informativo
    */
    function validarSenaEscribir($bandera, $posicion){
        $msg = '';
        if ($bandera == false and $posicion > 0) {
            $msg = $msg."El sistema no cuenta con una seña para este valor, intenta insertando un valor diferente";
        }
        return $msg;
    }

    function quitar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n-","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }

    /**
    * Devuelve el valor ingresado sin espacios
    * @param String $cadena - valor ingresado
    * @return $cadena - valor de cadena filtrado
    */
    function deEspacioAguion($cadena){
        $valor='';
        $array_cadena = str_word_count($cadena, 0); // cuenta palabras
        if ($array_cadena == 1) {
            $cadena = trim($cadena);
            return $cadena;
        }elseif($array_cadena > 1){
            $split = explode(" ", $cadena);
            $numRegistros = count($split);
            for($i=0;$i<$numRegistros;$i++){
                if ($split[$i] != null and $split[$i] != '') { // permite entrar solo los que no son espacio o nulos
                    $valor .= $split[$i].'_'; // concatena todas las palabras válidas, dejando un guión por espacio y uno al final.
                }    
            }
            $cadena = substr($valor, 0, -1); // borra el guión final
        }
        return $cadena;
    }
    
    /**
    * Permite Insertar en la tabla Head los ítems creados en la actividad de emparejar
    * @param String $content - El valor a agregar.
    * @param String $retroalimentación - El valor de la retroalimentación para la actividad
    */
    function modificarHeadEmparejar($id, $retroalimentacion){
        #$objDatos = new clsDatos();
        global $objDatos;
        $sql = "UPDATE head SET feedback='$retroalimentacion' WHERE id=$id";
        $objDatos->operacionesCrud($sql);
    }
    
	
    /**
    * Permite Insertar en la tabla Head los ítems creados en la actividad de emparejar
    * @param String $content - El valor a agregar.
    * @param String $retroalimentación - El valor de la retroalimentación para la actividad
    */
    function InsertarHeadEmparejar($content, $retroalimentacion){
        #$objDatos = new clsDatos();
        if ($content != '' and $content != null and $retroalimentacion != '' and $retroalimentacion != null) {

        global $objDatos;
        $sql = "INSERT INTO head (content, feedback, reference_type_activity_id) "
                . "VALUES ('$content',  '$retroalimentacion', 11)";
        $objDatos->operacionesCrud($sql);
    }
    }

	/**
	* Permite Listar de la tabla Head los valores almacenados
	* @param String $i - número de ítem a consultar.
	*/
	function listarHeadEmparejar(){
            $SelectContent = "SELECT * FROM head ORDER BY id DESC LIMIT 1";
            $exe_SelectContent = pg_query($SelectContent);
            $fetch_SelectContent = pg_fetch_array($exe_SelectContent);
            return $fetch_SelectContent;
        }
        
        function listaItemsPorActividad($id){
            $objDatos = new clsDatos();
            $sqlItems = "SELECT * from body where head_id = $id";
            return $objDatos->executeQuery($sqlItems);
        }

        
	/**
	* Permite Insertar en la tabla Body los ítems creados en la actividad de emparejar
	* @param String $head_id - Actividad a la cuál pertenece cada ítem creado.
	* @param String $Content - El valor de la retroalimentación para la actividad
	*/
	function modificarBodyEmparejar($id, $Content){
            global $objDatos;
            $sql = "UPDATE body SET content='$Content' WHERE id=$id";
            $objDatos->operacionesCrud($sql);
	}
        
	/**
	* Permite Insertar en la tabla Body los ítems creados en la actividad de emparejar
	* @param String $head_id - Actividad a la cuál pertenece cada ítem creado.
	* @param String $Content - El valor de la retroalimentación para la actividad
	*/
	function InsertarBodyEmparejar($head_id, $Content, $arrayName){
            if ($head_id != '' and $head_id != null and $Content != '' and $Content != null) {
                            global $objDatos;

                $sql = "INSERT INTO body (head_id, content, image_support, response) VALUES ($head_id, '$Content', '$arrayName', TRUE)";
                $objDatos->operacionesCrud($sql);
            }
	}

	/**
	* Permite Insertar en la tabla Head los ítems creados en la actividad de Opción correcta
	* @param String $respuestaCorrect - El valor a agregar.
	* @param String $retroalimentación - El valor de la retroalimentación para la actividad
	*/
	function modificarHeadOptionCorrect($id, $retroalimentacion){
            global $objDatos;
            $sql = "UPDATE head SET feedback='$retroalimentacion' WHERE id=$id";
            $objDatos->operacionesCrud($sql);
	}

	/**
	* Permite Insertar en la tabla Head los ítems creados en la actividad de Opción correcta
	* @param String $respuestaCorrect - El valor a agregar.
	* @param String $retroalimentación - El valor de la retroalimentación para la actividad
	*/
	function InsertarHeadOptionCorrect($respuestaCorrect, $retroalimentacion){
            if ($respuestaCorrect != '' and $respuestaCorrect != null and $retroalimentacion != '' and $retroalimentacion != null) {
                            global $objDatos;

                $sql = "INSERT INTO head (content, feedback, reference_type_activity_id) "
                    . "VALUES ('$respuestaCorrect','$retroalimentacion',10)";
                $objDatos->operacionesCrud($sql);
            }
	}

	/**
	* Permite Listar de la tabla Head los valores almacenados
	*/
	function listarHead(){
            $SelectContent = "SELECT * from head order by id desc LIMIT 1";
            $exe_SelectContent = pg_query($SelectContent);
            $fetch_SelectContent = pg_fetch_array($exe_SelectContent);
            return $fetch_SelectContent;
	}

	/**
	* Permite Insertar en la tabla Body los ítems creados en la actividad de Opción correcta y Respuesta Correcta
	* @param String $head_id - Actividad a la cuál pertenece cada ítem creado.
	* @param String $Content - El valor de la retroalimentación para la actividad
	* @param String $boolean - Valor del campo response, puede ser TRUE o FALSE
	*/
        function modificarBodyOCCorrect($id, $Content, $respuesta){
            global $objDatos;
            $sql = "UPDATE body SET content='$Content', response=$respuesta WHERE id=$id;";
            $objDatos->operacionesCrud($sql);
	}
        
        function InsertarBodyOCCorrect($head_id, $Content, $imagenCorrect){
        if ($head_id != '' and $head_id != null and $Content != '' and $Content != null) {
            global $objDatos;

            $sql = "INSERT INTO body (head_id, content, image_support, response) VALUES ($head_id, '$Content', '$imagenCorrect', TRUE)";
            $objDatos->operacionesCrud($sql);
        }
	}

    function InsertarBodyRCorrect($head_id, $Content){
        if ($head_id != '' and $head_id != null and $Content != '' and $Content != null) {
            global $objDatos;

            $sql = "INSERT INTO body (head_id, content, response) VALUES ($head_id, '$Content', TRUE)";
            $objDatos->operacionesCrud($sql);
        }
    }

        function InsertarBodyOCCorrectFalsas($head_id, $Content, $ImagesFalsas){
            
        if ($head_id != '' and $head_id != null and $Content != '' and $Content != null) {
            global $objDatos;
            $sql = "INSERT INTO body (head_id, content, image_support, response) VALUES ($head_id, '$Content', '$ImagesFalsas', FALSE)";
            $objDatos->operacionesCrud($sql);
        }
        }

	/**
	* Permite Insertar en la tabla recourse_activity los ítems creados
	* @param String $head_id - Actividad a la cuál pertenece cada ítem creado.
	* @param String $id - El identificador del recurso educativo
	*/
	function InsertRecourse($head_id, $id, $pos){
        if ($head_id != '' and $head_id != null and $id != '' and $id != null and $pos != '' and $pos != null) {

            global $objDatos;

            $sql = "INSERT INTO recourse_activity VALUES ($head_id, $id, $pos)";
            $objDatos->operacionesCrud($sql);
        }

	}

	/**
	* Permite Insertar en la tabla Head los encabezados creados en la actividad de Respuesta correcta y Respuesta Correcta
	* @param String $respuesta - El valor de la retroalimentación para la actividad
	* @param String $retroalimentación - El valor de la retroalimentación para la actividad
	*/
        function modificarHeadResponseCorrect($respuesta, $retroalimentacion, $id){
            global $objDatos;
            $sql = "UPDATE head SET content='$respuesta', feedback='$retroalimentacion' WHERE id=$id";
            $objDatos->operacionesCrud($sql);
	}
        
	function InsertarHeadResponseCorrect($respuesta, $retroalimentacion){
        if ($respuesta != '' and $respuesta != null and $retroalimentacion != '' and $retroalimentacion != null) {

            global $objDatos;
            $sql = "INSERT INTO head (content, feedback, reference_type_activity_id) "
                    . " VALUES ('$respuesta','$retroalimentacion', 9)";
            $objDatos->operacionesCrud($sql);
        }
	}

	/**
	* Permite Listar de la tabla recourse_activity los valores almacenados
	* @param String $id - El identificador del recurso educativo
	*/
	function SelectHeadRecourse($id){
            global $objDatos;
            $sql = "SELECT head_id FROM recourse_activity WHERE educational_resource_id = $id LIMIT 1";
            return $objDatos->operacionesCrud($sql);
	}

    function numHeadByRecourse($id){

            $sql = "SELECT count(head_id) as total FROM recourse_activity WHERE educational_resource_id = $id";
            $sql_query = pg_query($sql);
            $sql_fetch = pg_fetch_array($sql_query);
            return $sql_fetch['total'];
    }
    
    /*
     * cosas de adrian
     */
	
    function cosasAdrian($id){
        global $objDatos;
        $comprueboEnsena1 = "SELECT head_id "
                . "FROM recourse_activity WHERE educational_resource_id = $id LIMIT 1";
        #$exe_comprueboEnsena1 = pg_query($comprueboEnsena1);
        #$fetch_comprueboEnsena1 = pg_fetch_array($exe_comprueboEnsena1);
        $fetch_comprueboEnsena1 = $objDatos->consultarUnRegistro($comprueboEnsena1)["head_id"];
        return (String) $fetch_comprueboEnsena1;
    }
	
?>