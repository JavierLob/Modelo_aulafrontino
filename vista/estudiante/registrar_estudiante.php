<h1 class="page-header">Registrar Estudiante</h1>
<!-- EMPIEZA: RECOMENDACION -->
  <div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar un Estudiante en el sistema.
  </div>
<!-- FIN: RECOMENDACION -->
<form class="formulario" action="../controlador/control_estudiante.php" method="POST" name="form_estudiante">
    <input type="hidden" value="registrar_estudiante" name="operacion" />
    <input type="hidden"  name="idestudiante" id="cam_idestudiante"/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_cedulaest">Cédula <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cédula estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="cedulaest" class="form-control" id="cam_cedulaest" required/>
                <div class="status_per"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_nombre_unoest">Primer nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Primer nombre del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="nombre_unoest" id="cam_nombre_unoest" required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_nombre_dosest">Segundo nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Segundo nombre del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text"  class="form-control"  name="nombre_dosest" id="cam_nombre_dosest" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_apellido_unoest">Primer apellido <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Primer apellido del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="apellido_unoest" id="cam_apellido_unoest" required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_apellido_dosest">Segundo apellido <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Segundo apellido del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="apellido_dosest" id="cam_apellido_dosest" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_direccionest">Dirección <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Dirección de habitación del estudiante."><i class="fa fa-question" ></i></span></label>
                <textarea class="form-control" name="direccionest" id="cam_direccionest"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_sexoest">Sexo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del estudiante."><i class="fa fa-question" ></i></span></label>
                <select class="form-control" name="sexoest" id="cam_sexoest" required>
                    <option value="M">MASCULINO</option>
                    <option value="F">FEMENINO</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_telefono_habest">Teléfono habitación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Teléfono de habitación del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="telefono_habest" id="cam_telefono_habest" required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_telefono_movest">Teléfono móvil <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Teléfono movil personal del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="telefono_movest" id="cam_telefono_movest" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_correoest">Correo electrónico <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Correo electrónico del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="email" class="form-control" name="correoest" id="cam_correoest" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=estudiante/estudiante';"><i class="fa fa-chevron-left"></i> Regresar</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-danger center-block" name="btn_enviar" id="btn_enviar"><i class="fa fa-check"></i> Aceptar</button>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    $("#cam_cedulaest").change(function() { 
        var valor_consultar = $("#cam_cedulaest").val();
        $("#status_per").html('<img src="../bootstrap/img/loader.gif" align="absmiddle">&nbsp;Analizando...');
            $.ajax({  
                type: "POST",  
                url: "../controlador/control_estudiante.php",
                data: {cedulaest:valor_consultar,operacion:"consultar_estudiante"},  
                success: function(data){
                    if(data=='1')
                    {
                        $("#status_per").hide();
                        $("#btn_enviar").prop( "disabled", true );
                        alert('Este estudiante ya está registrado en el sistema.');                              
                    }
                    else
                    {
                        $("#btn_enviar").prop( "disabled", false );
                        $("#status_per").hide();                             
                    }
                }
            });
    });
});
</script>