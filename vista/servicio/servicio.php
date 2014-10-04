<!-- ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM -->
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
    <form action="../controlador/control_servicio.php" method="POST" name="form_servicio">
        <input type="hidden" value="eliminar_servicio" name="operacion" />
        <input type="hidden"  name="idservicio" id="cam_idservicio"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Codigo</th><th>Nombre</th><th>enlace</th><th>módulo</th><th>Operación</th>
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
                        echo '<td><a class="btn btn-info" href="#" onclick="buscar('.$laServicios[$i][0].')"><i class="icon-search icon-white"></i></a><a class="btn btn-danger" href="#" onclick="eliminar('.$laServicios[$i][0].')" ><i class="icon-remove icon-white"></i></a></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
    </form>
    <a class="btn btn-success" href="?vista=servicio/registrar_servicio"><i class="icon-plus icon-white"></i> Registrar servicio</a>
</div>