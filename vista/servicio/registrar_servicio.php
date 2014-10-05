    <h1 class="page-header">Registrar servicio</h1>
    <!-- EMPIEZA: RECOMENDACION -->
      <div class="alert alert-info" role="alert">
        <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar un servicio en el sistema.
      </div>
    <!-- FIN: RECOMENDACION -->
    <form role="form" class="form" action="../controlador/control_servicio.php" method="POST" name="form_servicio">
        <input type="hidden" value="registrar_servicio" name="operacion" />
        <input type="hidden"  name="idservicio" id="cam_idservicio"/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_nombreser">Nombre <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Nombre del servicio."></i></strong></label>
                  <input type="text" name="nombreser" class="form-control" id="cam_nombreser">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_enlaceser">Enlace <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Enlace del servicio."></i></strong></label>
                  <input type="text" name="enlaceser" class="form-control" id="cam_enlaceser">
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_idmodulo">Módulo <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Módulo al que pertenece el servicio."></i></strong></label>
                  <select name="idmodulo" class="form-control" id="cam_idmodulo" required>
                        <option value="">Seleccione un módulo</option>
                        <?php
                            require_once('../clases/clase_modulo.php');
                                $lobjModulo=new clsModulo;
                                $laModulos=$lobjModulo->consultar_modulos();
                                for($i=0;$i<count($laModulos);$i++)
                                {
                                    echo '<option value="'.$laModulos[$i][0].'">'.$laModulos[$i][1].'</option>';
                                }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_visibleser">Tipo <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Tipo de servicio."></i></strong></label>
                      <div class="row">
                        <div class="col-md-4">
                            <label>
                                Sub-Módulo
                                <input type="radio" name="visibleser" value="1" id="cam_visibleser" checked/>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                                Operación
                                <input type="radio" name="visibleser" value="0" id="cam_visibleser"/>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=servicio/servicio';"><i class="fa fa-chevron-left"></i> Regresar</button>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-danger center-block" name="btn_enviar" id="btn_enviar"><i class="fa fa-check"></i> Aceptar</button>
          </div>
        </div>
    </form>
