<?php

require_once 'Repositorio_Usuario.php';
require_once 'Conexion.php';
        /* esta clase es para controlar todo lo que sucede con el registro */
        class ValidadorRegistro{

                private $aviso_inicio;
                private $aviso_cierre;

                private $nombre;
                private $email;
                private $clave;
                
                private $error_nombre;
                private $error_email;
                private $error_clave1;
                private $error_clave2;

                public function __construct($nombre, $email, $clave1, $clave2,$conexion)
                {
                        $this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
                        $this -> aviso_cierre = "</div>";
                        $this -> nombre = "";
                        $this -> email = "";
                        $this -> clave = "";

                        $this -> error_nombre = $this -> validar_nombre($conexion,$nombre);
                        $this -> error_email = $this -> validar_email($conexion,$email);
                        $this -> error_clave1 = $this -> validar_clave1($clave1);
                        $this -> error_clave2 = $this -> validar_clave2($clave1, $clave2);

                        if ( $this -> error_clave1 === "" &&  $this -> error_clave2 === "") {
                                $this -> clave = $clave1;
                        }
                }

                private function variable_iniciada($variable){
                        if(isset($variable) && !empty($variable)){
                                return true;
                        }else{
                                return false;
                        }

                }

                private function validar_nombre($conexion,$nombre){
                        if (!$this -> variable_iniciada($nombre)) {
                               return "debes escribir tu nombre de usuario";
                        }else{
                                $this -> nombre =$nombre;
                        }
                        if(strlen($nombre) <3){
                                return "verifica, el nomnbre esta muy corto";
                        }
                        if (strlen($nombre) >24 ) {
                               return "el nombre no debe ser mayor de 24 caracteres";
                        }
                        if (RepositorioUsuario::nombre_existe($conexion,$nombre)) {
                                return "este nombre ya existe";
                        }
                              
                        return "";

                }

                private function validar_email($conexion,$email){
                        if(!$this-> variable_iniciada($email)){
                                return "debes de ingresar un correo";
                        }else{
                                $this -> email =$email;
                        }
                        if (RepositorioUsuario::email_existe($conexion,$email)) {
                                return "este email ya existe pruebe otro o <a href='#'>intente recuperar su contraseña</a>";
                        }
                        return "";

                }

                private function validar_clave1 ($clave1){
                        if(!$this-> variable_iniciada($clave1)){
                             return "debes escribr una clave";   
                        }
                        return "";
                        
                }

                private function validar_clave2 ($clave1,$clave2){
                        if (!$this-> variable_iniciada($clave1)) {
                              return "Primero debes escribir una contraeña";
                        }
                        if(!$this -> variable_iniciada($clave2)){
                                return "Debes escribir las contraseña";
                        }
                        if($clave1 !== $clave2){
                                return " Ambas claves deben de ser iguales";
                        }
                        return "";
                        
                }

                #vamos a usar los datos que estan como privados desde afuara 

                #primero los getters

                public function get_obtener_nombre(){
                        return $this -> nombre;
                }
                public function get_obtener_email(){
                        return $this -> email;
                }
                public function get_obtener_clave(){
                        return $this -> clave;
                }
                public function get_obtener_error_nombre(){
                        return $this -> error_nombre;
                }
                public function get_obtener_error_email(){
                        return $this -> error_email;
                }
               
                public function get_obtener_error_clave1(){
                        return $this -> error_clave1;
                }
                public function get_obtener_error_clave2(){
                        return $this -> error_clave2;
                }



                public function mostrar_nombre(){
                        if($this -> nombre !==""){
                                echo 'value="'. $this -> nombre .'"';
                        }
                }

                public function mostrar_email(){
                        if($this -> email !==""){
                                echo 'value="'. $this -> email.'"';
                        }
                }

                public function mostrar_error_nombre(){
                        if($this -> error_nombre !==""){
                           echo $this -> aviso_inicio. $this -> error_nombre. $this->aviso_cierre;
                        }
                }

                public function mostrar_error_email(){
                        if($this -> error_email !==""){
                           echo $this ->aviso_inicio. $this -> error_email. $this->aviso_cierre;
                        }
                }

                public function mostrar_error_clave1(){
                        if($this -> error_clave1 !==""){
                           echo $this ->aviso_inicio. $this -> error_clave1. $this->aviso_cierre;
                        }
                }

                public function mostrar_error_clave2(){
                        if($this -> error_clave2 !==""){
                           echo $this ->aviso_inicio. $this -> error_clave2. $this->aviso_cierre;
                        }
                }

                public function registro_valido(){
                        if($this -> error_nombre ==="" &&
                                $this -> error_email ==="" &&
                                $this -> error_clave1 ==="" &&
                                $this -> error_clave2 ==="" ){
                                        return true;
                                }else{
                                        return false;
                                }
                }


}
