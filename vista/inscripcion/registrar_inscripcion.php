<!--/**
* Registrar Inscripción = vista ; Permite registrar a los estudiantes en un curso.
*
* @package    ModeloAulafrontino
* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
* @link       https://github.com/EquipoAulaFrontino
* @version    v1.0
*/-->
<?php
    require_once("../clases/clase_curso.php");
    $lobjCurso=new clsCurso;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjCurso->set_Curso($id);
    $laCurso=$lobjCurso->consultar_curso();
?>
<h1 class="page-header">Registrar Inscripciones</h1>
<!-- EMPIEZA: RECOMENDACION -->
  <div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras inscribir los estudiantes en el curso.
  </div>
<!-- FIN: RECOMENDACION -->
<form class="form" role="form" action="../controlador/control_inscripcion.php" method="POST" name="form_inscripcion">
    <input type="hidden" value="registrar_inscripcion" name="operacion" />
    <input type="hidden"  name="idcurso" id="cam_idcurso" value="<?php print($laCurso['idcurso']);?>"/>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="cam_nombre_curso">Nombre del curso <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del curso donde se inscribirán los estudiantes."><i class="fa fa-question" ></i></span></label>
                <input readOnly type="text" class="form-control" name="nombre_curso" id="cam_nombre_curso" value="<?php print($laCurso['nombrecur']);?>" required/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="cam_nombre_asi">Asignatura <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Asignatura que se impartirá."><i class="fa fa-question" ></i></span></label>
                <input readOnly  type="text"  class="form-control"  name="nombre_asi" id="cam_nombre_asi" value="<?php print($laCurso['nombreasi']);?>" required/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="cam_nombre_profesor">Profesor <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Profesor del curso."><i class="fa fa-question" ></i></span></label>
                <input readOnly  type="text"  class="form-control"  name="nombre_profesor" id="cam_nombre_profesor" value="<?php print($laCurso['profesor']);?>" required/>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="cam_seccion">Sección <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Sección en la que se inscribiran los estudiantes."><i class="fa fa-question" ></i></span></label>
                <input readOnly  type="text"  class="form-control"  name="seccion" id="cam_seccion" value="<?php print($laCurso['seccioncur']);?>" required/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="cam_cupos_disponibles">Cupos Disponibles <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Cupos Disponibles."><i class="fa fa-question" ></i></span></label>
                <input readOnly  type="text"  class="form-control"  name="cupos_disponibles" id="cam_cupos_disponibles" value="<?php print($laCurso['cupos_disponiblecur']);?>" required/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="cam_total_inscritos">Total Inscritos <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Total inscritos en el curso."><i class="fa fa-question" ></i></span></label>
                <input readOnly  type="text"  class="form-control"  name="total_inscritos" id="cam_total_inscritos" value="<?php print($laCurso['cant_inscritoscur']);?>" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="cell-border compact hover stripe table table-striped">
                <thead>
                    <th>Nro</th><th>Cédula</th><th>Apellidos</th><th>Nombres</th><th>Inscribir</th>
                </thead>
                <tbody>
                <?php
                    require_once('../clases/clase_estudiante.php');
                    require_once('../clases/clase_inscripcion.php');
                    $lobjEstudiante=new clsEstudiante;
                    $lobjInscripcion=new clsInscripcion;
                    $laEstudiantes=$lobjEstudiante->listar_estudiantes();
                    $cont=0;
                    for($i=0;$i<count($laEstudiantes);$i++)
                    {
                        if(!$lobjInscripcion->validar_inscripcion($laEstudiantes[$i]['idestudiante'], $laCurso['idcurso']))
                        {
                            echo '<tr>';
                            echo '<td>'.($i+1).'</td>';
                            echo '<td>'.$laEstudiantes[$i]['cedulaest'].'</td>';
                            echo '<td>'.$laEstudiantes[$i]['apellido_unoest'].' '.$laEstudiantes[$i]['apellido_dosest'].'</td>';
                            echo '<td>'.$laEstudiantes[$i]['nombre_unoest'].' '.$laEstudiantes[$i]['nombre_dosest'].'</td>';
                            echo '<td><input type="checkbox" name="inscribir[]" value="'.$laEstudiantes[$i]['idestudiante'].'" class="form-control checkbox"/></td>';
                            echo '</tr>';
                            $cont++;
                        }
                    }
                    if($cont<=0)
                    {
                        echo '<tr>';
                        echo '<td colspan="5">No existen estudiantes registrados sin inscribir en este curso.</td>';
                        echo '</tr>';
                    }
                ?>
                    </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=inscripcion/curso';"><i class="fa fa-chevron-left"></i> Regresar</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-danger center-block" name="btn_enviar" id="btn_enviar"><i class="fa fa-check"></i> Aceptar</button>
        </div>
    </div>
</form>
<script>
$( "input[type=checkbox]" ).on( "click", function() {
    var cupos_disponibles = parseInt($('#cam_cupos_disponibles').val());
    if(cupos_disponibles>0)
    {
        if($(this).prop("checked"))
        {
            var cupos_disponibles = parseInt($('#cam_cupos_disponibles').val());
            var total_inscritos  = parseInt($('#cam_total_inscritos').val());
            $('#cam_cupos_disponibles').val(cupos_disponibles-1);
            $('#cam_total_inscritos').val(total_inscritos+1);
        }
        else
        {
            var cupos_disponibles = parseInt($('#cam_cupos_disponibles').val());
            var total_inscritos  = parseInt($('#cam_total_inscritos').val());
            $('#cam_cupos_disponibles').val(cupos_disponibles+1);
            $('#cam_total_inscritos').val(total_inscritos-1);
        }
    }
    else
    {
        alert('Se ha inscrito el total de cupos disponibles para este curso');
        $(this).prop("checked", false);
    }
});
</script>