<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
        $laServicios=$lobjRol->consultar_servicios($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='estudiante/consultar_estudiante')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='estudiante/registrar_estudiante')
            {

                $registrar=true;
            }
            if($laServicios[$j][2]=='estudiante/desactivar_estudiante')
            {
                $desactivar=true;
            }
        }
    }
?>
<script>
function buscar(id)
{
    window.location.href="?vista=estudiante/consultar_estudiante&id="+id;
}

function desactivar(id)
{
    if(confirm("¿Está seguro que desea desactivar el estudiante seleccionado?"))
    {
      document.getElementById("cam_idestudiante").value=id;
      document.form_estudiante.submit();
    }
}

function activar(id)
{
    if(confirm("¿Desea activar el estudiante selecionado?"))
    {
        document.getElementById("cam_idestudiante").value=id;
        document.getElementById("cam_operacion").value='activar_estudiante';
        document.form_estudiante.submit();
    }
}
</script>    
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Estudiantes</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar, cosultar, modificar y eliminar los estudiantes del sistema.</div>
    <?php
    if($registrar)
    {
        echo '<a class="btn btn-success" id="btn_registrar" href="?vista=estudiante/registrar_estudiante"><i class="icon-plus icon-white"></i> Registrar estudiante</a>';
    }
    ?>
    <form action="../controlador/control_estudiante.php" method="POST" name="form_estudiante">
        <input type="hidden" value="desactivar_estudiante" name="operacion" id="cam_operacion" />
        <input type="hidden"  name="idestudiante" id="cam_idestudiante"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Nro.</th><th>Cédula</th><th>Apellidos</th><th>Nombres</th><th>Telefono Habitación</th><th>Correo</th>
                <?php 
                    if($consultar || $eliminar)
                    { 
                        echo '<th>Operación</th>';
                    }
                ?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_estudiante.php');
                    $lobjEstudiante=new clsEstudiante;
                    $laEstudiantes=$lobjEstudiante->listar_estudiantes();
                    for($i=0;$i<count($laEstudiantes);$i++)
                    {
                        echo '<tr>';
                        echo '<td>'.($i+1).'</td>';
                        echo '<td>'.$laEstudiantes[$i]['cedulaest'].'</td>';
                        echo '<td>'.$laEstudiantes[$i]['apellido_unoest'].' '.$laEstudiantes[$i]['apellido_dosest'].'</td>';
                        echo '<td>'.$laEstudiantes[$i]['nombre_unoest'].' '.$laEstudiantes[$i]['nombre_dosest'].'</td>';
                        echo '<td>'.$laEstudiantes[$i]['telefono_habest'].'</td>';
                        echo '<td>'.$laEstudiantes[$i]['correoest'].'</td>';
                        if($consultar || $desactivar)
                        {
                            echo '<td>';
                            if($consultar)
                            {
                                echo '<a class="btn btn-info" href="#" onclick="buscar('.$laEstudiantes[$i]['idestudiante'].')"><i class="icon-search icon-white"></i></a>';
                            }
                            if($desactivar)
                            {
                                if($laEstudiantes[$i]['estatusest']=='1')
                                {
                                    echo ' <a class="btn btn-danger" href="#" onclick="desactivar('.$laEstudiantes[$i]['idestudiante'].')" ><i class="icon-remove icon-white"></i></a>';

                                }
                                elseif ($laEstudiantes[$i]['estatusest']=='0') 
                                {
                                    echo ' <a class="btn btn-warning" title="Restaurar" href="#" onclick="activar('.$laEstudiantes[$i]['idestudiante'].')" ><i class="icon-refresh icon-white"></i></a>';
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