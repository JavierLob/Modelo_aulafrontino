
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Registrar Estudiante</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar un Estudiante en el sistema.</div>
    <form class="formulario" action="../controlador/control_estudiante.php" method="POST" name="form_estudiante">
        <input type="hidden" value="registrar_estudiante" name="operacion" />
        <input type="hidden"  name="idestudiante" id="cam_idestudiante"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Cédula <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cédula estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="cedulaest" id="cam_cedulaest" required/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Primer nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Primer nombre del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="nombre_unoest" id="cam_nombre_unoest" required/>
            </div>
            <div class="col-lg-6 span6">
                <label>Segundo nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Segundo nombre del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="nombre_dosest" id="cam_nombre_dosest" required/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Primer apellido <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Primer apellido del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="apellido_unoest" id="cam_apellido_unoest" required/>
            </div>
            <div class="col-lg-6 span6">
                <label>Segundo apellido <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Segundo apellido del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="apellido_dosest" id="cam_apellido_dosest" required/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Sexo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del estudiante."><i class="fa fa-question" ></i></span></label>
                <select name="sexoest" id="cam_sexoest" required>
                    <option value="M">MASCULINO</option>
                    <option value="F">FEMENINO</option>
                </select>
            </div>
            <div class="col-lg-6 span6">
                <label>Dirección <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Dirección de habitación del estudiante."><i class="fa fa-question" ></i></span></label>
                <textarea name="direccionest" id="cam_direccionest"></textarea>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Teléfono habitación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Teléfono de habitación del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="telefono_habest" id="cam_telefono_habest" required/>
            </div>
            <div class="col-lg-6 span6">
                <label>Teléfono móvil <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Teléfono movil personal del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="telefono_movest" id="cam_telefono_movest" required/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Correo electrónico <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Correo electrónico del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="correoest" id="cam_correoest" required/>
            </div>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="ACEPTAR">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=estudiante/estudiante';">
        </div>
    </form>
</div>