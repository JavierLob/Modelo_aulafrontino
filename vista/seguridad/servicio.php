/**
* Servicio = vista ; Permite ver el listado de servicios registrados.
*
* @package    ModeloAulafrontino
* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
* @link       https://github.com/EquipoAulaFrontino
* @version    v1.0
*/
<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
        $laServicios=$lobjRol->consultar_servicios($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='seguridad/consultar_servicio')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='seguridad/registrar_servicio')
            {

                $registrar=true;
            }
            if($laServicios[$j][2]=='seguridad/eliminar_servicio')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=seguridad/consultar_servicio&id="+id;
 }
  function eliminar(id)
  {
     if(confirm("¿Esta seguro que desea eliminar el módulo seleccionado?"))
    {
      document.getElementById("cam_idservicio").value=id;
      document.form_servicio.submit();
    }
  }
</script>    
    <h1 class="page-header">Servicios</h1>
    <!-- EMPIEZA: RECOMENDACION -->
          <div class="alert alert-info" role="alert">
            <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar, cosultar, modificar y eliminar los servicios del sistema.
          </div>
    <!-- FIN: RECOMENDACION -->
    <?php
    if($registrar)
    {
        echo '<a class="btn btn-success" id="btn_registrar" href="?vista=seguridad/registrar_servicio"><i class="fa fa-plus"></i> Registrar servicio</a>';
    }
    ?>
    <!-- EMPIEZA: FORMULARIO -->
    <form role="form" class="form" action="../controlador/control_servicio.php" method="POST" name="form_servicio">
        <input type="hidden" value="eliminar_servicio" name="operacion" />
        <input type="hidden"  name="idservicio" id="cam_idservicio"/>
        <table class="cell-border compact hover stripe" id="filtro">
            <thead>
                <th>Codigo</th><th>Nombre</th><th>enlace</th><th>módulo</th><?php if($consultar || $eliminar)
                        { echo '<th>Operación</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_servicio.php');
                    $lobjServicio=new clsServicio;
                    $laServicios=$lobjServicio->consultar_servicios();
                    for($i=0;$i<count($laServicios);$i++)
                    {
                        echo '<tr>';
                        echo '<td>'.$laServicios[$i][0].'</td>';
                        echo '<td>'.$laServicios[$i][1].'</td>';
                        echo '<td>'.$laServicios[$i][2].'</td>';
                        echo '<td>'.$laServicios[$i][3].'</td>';
                        if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar)
                            {
                                echo '<a class="btn btn-info" href="#" onclick="buscar('.$laServicios[$i][0].')"><i class="fa fa-search"></i></a>';
                            }
                            if($eliminar)
                            {
                                echo ' <a class="btn btn-danger" href="#" onclick="eliminar('.$laServicios[$i][0].')" ><i class="fa fa-remove"></i></a>';
                            }
                            echo "</td>";
                        }
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
    </form>
    <!-- FIN: FORMULARIO -->