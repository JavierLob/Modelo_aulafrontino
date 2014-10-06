/**
* Consultar Curso = vista ; Permite ver y modificar un curso.
*
* @package    ModeloAulafrontino
* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
* @link       https://github.com/EquipoAulaFrontino
* @version    v1.0
*/
<?php
    require_once("../clases/clase_curso.php");
    $lobjCurso=new clsCurso;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjCurso->set_Curso($id);
    $laCurso=$lobjCurso->consultar_curso();
?>
<h1 class="page-header">Consultar Curso</h1>
<!-- EMPIEZA: RECOMENDACION -->
  <div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar un Curso en el sistema.
  </div>
<!-- FIN: RECOMENDACION -->
<form role="form" class="form" action="../controlador/control_curso.php" method="POST" name="form_curso">
    <input type="hidden" value="editar_curso" name="operacion" />
    <input type="hidden"  name="idcurso" id="cam_idcurso" value="<?php echo $laCurso['idcurso'];?>"/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label for="cam_nombrecur">Nombre <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Nombre del curso."></i></strong></label>
              <input type="text" name="nombrecur" class="form-control" id="cam_nombrecur" value="<?php echo $laCurso['nombrecur'];?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
              <label for="cam_seccioncur">Sección <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Sección del curso."></i></strong></label>
              <input type="text" name="seccioncur" class="form-control" id="cam_seccioncur" value="<?php echo $laCurso['seccioncur'];?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label for="cam_fecha_aperturacur">Fecha de apertura <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Fecha de apertura del curso."></i></strong></label>
                  <div class="input-group input-append date" data-date="" id="dp1" data-date-format="dd-mm-yyyy">
                      <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                      <input class="form-control" name="fecha_aperturacur" id="cam_fecha_aperturacur" value="<?php echo $laCurso['fecha_aperturacur'];?>" type="text" required>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
              <label for="cam_fecha_cierrecur">Fecha de cierrre <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Fecha de cierrre del curso."></i></strong></label>
                  <div class="input-group date" data-date="" id="dp2" data-date-format="dd-mm-yyyy">
                      <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                      <input class="form-control" name="fecha_cierrecur" id="cam_fecha_cierrecur" value="<?php echo $laCurso['fecha_cierrecur'];?>" type="text" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">            
            <div class="form-group">
                <label for="cam_cupos_disponiblecur">Cupos disponibles <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Cantidad de cupos disponibles para el curso."></i></strong></label>
                <select class="form-control" name="cupos_disponiblecur" id="cam_cupos_disponiblecur" required>
                    <option value="">Elegir</option>
                    <?php
                        for($i=1;$i<=50;$i++)
                        {
                            $selected=($i==$laCurso['cupos_disponiblecur'])?'selected':'';
                            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">            
            <div class="form-group">
                <label for="cam_idasignatura">Asignatura <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Asignatura para el curso."></i></strong></label>        
                <select class="form-control" name="idasignatura" id="cam_idasignatura" required>
                    <option value="">Elegir</option>
                    <?php
                        require_once('../clases/clase_asignatura.php');
                        $lobjAsignatura=new ClsAsignatura;
                        $laAsignaturas=$lobjAsignatura->listar_asignaturas_activas();
                        for($i=0;$i<count($laAsignaturas);$i++)
                        {
                            $selected=($laAsignaturas[$i]['idasignatura']==$laCurso['idasignatura'])?'selected':'';
                            echo '<option value="'.$laAsignaturas[$i]['idasignatura'].'" '.$selected.'>'.$laAsignaturas[$i]['nombreasi'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>   
    <div class="row">
        <div class="col-md-6">            
            <div class="form-group">
                <label for="cam_idprofesor">Profesor <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Profesor que dictará el curso."></i></strong></label>
                <select class="form-control" name="idprofesor" id="cam_idprofesor" required>
                    <option value="">Elegir</option>
                     <?php
                        $laProfesores=$lobjAsignatura->listar_profesores_activos();
                        for($i=0;$i<count($laProfesores);$i++)
                        {
                            $selected=($laProfesores[$i]['idprofesor']==$laCurso['idprofesor'])?'selected':'';
                            echo '<option value="'.$laProfesores[$i]['idprofesor'].'" '.$selected.'>'.$laProfesores[$i]['cedulapro'].' - '.$laProfesores[$i]['nombre_unopro'].' '.$laProfesores[$i]['apellido_unopro'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=curso/curso';"><i class="fa fa-chevron-left"></i> Regresar</button>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-danger center-block"><i class="fa fa-check" name="btn_enviar" id="btn_enviar"></i> Aceptar</button>
      </div>
    </div>
</form>
<script>
$(document).ready(function() {
    $('#dp1').datepicker();
    $('#dp2').datepicker();
});
</script>