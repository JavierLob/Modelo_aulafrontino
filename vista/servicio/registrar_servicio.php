
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Registrar servicio</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar un servicio en el sistema.</div>
    <form class="formulario" action="../controlador/control_servicio.php" method="POST" name="form_servicio">
        <input type="hidden" value="registrar_servicio" name="operacion" />
        <input type="hidden"  name="idservicio" id="cam_idservicio"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del servicio."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="nombreser" id="cam_nombreser" required/>
            </div>
            <div class="col-lg-6 span6">
                <label>Enlace <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Enlace del servicio."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="enlaceser" id="cam_nombreser" required/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Módulo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Módulo al que pertenece el servicio."><i class="fa fa-question" ></i></span></label>
                <select name="idmodulo" id="cam_idmodulo" required>
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
            <div class="col-lg-6 span6">
                <label>Tipo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Tipo de servicio."><i class="fa fa-question" ></i></span></label>
                <div class="row-fluid">
                    <div class="span4">
                        <label>
                            Sub-Módulo
                            <input type="radio" name="visibleser" value="1" id="cam_visibleser" checked/>
                        </label>
                    </div>
                    <div class="span4">
                        <label>
                            Operación
                            <input type="radio" name="visibleser" value="0" id="cam_visibleser"/>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="ACEPTAR">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=servicio/servicio';">
        </div>
    </form>
</div>