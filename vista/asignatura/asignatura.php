<?php
$consultar= $registrar= $desactivar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
        $laServicios=$lobjRol->consultar_servicios($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='asignatura/consultar_asignatura')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='asignatura/registrar_asignatura')
            {

                $registrar=true;
            }
            if($laServicios[$j][2]=='asignatura/desactivar_asignatura')
            {
                $desactivar=true;
            }
        }
    }
?>
<script>
function buscar(id)
{
    window.location.href="?vista=asignatura/consultar_asignatura&id="+id;
}
function desactivar(id)
{
    if(confirm("¿Está seguro que desea desactivar la asignatura seleccionada?"))
    {
      document.getElementById("cam_idasignatura").value=id;
      document.form_asignatura.submit();
    }
}

function activar(id)
{
    if(confirm("¿Desea activar la asignatura seleccionada?"))
    {
        document.getElementById("cam_idasignatura").value=id;
        document.getElementById("cam_operacion").value='activar_asignatura';
        document.form_asignatura.submit();
    }
}
</script>    
<div style="float: left" class="col-lg-10 span10 pull-left">
    <h3>Asignaturas</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar, cosultar, modificar y desactivar los asignaturas del sistema.</div>
    <?php
    if($registrar)
    {
        echo '<a class="btn btn-success" id="btn_registrar" href="?vista=asignatura/registrar_asignatura"><i class="icon-plus icon-white"></i> Registrar asignatura</a>';
    }
    ?>
    <form action="../controlador/control_asignatura.php" method="POST" name="form_asignatura">
        <input type="hidden" value="desactivar_asignatura" name="operacion" id="cam_operacion"/>
        <input type="hidden"  name="idasignatura" id="cam_idasignatura"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Id</th><th>Código</th><th>Nombre</th><th>Descripción</th><th>Año</th><th>Unidades de credito</th><th>Horas</th><?php if($consultar || $desactivar)
                        { echo '<th>Operación</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_asignatura.php');
                    $lobjAsignatura=new clsAsignatura;
                    $laAsignaturas=$lobjAsignatura->listar_asignaturas();
                    for($i=0;$i<count($laAsignaturas);$i++)
                    {
                        echo '<tr>';
                        echo '<td>'.$laAsignaturas[$i]['idasignatura'].'</td>';
                        echo '<td>'.$laAsignaturas[$i]['codigoasi'].'</td>';
                        echo '<td>'.$laAsignaturas[$i]['nombreasi'].'</td>';
                        echo '<td>'.$laAsignaturas[$i]['descripcionasi'].'</td>';
                        echo '<td>'.$laAsignaturas[$i]['anoasi'].'</td>';
                        echo '<td>'.$laAsignaturas[$i]['unidad_creditoasi'].'</td>';
                        echo '<td>'.$laAsignaturas[$i]['horas_duracionasi'].'</td>';
                        if($consultar || $desactivar)
                        {
                            echo '<td>';
                            if($consultar)
                            {
                                echo '<a class="btn btn-info" href="#" onclick="buscar('.$laAsignaturas[$i]['idasignatura'].')"><i class="icon-search icon-white"></i></a>';
                            }
                            if($desactivar)
                            {
                                if($laAsignaturas[$i]['estatusasi']=='1')
                                {
                                    echo ' <a class="btn btn-danger" href="#" onclick="desactivar('.$laAsignaturas[$i]['idasignatura'].')" ><i class="icon-remove icon-white"></i></a>';

                                }
                                elseif ($laAsignaturas[$i]['estatusasi']=='0') 
                                {
                                    echo ' <a class="btn btn-warning" title="Restaurar" href="#" onclick="activar('.$laAsignaturas[$i]['idasignatura'].')" ><i class="icon-refresh icon-white"></i></a>';
                                }
                            }
                            echo "</td>";
                        }
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
    </form>
</div>