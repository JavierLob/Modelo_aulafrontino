<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
        $laServicios=$lobjRol->consultar_servicios($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='modulo/consultar_modulo')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='modulo/registrar_modulo')
            {

                $registrar=true;
            }
            if($laServicios[$j][2]=='modulo/eliminar_modulo')
            {
                $eliminar=true;
            }
        }
    }
?>
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
    <h3>Módulos</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar, cosultar, modificar y eliminar los módulos del sistema.</div>
    <?php
    if($registrar)
    {
        echo '<a class="btn btn-success" id="btn_registrar" href="?vista=modulo/registrar_modulo"><i class="icon-plus icon-white"></i> Registrar módulo</a>';
    }
    ?>
    <form action="../controlador/control_modulo.php" method="POST" name="form_modulo">
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
                                echo '<a class="btn btn-info" href="#" onclick="buscar('.$laModulos[$i][0].')"><i class="icon-search icon-white"></i></a>';
                            }
                            if($eliminar)
                            {
                                echo ' <a class="btn btn-danger" href="#" onclick="eliminar('.$laModulos[$i][0].')" ><i class="icon-remove icon-white"></i></a>';
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