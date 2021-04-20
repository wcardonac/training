<?php
require_once 'app/config.php';
require_once 'app/Conexion.php';
require_once 'app/config.php';
require_once 'app/Usuario.php';
require_once 'app/Repositorio_Usuario.php';
require_once 'app/ValidadorRegistro.php';
require_once 'app/Redireccion.php';
if(isset($_POST['enviar'])){
        Conexion:: abrir_conexion();
        $validador = new ValidadorRegistro($_POST['nombre'],$_POST['email'],
                $_POST['clave1'],$_POST['clave2'], Conexion::obtener_conexion());

                if ($validador -> registro_valido()) {
                       $usuario = new Usuario('', $validador ->get_obtener_nombre(),
                       $validador -> get_obtener_email(),
                       password_hash($validador ->get_obtener_clave(),PASSWORD_BCRYPT),
                       '','');
                       $usuario_insertado = RepositorioUsuario :: inserta_usuario(Conexion::obtener_conexion(),$usuario);

                       if ($usuario_insertado) {
                        echo "registro correcto";      
                        //Redireccion::redirigir(RUTA_REGISTRO_CORRECTO.'?nombre='.$usuario -> get_obtener_nombre());  
                       }
                }

                Conexion:: cerrar_conexion();

        }

$titulo = 'Registro';
require_once "plantillas/head.php";
require_once 'plantillas/barramenu.php';

?>

<div class="container">
        <div class="jumbotron">
                <h1 class="text-center">Formulario Registro</h1>
        </div>
</div>
<div class="container">
        <div class="row">
                <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                        <h3 class="panel.tittle">
                                                Instrucciones
                                        </h3>
                                </div>
                                <div class="panel-body">
                                        <br>
                                        <br>
                                        <p class="text-justify">
                                                para unirte a mi blog debes de ingresar varios datosghgfkjshdfgdfksjhjhgsdfg
                                                gjshgjhsdfkjshgdfkjhsdkjhfgskdjhfg
                                                hsgjshgdkfjhsgkfjhsgkdjhfgskjdfhgksdjhfgksjdhfgksjhdfgksjhdfgkjshdfgkjsdhfg
                                        </p>
                                        <br>
                                        <br>
                                        <a href="#">¿Ya Tienes Cuenta?</a>
                                        <br>
                                        <a href="#">¿Olvidaste tu Contraeña?</a>
                                </div>
                        </div>
                </div>
                <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                        <h3 class="panel.tittle">
                                                Introduce tus datos
                                        </h3>
                                </div>
                                <div class="panel-body">
                                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                                           <?php  if(isset($_POST['enviar'])){
                                                   require_once 'plantillas/registro_validado.php';
                                           }else{
                                                require_once 'plantillas/registro_vacio.php';
                                           } 
                                           ?>     
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</div>


<?php
require_once 'plantillas/cierre.php';
?>