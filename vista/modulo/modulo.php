<!-- ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM -->
<script>
 function buscar(id)
 {
    window.location.href="?vista=modulo/consultar_modulo&id="+id;
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
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Modulos</h3>
    <form action="../controlador/control_modulo.php" method="POST" name="form_modulo">
        <input type="hidden" value="eliminar_modulo" name="operacion" />
        <input type="hidden"  name="idmodulo" id="cam_idmodulo"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Codigo</th><th>Nombre</th><th>Operación</th>
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
                        echo '<td><a class="btn btn-info" href="#" onclick="buscar('.$laModulos[$i][0].')"><i class="icon-search icon-white"></i></a><a class="btn btn-danger" href="#" onclick="eliminar('.$laModulos[$i][0].')" ><i class="icon-remove icon-white"></i></a></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
    </form>
    <a class="btn btn-success" href="?vista=modulo/registrar_modulo"><i class="icon-plus icon-white"></i> Registrar modulo</a>
</div>