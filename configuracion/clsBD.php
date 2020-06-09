<?php

/**
* Class clsDatos
*
* @package configuracion/clsBD.php
*
* @author Angela Perez
* @date 01/03/2015
* 
* pasos conexion php con BD
* 1. conexion con el  servidor de datos
* 2. conexion con la base de datos
* 3. hacer la consulta SQL
* 4. extraer informacion
* 5. cierre de la conexion
*
*/
class clsDatos {
    //variable global declarada para establecer la conexión con la base de datos.
    private $conexion;

    /**
    * CUMPLE CON EL PASO 1 Y PASO 2, es el metodo de construcción donde se establece
    * la conección con la base de datos y el servidor postgresql.
    *
    */
    public function __construct(){
        $servidor = "127.0.0.1";
        $puerto = "5432";
        $baseDatos = "gaia_tools";
        $usuario = "postgres";
        #$clave = "root";
        $clave = "%froac$";
        $this->conexion=pg_connect("host='$servidor' port='$puerto' dbname='$baseDatos' user='$usuario' password='$clave'");
        if(!$this->conexion){
            echo"<p><center><h1>No hay conexion con la base de datos. <br> INTENTE MAS TARDE</h1></center></p>";
            exit;
        }
    }

    /**
    * CUMPLE CON EL PASO 3, 4
    *
    * @param string $sql
    * @return array resultado de la consulta sql.
    */
    public function executeQuery($sql){
            return pg_fetch_all(pg_query($this->conexion, $sql));
    }

    /**
    * CUMPLE CON EL PASO 3, 4
    *
    * @param string $sql
    * @return array resultado de la consulta sql, extrae un unico registro.
    */
    public function consultarUnRegistro($sql){
        $arreglo = $this->executeQuery($sql);
        return $arreglo[0];
    }

    /**
    * CUMPLE CON EL PASO 3 para consultas sql de update, insert o delete.
    *
    * @param string $sql
    */
    public function operacionesCrud($sql){
            pg_query($this->conexion, $sql);
    }

    /**
    * CUMPLE CON EL PASO 5 cierre de la conexion
    */
    public function cerrarConexion(){
            pg_close($this->conexion);
    }
}
?>
