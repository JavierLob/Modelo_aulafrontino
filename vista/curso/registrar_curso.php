<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Registrar Curso</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar un Curso en el sistema.</div>
    <form class="formulario" action="../controlador/control_curso.php" method="POST" name="form_curso">
        <input type="hidden" value="registrar_curso" name="operacion" />
        <input type="hidden"  name="idcurso" id="cam_idcurso"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del curso."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="nombrecur" id="cam_nombrecur" required/>
            </div>
            <div class="col-lg-6 span6">            
                <label>Sección <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sección del curso."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="seccioncur" id="cam_seccioncur" required/>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Fecha de apertura <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de apertura del curso."><i class="fa fa-question" ></i></span></label>
                <div class="input-append date" data-date="" id="dp2" data-date-format="dd-mm-yyyy">
                  <input class="span12" size="16" name="fecha_aperturacur" id="cam_fecha_aperturacur" type="text" required>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
            <div class="col-lg-6 span6">            
                <label>Fecha de cierrre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Fecha de cierrre del curso."><i class="fa fa-question" ></i></span></label>
                <div class="input-append date" data-date="" id="dp1" data-date-format="dd-mm-yyyy">
                  <input class="span12" size="16" name="fecha_cierrecur" id="cam_fecha_cierrecur" type="text" required>
                  <span class="add-on"><i class="icon-th"></i></span>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Cupos disponibles <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cantidad de cupos disponibles para el curso."><i class="fa fa-question" ></i></span></label>
                <select type="text" name="cupos_disponiblecur" id="cam_cupos_disponiblecur" required>
                    <option value="">Elegir</option>
                    <?php
                        for($i=1;$i<=50;$i++)
                        {
                            echo '<option value="'.$i.'" >'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-6 span6">            
                <label>Asignatura <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Asignatura para el curso."><i class="fa fa-question" ></i></span></label>
                <select type="text" name="idasignatura" id="cam_idasignatura" required>
                    <option value="">Elegir</option>
                    <?php
                        require_once('../clases/clase_asignatura.php');
                        $lobjAsignatura=new ClsAsignatura;
                        $laAsignaturas=$lobjAsignatura->listar_asignaturas_activas();
                        for($i=0;$i<count($laAsignaturas);$i++)
                        {
                            echo '<option value="'.$laAsignaturas[$i]['idasignatura'].'" >'.$laAsignaturas[$i]['nombreasi'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>   
        <div class="row-fluid">
            <div class="col-lg-6 span6">            
                <label>Profesor <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Profesor que dictará el curso."><i class="fa fa-question" ></i></span></label>
                <select type="text" name="idprofesor" id="cam_idprofesor" required>
                    <option value="">Elegir</option>
                     <?php
                        $laProfesores=$lobjAsignatura->listar_profesores_activos();
                        for($i=0;$i<count($laProfesores);$i++)
                        {
                            echo '<option value="'.$laProfesores[$i]['idprofesor'].'" >'.$laProfesores[$i]['cedulapro'].' - '.$laProfesores[$i]['nombre_unopro'].' '.$laProfesores[$i]['apellido_unopro'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="ACEPTAR">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=curso/curso';">
        </div>
    </form>
</div>
<script>
    $('#dp1').datepicker();
    $('#dp2').datepicker();
</script>