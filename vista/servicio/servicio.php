<!-- ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM -->
<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
        $laServicios=$lobjRol->consultar_servicios($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='servicio/consultar_servicio')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='servicio/registrar_servicio')
            {

                $registrar=true;
            }
            if($laServicios[$j][2]=='servicio/eliminar_servicio')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=servicio/consultar_servicio&id="+id;
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
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Servicios</h3>
    <?php
    if($registrar)
    {
        echo '<a class="btn btn-success" id="btn_registrar" href="?vista=servicio/registrar_servicio"><i class="icon-plus icon-white"></i> Registrar servicio</a>';
    }
    ?>
    <form action="../controlador/control_servicio.php" method="POST" name="form_servicio">
        <input type="hidden" value="eliminar_servicio" name="operacion" />
        <input type="hidden"  name="idservicio" id="cam_idservicio"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
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
                                echo '<a class="btn btn-info" href="#" onclick="buscar('.$laServicios[$i][0].')"><i class="icon-search icon-white"></i></a>';
                            }
                            if($eliminar)
                            {
                                echo ' <a class="btn btn-danger" href="#" onclick="eliminar('.$laServicios[$i][0].')" ><i class="icon-remove icon-white"></i></a>';
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