<?php
    require_once("../clases/clase_estudiante.php");
    $lobjEstudiante=new clsEstudiante;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjEstudiante->set_Estudiante($id);
    $laEstudiante=$lobjEstudiante->consultar_estudiante();
?>
<h1 class="page-header">Consultar/Modificar Estudiante</h1>
<!-- EMPIEZA: RECOMENDACION -->
  <div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras consultar y/o modificar los datos de un Estudiante en el sistema.
  </div>
<!-- FIN: RECOMENDACION -->
<form class="formulario" action="../controlador/control_estudiante.php" method="POST" name="form_estudiante">
    <input type="hidden" value="editar_estudiante" name="operacion" />
    <input type="hidden"  name="idestudiante" id="cam_idestudiante" value="<?php print($laEstudiante['idestudiante']);?>" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_cedulaest">Cédula <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cédula estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="cedulaest" class="form-control" id="cam_cedulaest" value="<?php print($laEstudiante['cedulaest']);?>" required/>
                <div class="status_per"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_nombre_unoest">Primer nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Primer nombre del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="nombre_unoest" id="cam_nombre_unoest" value="<?php print($laEstudiante['nombre_unoest']);?>" required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_nombre_dosest">Segundo nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Segundo nombre del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text"  class="form-control"  name="nombre_dosest" id="cam_nombre_dosest" value="<?php print($laEstudiante['nombre_dosest']);?>" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_apellido_unoest">Primer apellido <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Primer apellido del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="apellido_unoest" id="cam_apellido_unoest" value="<?php print($laEstudiante['apellido_unoest']);?>" required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_apellido_dosest">Segundo apellido <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Segundo apellido del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="apellido_dosest" id="cam_apellido_dosest" value="<?php print($laEstudiante['apellido_dosest']);?>" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_direccionest">Dirección <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Dirección de habitación del estudiante."><i class="fa fa-question" ></i></span></label>
                <textarea class="form-control" name="direccionest" id="cam_direccionest"><?php print($laEstudiante['direccionest']);?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_sexoest">Sexo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sexo del estudiante."><i class="fa fa-question" ></i></span></label>
                <select class="form-control" name="sexoest" id="cam_sexoest" required>
                    <option value="M" <?php if($laEstudiante['sexoest']=='M'){ print('SELECTED');} ?>>MASCULINO</option>
                    <option value="F" <?php if($laEstudiante['sexoest']=='F'){ print('SELECTED');} ?>>FEMENINO</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_telefono_habest">Teléfono habitación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Teléfono de habitación del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="telefono_habest" id="cam_telefono_habest" value="<?php print($laEstudiante['telefono_habest']);?>" required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_telefono_movest">Teléfono móvil <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Teléfono movil personal del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="telefono_movest" id="cam_telefono_movest" value="<?php print($laEstudiante['telefono_movest']);?>" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_correoest">Correo electrónico <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Correo electrónico del estudiante."><i class="fa fa-question" ></i></span></label>
                <input type="email" class="form-control" name="correoest" id="cam_correoest" value="<?php print($laEstudiante['correoest']);?>" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=estudiante/estudiante';"><i class="fa fa-chevron-left"></i> Regresar</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-danger center-block"><i class="fa fa-check" name="btn_enviar" id="btn_enviar"></i> Aceptar</button>
        </div>
    </div>
</form>