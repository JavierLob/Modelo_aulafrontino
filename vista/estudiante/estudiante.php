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
            if($laServicios[$j][2]=='estudiante/eliminar_estudiante')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=estudiante/consultar_estudiante&id="+id;
 }
</script>    
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Servicios</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar, cosultar, modificar y eliminar los estudiantes del sistema.</div>
    <?php
    if($registrar)
    {
        echo '<a class="btn btn-success" id="btn_registrar" href="?vista=estudiante/registrar_estudiante"><i class="icon-plus icon-white"></i> Registrar estudiante</a>';
    }
    ?>
    <form action="../controlador/control_estudiante.php" method="POST" name="form_estudiante">
        <input type="hidden" value="eliminar_estudiante" name="operacion" />
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
                        echo '<td>'.$laEstudiantes[$i]['apellidounoest'].' '.$laEstudiantes[$i]['apellidodosest'].'</td>';
                        echo '<td>'.$laEstudiantes[$i]['nombreunoest'].' '.$laEstudiantes[$i]['nombredosest'].'</td>';
                        echo '<td>'.$laEstudiantes[$i]['telefono_habest'].'</td>';
                        echo '<td>'.$laEstudiantes[$i]['correoest'].'</td>';
                        if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar)
                            {
                                echo '<a class="btn btn-info" href="#" onclick="buscar('.$laEstudiantes[$i][0].')"><i class="icon-search icon-white"></i></a>';
                            }
                            if($eliminar)
                            {
                                echo ' <a class="btn btn-danger" href="#" onclick="eliminar('.$laEstudiantes[$i][0].')" ><i class="icon-remove icon-white"></i></a>';
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