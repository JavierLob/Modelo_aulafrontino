    <h1 class="page-header">Registrar Asignatura</h1>
    <!-- EMPIEZA: RECOMENDACION -->
      <div class="alert alert-info" role="alert">
        <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar un Asignatura en el sistema.
      </div>
    <!-- FIN: RECOMENDACION -->
    <form role="form" class="form" action="../controlador/control_asignatura.php" method="POST" name="form_asignatura">
        <input type="hidden" value="registrar_asignatura" name="operacion" />
        <input type="hidden"  name="idasignatura" id="cam_idasignatura"/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_codigoasi">Código <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Código de la asignatura."></i></strong></label>
                  <input type="text" name="codigoasi" class="form-control" id="cam_codigoasi" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_nombreasi">Nombre <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Nombre de la asignatura."></i></strong></label>
                  <input type="text" name="nombreasi" class="form-control" id="cam_nombreasi" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_descripcionasi">Descripción <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Descripción de la asignatura."></i></strong></label>
                  <input type="text" name="descripcionasi" class="form-control" id="cam_descripcionasi" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_anoasi">Año <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Año en el cual se cursa la asignatura."></i></strong></label>
                  <select type="text" name="anoasi" class="form-control" id="cam_anoasi" required>
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
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_descripcionasi">Unidad de crédito <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Cantidad de Unidad de crédito de la asignatura."></i></strong></label>
                  <select type="text" name="unidad_creditoasi" class="form-control" id="cam_unidad_creditoasi" required>
                    <option value="">Elegir</option>
                    <?php
                        for($i=1;$i<=8;$i++)
                        {
                            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                        }
                    ?>
                </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_horas_duracionasi">Horas <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Cantidad de horas de la asignatura."></i></strong></label>
                  <select type="text" name="horas_duracionasi" class="form-control" id="cam_horas_duracionasi" required>
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
        </div>
           <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cam_descripcionasi">Observación <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Observación con respecto a la asignatura."></i></strong></label>
                    <textarea name="observacionasi" class="form-control" id="cam_observacionasi"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=asignatura/asignatura';"><i class="fa fa-chevron-left"></i> Regresar</button>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-danger center-block"><i class="fa fa-check" name="btn_enviar" id="btn_enviar"></i> Aceptar</button>
          </div>
        </div>
    </form>
