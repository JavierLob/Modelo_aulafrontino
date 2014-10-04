<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
        $laServicios=$lobjRol->consultar_servicios($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='rol/consultar_rol')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='rol/registrar_rol')
            {

                $registrar=true;
            }
            if($laServicios[$j][2]=='rol/eliminar_rol')
            {
                $eliminar=true;
            }
        }
    }
?>
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
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar, cosultar, modificar y eliminar los roles del sistema.</div>
        <?php
    if($registrar)
    {
        echo '<a class="btn btn-success" id="btn_registrar" href="?vista=rol/registrar_rol"><i class="icon-plus icon-white"></i> Registrar rol</a>';
    }
    ?>
    <form action="../controlador/control_rol.php" method="POST" name="form_rol">
        <input type="hidden" value="eliminar_rol" name="operacion" />
        <input type="hidden"  name="idrol" id="cam_idrol"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Codigo</th><th>Nombre</th><?php if($consultar || $eliminar)
                        { echo '<th>Operación</th>';}?>
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
                        if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar)
                            {
                                echo '<a class="btn btn-info" href="#" onclick="buscar('.$larols[$i][0].')"><i class="icon-search icon-white"></i></a>';
                            }
                            if($eliminar)
                            {
                                echo ' <a class="btn btn-danger" href="#" onclick="eliminar('.$larols[$i][0].')" ><i class="icon-remove icon-white"></i></a>';
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