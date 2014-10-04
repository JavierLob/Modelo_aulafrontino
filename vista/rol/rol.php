<!-- ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM -->
<script>
 function buscar(id)
 {
    window.location.href="?vista=rol/consultar_rol&id="+id;
 }
  function eliminar(id)
  {
     if(confirm("¿Esta seguro que desea eliminar el módulo seleccionado?"))
    {
      document.getElementById("cam_idrol").value=id;
      document.form_rol.submit();
    }
  }
</script>    
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Roles</h3>
    <form action="../controlador/control_rol.php" method="POST" name="form_rol">
        <input type="hidden" value="eliminar_rol" name="operacion" />
        <input type="hidden"  name="idrol" id="cam_idrol"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Codigo</th><th>Nombre</th><th>Operación</th>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_rol.php');
                    $lobjrol=new clsrol;
                    $larols=$lobjrol->consultar_roles();
                    for($i=0;$i<count($larols);$i++)
                    {
                        echo '<tr>';
                        echo '<td>'.$larols[$i][0].'</td>';
                        echo '<td>'.$larols[$i][1].'</td>';
                        echo '<td><a class="btn btn-info" href="#" onclick="buscar('.$larols[$i][0].')"><i class="icon-search icon-white"></i></a><a class="btn btn-danger" href="#" onclick="eliminar('.$larols[$i][0].')" ><i class="icon-remove icon-white"></i></a></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
    </form>
    <a class="btn btn-success" href="?vista=rol/registrar_rol"><i class="icon-plus icon-white"></i> Registrar rol</a>
</div>