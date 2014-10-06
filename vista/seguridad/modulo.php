/**
* Módulo = vista ; Permite ver el listado de módulos registrados.
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
            if($laServicios[$j][2]=='seguridad/consultar_modulo')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='seguridad/registrar_modulo')
            {

                $registrar=true;
            }
            if($laServicios[$j][2]=='seguridad/eliminar_modulo')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=seguridad/consultar_modulo&id="+id;
 }
  function eliminar(id)
  {
     if(confirm("¿Esta seguro que desea eliminar el módulo seleccionado?"))
    {
      document.getElementById("cam_idmodulo").value=id;
      document.form_modulo.submit();
    }
  }
</script>    
<h1 class="page-header">Módulo</h1>
<!-- EMPIEZA: RECOMENDACION -->
<div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar, cosultar, modificar y eliminar los módulos del sistema.
</div>
<!-- FIN: RECOMENDACION -->
<?php
if($registrar)
{
    echo '<a class="btn btn-success" id="btn_registrar" href="?vista=seguridad/registrar_modulo"><i class="fa fa-plus"></i> Registrar módulo</a>';
}
?>
<!-- EMPIEZA: FORMULARIO -->
<form role="form" class="form" action="../controlador/control_modulo.php" method="POST" name="form_modulo">
    <input type="hidden" value="eliminar_modulo" name="operacion" />
    <input type="hidden"  name="idmodulo" id="cam_idmodulo"/>
    <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
        <thead>
            <th>Codigo</th><th>Nombre</th><?php if($consultar || $eliminar)
                    { echo '<th>Operación</th>';}?>
        </thead>
        <tbody>
        <?php
                require_once('../clases/clase_modulo.php');
                $lobjModulo=new clsModulo;
                $laModulos=$lobjModulo->consultar_modulos();
                for($i=0;$i<count($laModulos);$i++)
                {
                    echo '<tr>';
                    echo '<td>'.$laModulos[$i][0].'</td>';
                    echo '<td>'.$laModulos[$i][1].'</td>';
                    if($consultar || $eliminar)
                    {
                        echo '<td>';
                        if($consultar)
                        {
                            echo '<a class="btn btn-info btn-sm" href="#" onclick="buscar('.$laModulos[$i][0].')"><i class="fa fa-search"></i></a>';
                        }
                        if($eliminar)
                        {
                            echo ' <a class="btn btn-danger btn-sm" href="#" onclick="eliminar('.$laModulos[$i][0].')" ><i class="fa fa-remove"></i></a>';
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