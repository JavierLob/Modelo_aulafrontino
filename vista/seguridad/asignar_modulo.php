<!--
* Asignación de módulo = vista ; Permite asignar a los modulos a los roles.
*
* @package    ModeloAulafrontino
* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
* @link       https://github.com/EquipoAulaFrontino
* @version    v1.0
*/-->
<script type="text/javascript">
    function buscar_modulo(idrol)
    {
        window.location.href="intranet.php?vista=seguridad/asignar_modulo&id="+idrol;
    }
</script>
<h1 class="page-header">Asignar módulo</h1>
<!-- EMPIEZA: RECOMENDACION -->
<div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras asignar los módulos  al rol que seleccione.
</div>
<form class="form" role="form" action="../controlador/control_rol.php" method="POST" name="form_servicio">
    <input type="hidden" value="asignar_modulo" name="operacion" />
     <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label for="cam_idrol">Rol <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Rol al cual se le asignarán los módulos."></i></strong></label>
              <select type="text" name="idrol" class="form-control" id="cam_idrol" onchange="buscar_modulo(this.value);" required>
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
    <h3>Módulos</h3>
    <div class="row">
        <div class="col-md-6">

        <?php
            require_once('../clases/clase_modulo.php');
            $lobjModulo=new clsModulo;
            $laModulos=$lobjModulo->consultar_modulos();

            $lobjRol->set_Rol($_GET['id']);
            $laModulos_Rol=$lobjRol->consultar_modulos();
            for($i=0;$i<count($laModulos);$i++)
            {
                $cheked='';
                for($j=0;$j<count($laModulos_Rol);$j++)
                {
                    if($laModulos_Rol[$j][0]==$laModulos[$i][0])
                    {
                        $cheked='checked';  
                        break;
                    }
                }
            
                echo '<div class="form-group"><label>
                        <input type="checkbox" name="idmodulo[]" value="'.$laModulos[$i][0].'" '.$cheked.'>'.$laModulos[$i][1].'
                    </label></div>';
            }
        ?>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=seguridad/asignacion';"><i class="fa fa-chevron-left"></i> Regresar</button>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-danger center-block" name="btn_enviar" id="btn_enviar"><i class="fa fa-check" ></i> Aceptar</button>
      </div>
    </div>        
</form>
