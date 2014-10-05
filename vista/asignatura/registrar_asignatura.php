<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Registrar Asignatura</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar un Asignatura en el sistema.</div>
    <form class="formulario" action="../controlador/control_asignatura.php" method="POST" name="form_asignatura">
        <input type="hidden" value="registrar_asignatura" name="operacion" />
        <input type="hidden"  name="idasignatura" id="cam_idasignatura"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Código <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Código de la asignatura."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="codigoasi" id="cam_codigoasi" required/>
            </div>
            <div class="col-lg-6 span6">
                <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre de la asignatura."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="nombreasi" id="cam_nombreasi" required/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Descripción <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Descripción de la asignatura."><i class="fa fa-question" ></i></span></label>
                <textarea name="descripcionasi" id="cam_descripcionasi" required></textarea>
            </div>
            <div class="col-lg-6 span6">
                <label>Año <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Año en el cual se cursa la asignatura."><i class="fa fa-question" ></i></span></label>
                <select type="text" name="anoasi" id="cam_anoasi" required>
                    <option value="">Elegir</option>
                    <?php
                        for($i=1;$i<=6;$i++)
                        {
                            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Unidad de crédito <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad de Unidad de crédito de la asignatura."><i class="fa fa-question" ></i></span></label>
                <select type="text" name="unidad_creditoasi" id="cam_unidad_creditoasi" required>
                    <option value="">Elegir</option>
                    <?php
                        for($i=1;$i<=8;$i++)
                        {
                            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-6 span6">            
                <label>Horas <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad de horas de la asignatura."><i class="fa fa-question" ></i></span></label>
                <select type="text" name="horas_duracionasi" id="cam_horas_duracionasi" required>
                    <option value="">Elegir</option>
                    <?php
                        for($i=1;$i<=10;$i++)
                        {
                            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>   
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Observación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Observación con respecto a la asignatura."><i class="fa fa-question" ></i></span></label>
                <textarea name="observacionasi" id="cam_observacionasi"></textarea>
            </div>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="ACEPTAR">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=asignatura/asignatura';">
        </div>
    </form>
</div>