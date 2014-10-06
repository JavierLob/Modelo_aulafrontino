/**
* Asignación de servicios = vista ; Permite asignar a los servicios a los roles.
*
* @package    ModeloAulafrontino
* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
* @link       https://github.com/EquipoAulaFrontino
* @version    v1.0
*/
<h1 class="page-header">Asignar servicio</h1>
<!-- EMPIEZA: RECOMENDACION -->
<div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras asignar los servicios al rol que seleccione.
</div>
<form class="form" role="form" action="../controlador/control_rol.php" method="POST" name="form_servicio">
    <input type="hidden" value="asignar_servicio" name="operacion" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_codigoasi">Rol <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Rol al cual se le asignarán los servicios de los módulos que tiene asignado."></i></strong></label>
                <select name="idrol" id="cam_idrol" class="form-control" onchange="buscar_modulo(this.value);" required>
                    <option value="">Seleccione un rol</option>
                    <?php
                        require_once('../clases/clase_rol.php');
                        $lobjRol=new clsrol;
                        $laroles=$lobjRol->consultar_roles();
                        for($i=0;$i<count($laroles);$i++)
                        {
                            if($laroles[$i][0]==$_GET['id'])
                            {
                                echo '<option value="'.$laroles[$i][0].'" selected>'.$laroles[$i][1].'</option>';
                            }
                            else
                            {
                                echo '<option value="'.$laroles[$i][0].'">'.$laroles[$i][1].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lm-12">
            <h3>Servicios</h3>
            <?php
                $lobjRol->set_Rol($_GET['id']);
                $laModulos=$lobjRol->consultar_modulos();
                for($i=0;$i<count($laModulos);$i++)
                {
                    require_once('../clases/clase_servicio.php');
                    $lobjServicio=new clsServicio;
                    $laServicios=$lobjServicio->consultar_servicios_modulo($laModulos[$i][0]);
                    echo '<div class="col-md-6">';                  
                        echo '<h5>'.$laModulos[$i][1].'</h5>';
                        if($laServicios)
                        {
                            echo '<div class="col-md-12">';
                                $laServicios_Rol=$lobjRol->consultar_servicios($laModulos[$i][0]);
                                for($j=0;$j<count($laServicios);$j++)
                                {                        
                                    $cheked='';
                                    for($k=0;$k<count($laServicios_Rol);$k++)
                                    {
                                        if($laServicios[$j][0]==$laServicios_Rol[$k][0])
                                        {
                                           $cheked='checked';
                                           break;
                                        }
                                    }
                                    echo '<div class="form-group"><label>
                                            <input type="checkbox" name="idservicio[]" value="'.$laServicios[$j][0].'" '.$cheked.'>'.$laServicios[$j][1].'
                                            </label></div>';
                                }
                            echo '</div>';
                        }
                        else
                        {
                            echo '<p class="text-danger" >Este módulo no tiene servicios registrados</p>';
                        }
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=seguridad/asignar_modulo';"><i class="fa fa-chevron-left"></i> Regresar</button>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-danger center-block" name="btn_enviar" id="btn_enviar"><i class="fa fa-check" ></i> Aceptar</button>
      </div>
  </div>
</form>
<script type="text/javascript">
    function buscar_modulo(idrol)
    {
        window.location.href="intranet.php?vista=seguridad/asignar_servicio&id="+idrol;
    }
</script>