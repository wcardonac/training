<?php
require_once 'app/config.php';
require_once 'app/Conexion.php';
require_once 'app/Usuario.php';
require_once 'app/Repositorio_Usuario.php';
require_once 'app/Redireccion.php';

if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
        //echo $_GET['nombre'];
        $nombre = $_GET['nombre'];
} else {
        //echo 'hasta aqui me funcionaba';
        Redireccion::redirigir(RUTA_REGISTRO_CORRECTO);
}

$titulo = 'registro correcto';


require_once "plantillas/head.php";
require_once 'plantillas/barramenu.php';
?>
<div class="container">
        <div class="row">
                <div class="col-md-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>Registro correcto
                                </div>
                                <div class="panel-body text-center">
                                <p>gracias ppr registrate <?php echo $nombre ?></p>
                                <br>
                                <p><a href="<?php  echo RUTA_LOGIN ?>">Inicia sesion</a>para comenzar a usar tu cuenta</p>
                                </div>
                        </div>
                </div>
        </div>
</div>