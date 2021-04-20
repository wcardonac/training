<?php
require_once 'app/config.php';
require 'app/Conexion.php';
require_once 'app/Repositorio_Usuario.php';

$titulo = 'mi blog';
require_once "plantillas/head.php";
require_once 'plantillas/barramenu.php';

?>
<div class="container">
  <div class="jumbotron">
    <h1> Blog</h1>

    <p>Blog dedicado a la programacion y el desarrollo</p>
    <?php
    #Conexion::abrir_conexion();
    # $usuarios=RepositorioUsuario::obtener_todos_usuario(Conexion::obtener_conexion());
    # echo !isset($usuarios);
    ?>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>Busqueda
            </div>
            <div class="panel-body">
              <div class="form-group">
                <input type="search " class="form-control" placeholder="que buscas">
              </div>
              <button class="form-control">Buscar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>Filtro
            </div>
            <div class="panel-body">

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Archivo
            </div>
            <div class="panel-body">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-time" aria-hidden="true"></span>Ultimas Entradas
        </div>
        <div class="panel-body">
          <!--- esi incluimos el codigo php quue deseamos usar en nuestra pagina
          lo podemos usar las veces que lo necsitemos---->

          <p>Todavia no hay entradas que mastrar</p>
        </div>
      </div>

    </div>

  </div>
</div>

<?php
require_once 'plantillas/cierre.php';
?>