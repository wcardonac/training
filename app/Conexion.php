<?php

require_once 'ValidadorRegistro.php';

class Conexion{

        private static $conexion;

   
       
    

        public static function abrir_conexion(){
                if(!isset(self::$conexion)){
                        try {
/*
tenemos dos driver para trabajar con la base de datos mysqli y PDO.
mysqli -> solo trabaja con la base de datos de mysql
PDO->  trabaja con diferentes bases de datos incluyendo mysql , esta es muy buena opcion por que
si se llega a utilizar otra base de datos no habria problema  */                             
                                
                                #include_one:con esto havemos que solo se cargue una vez pero se podrian cargar multiples archivos
                                #include:                
                                #require:
                                require_once 'config.php';//con esto hacemos que sea obligatorio la cargada del archivo,
                                #pero solo se cargaria una vez
                                self::$conexion = new PDO('mysql:host='.NOMBRE_SERVIDOR.';dbname='.NOMBRE_DB,NOMBRE_USUARIO,PASSWORD);
                                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                self::$conexion -> exec("SET CHARACTER SET utf8");
                               
                        } catch (PDOException $th) {
                               echo "ERROR" . $th ->getMessage()."<br";
                               die();//con este metodo termino la conexion
                        }
                }
        }

        public static function cerrar_conexion(){
                if (isset(self::$conexion)) {
                       self::$conexion = null;
                      
                }
        }

        public static function obtener_conexion(){
                return self::$conexion;
                //de esta manenera optenemos una referencia a $conexion asi fuese privaada

                // y la podemos
        }



}

?>