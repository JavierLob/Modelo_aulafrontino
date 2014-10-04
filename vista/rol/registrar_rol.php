<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Registrar Rol</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar un rol en el sistema.</div>
    <form class="formulario" action="../controlador/control_rol.php" method="POST" name="form_rol">
        <input type="hidden" value="registrar_rol" name="operacion" />
        <input type="hidden"  name="idrol" id="cam_idrol"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del rol."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="nombrerol" id="cam_nombrerol" required/>
            </div>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="ACEPTAR">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=rol/rol';">
        </div>
    </form>
</div>