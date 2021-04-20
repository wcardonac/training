<div class="form-group">
        <label for="">nombre usuario</label>
        <input type="text" class="form-control" name="nombre" placeholder="desarrollador junior" <?php $validador -> mostrar_nombre() ?>>
        <?php
        $validador->mostrar_error_nombre();
        ?>
</div>
<div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" placeholder="@mail" <?php $validador->mostrar_email() ?>>
        <?php
        $validador->mostrar_error_email();
        ?>
</div>
<div class="form-group">
        <label for="">Contraseña</label>
        <input type="password" class="form-control" name="clave1" placeholder="">
        <?php
        $validador->mostrar_error_clave1();
        ?>
</div>
<div class="form-group">
        <label for="">Confirmar contraseña</label>
        <input type="password" class="form-control" name="clave2">
        <?php
        $validador->mostrar_error_clave2();
        ?>
</div>
<br>
<button type="reset" class="btn btn-default btn-primary">Limpiar formulario</button>
<br>
<br>
<button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar</button>