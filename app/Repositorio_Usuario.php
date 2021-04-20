
<?php
require_once 'ValidadorRegistro.php';
/*Esta clase trabajara con la clase Usuario.php
nota una de las buenas practicas para tener en cuenta es que cada clase que se valla 
 atrabajar con la base de datos tenga su propio repositorio, en el repositorio escribimos todas las consultas
 que podamos necesitar con ese tipo de clase:
 ejemlo= recuperar todos los usuarios, o recupererar solo los usarios que esten activos o las claves*/

class RepositorioUsuario
{
        /*para hacer esto vamos a usar metodos static de forma que le pidamos algo a esta clase y 
        no la devuelva direcatmente sin necesidad de instanciarlo como usaurio*/

        public static function obtener_todos_usuario($conexion)
        {
                $usuarios = array();/*dentro de esta variable guadaremos todos los usaurios 
                que se nos puedan devolver */

                #por seguridad y buena practica vamos a comprovar si $conexionexiste
                if (isset($conexion)) {

                        /*todas las operaciones en las que hayan que hacer como conecatr a la db
                         leer archivos es mejor haverlo por este medio try catch*/
                        try {
                                #recuperar los usaurios
                                include_once('Usuario.php');

                                $sql = "SELECT * FROM usuarios";

                                $sentencia = $conexion->prepare($sql);
                                $sentencia->execute();

                                $resultado = $sentencia->fetchAll();

                                if (count($resultado)) {
                                        foreach ($resultado as $fila) {
                                                $usuarios[] = new Usuario($fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']);
                                        }
                                } else {
                                        echo "no hay usuarios";
                                }
                        } catch (PDOException $th) {
                                echo " ERROR" . $th->getMessage(); // esto es por si hay un error
                        }
                }
                return $usuarios;
        }
        public static function obtener_numero_de_usuarios($conexion){
                $total_usuarios=null;

                if(isset($conexion)){
                        try {
                              $sql ="SELECT COUNT(*) as total from usuarios";
                              $sentencia = $conexion ->prepare ($sql);
                              $sentencia->execute();
                              $resultado = $sentencia -> fetch();
                              
                              $total_usuarios = $resultado['total'];
                        } catch (PDOException $th) {
                                print "ERROR". $th->getMessage();
                                
                        }
                }return $total_usuarios;

        }

        public static function inserta_usuario($conexion, $usuario){
                $usuario_insertado = false;

                if (isset($conexion)) {
                        try {
                                $sql = " INSERT INTO usuarios(nombre,email,password,fecha_registro,activo) VALUES(:nombre,:email,:password,NOW(),0)";
                                $sentencia = $conexion -> prepare($sql);
                                //binparam() se usa para atar paarmetros o enlazaar parametros
                                /*
                                $sentencia -> bindparam(':nombre', $usuario -> $_POST['nonbre'], PDO::PARAM_STR);
                                $sentencia -> bindparam(':email',  $usuario ->  $_POST['email'], PDO::PARAM_STR);
                                $sentencia -> bindparam(':password', $usuario ->  $_POST['password'], PDO::PARAM_STR); 
                                 */
                                $sentencia -> bindParam(':nombre', $usuario -> get_obtener_nombre(), PDO::PARAM_STR);
                                $sentencia -> bindParam(':email',  $usuario -> get_obtener_email(), PDO::PARAM_STR);
                                $sentencia -> bindParam(':password', $usuario -> get_obtener_password(), PDO::PARAM_STR); 
                                
                                
                                $sentencia -> execute();
                        } catch (PDOException $th) {
                                echo 'ERROR'. $th ->getMessage();
                        }
                }
                return $usuario_insertado;
        }

        public static function nombre_existe($conexion,$nombre){
                $nombre_existe = true;

                if(isset($conexion)){
                        try {
                                $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
                                $sentencia = $conexion ->prepare($sql);

                                $sentencia -> bindParam (':nombre',$nombre, PDO::PARAM_STR);

                                $sentencia -> execute();
                                $resultado = $sentencia -> fetchAll();

                                if (count($resultado)) {
                                        $nombre_existe = true;
                                }else {
                                        $nombre_existe = false;  
                                }
                        } catch (PDOException $th) {
                                echo 'ERROR' . $th ->getMessage();    
                        }
                       
                }
                return $nombre_existe;

        }
        public static function email_existe($conexion,$email){
                $email_existe = true;

                if(isset($conexion)){
                        try {
                                $sql = "SELECT * FROM usuarios WHERE email = :email";
                                $sentencia = $conexion ->prepare($sql);

                                $sentencia -> bindParam (':email',$email, PDO::PARAM_STR);
                                
                                $sentencia -> execute();
                                $resultado = $sentencia -> fetchAll();

                                if (count($resultado)) {
                                        $email_existe = true;
                                }else{
                                        $email_existe = false;
                                }
                        } catch (PDOException $th) {
                                echo 'ERROR' . $th ->getMessage();    
                        }
                       
                }
                return $email_existe;

        }
}
?>