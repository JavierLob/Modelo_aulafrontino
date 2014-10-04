<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Registrar Módulo</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar un módulo en el sistema.</div>
    <form class="formulario" action="../controlador/control_modulo.php" method="POST" name="form_modulo">
        <input type="hidden" value="registrar_modulo" name="operacion" />
        <input type="hidden"  name="idmodulo" id="cam_idmodulo"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del módulo."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="nombremod" id="cam_nombremod" required/>
            </div>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="ACEPTAR">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=modulo/modulo';">
        </div>
    </form>
</div>