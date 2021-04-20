<?php
#por convencion los archivos que inician en mayusculas representan clases
 
class Usuario{
        #estos son los atributos
        # le damos un atributo de visibilidad  con private
        # esto significa que ningun archivo podra acceder a esta variable desde fuera de la clase
        private $id;
        private $nombre;
        private $email;
        private $password;
        private $fecha_registro;
        private $activo;

        #aqui construimos metodos muy comunes en el trabajo con las clases

        #creacion del constructor de la clase Usuario

        public function __construct($id,$nombre,$email,$password,$fecha_registro,$activo){
              $this -> id = $id;//id atributo de la clase va a ser igual al id que pasamos en el constructor
              //con this diferenciamos las dos variables
              $this -> nombre = $nombre;
              $this -> email = $email;
              $this -> password = $password;
              $this -> fecha_registro = $fecha_registro;
              $this -> activo = $activo;
        }

        #funciones getters son funciones que nos permiten recuperar,
        #las funciones gettres solo nos permiten leer las varibles o atributos que le dimos a la clase 
        # no cambiar su valor
        #variables de una clase

        public function get_obtener_id(){
                return $this-> id;
        }

        public function get_obtener_nombre(){
                return $this-> nombre;
        }

        public function get_obtener_email(){
                return $this-> email;
        }

        public function get_obtener_password(){
                return $this-> password;
        }

        public function get_obtener_fecha_registro(){
                return $this-> fecha_registro;
        }

        public function get_obtener_activo(){
                return $this-> activo;
        }

        #metodos o funciones settters
        #nos permiten cambiar datos o metodos de una clase

        public function set_cambiar_nombre($nombre){
                $this->nombre =$nombre;
        }

        public function set_cambiar_email($email){
                $this->nombre =$email;
        }

        public function set_cambiar_clave($password){
                $this->nombre =$password;
        }

        public function set_cambiar_activo($activo){
                $this->nombre =$activo;
        }

        

}


?>