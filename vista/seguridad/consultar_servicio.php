<?php
    require_once("../clases/clase_servicio.php");
    $lobjServicio=new clsServicio;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjServicio->set_Servicio($id);
    $laServicio=$lobjServicio->consultar_servicio();
?>
    <h1 class="page-header">Consultar servicio</h1>
    <!-- EMPIEZA: RECOMENDACION -->
      <div class="alert alert-info" role="alert">
        <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar un servicio en el sistema.
      </div>
    <!-- FIN: RECOMENDACION -->
    <!-- EMPIEZA: FORMULARIO -->
    <form role="form" class="form" action="../controlador/control_servicio.php" method="POST" name="form_servicio">
        <input type="hidden" value="editar_servicio" name="operacion" />
        <input type="hidden"  name="idservicio" id="cam_idservicio" value="<?php echo $laServicio[0];?>"/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_nombreser">Nombre <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Nombre del servicio."></i></strong></label>
                  <input type="text" name="nombreser" class="form-control" id="cam_nombreser" value="<?php echo $laServicio[1];?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="cam_enlaceser">Enlace <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Enlace del servicio."></i></strong></label>
                  <input type="text" name="enlaceser" class="form-control" id="cam_enlaceser" value="<?php echo $laServicio[2];?>">
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
                                    if($laServicio[3]==$laModulos[$i][0])
                                    {
                                        echo '<option value="'.$laModulos[$i][0].'" selected>'.$laModulos[$i][1].'</option>';
                                    }
                                    else
                                    {
                                        echo '<option value="'.$laModulos[$i][0].'" >'.$laModulos[$i][1].'</option>';
                                    }
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
                                <input type="radio" name="visibleser" value="1" id="cam_visibleser" <?php if($laServicio[4]=='1'){echo 'checked';}?>/>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                                Operación
                                <input type="radio" name="visibleser" value="0" id="cam_visibleser" <?php if($laServicio[4]=='0'){echo 'checked';}?>/>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=seguridad/servicio';"><i class="fa fa-chevron-left"></i> Regresar</button>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-danger center-block"><i class="fa fa-check" name="btn_enviar" id="btn_enviar"></i> Aceptar</button>
          </div>
        </div>
    </form>
    <!-- FIN: FORMULARIO -->