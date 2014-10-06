<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
        $laServicios=$lobjRol->consultar_servicios($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='seguridad/consultar_rol')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='seguridad/registrar_rol')
            {

                $registrar=true;
            }
            if($laServicios[$j][2]=='seguridad/eliminar_rol')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=seguridad/consultar_rol&id="+id;
 }
function eliminar(id)
{
    if(confirm("¿Esta seguro que desea desactivar el rol seleccionado?"))
    {
        document.getElementById("cam_idrol").value=id;
        document.form_rol.submit();
    }
}
function activar(id)
{
    if(confirm("¿Desea activar el rol selecionado?"))
    {
        document.getElementById("cam_idrol").value=id;
        document.getElementById("cam_operacion").value='activar_rol';
        document.form_estudiante.submit();
    }
}
</script>    
<h1 class="page-header">Roles</h1>
<!-- EMPIEZA: RECOMENDACION -->
<div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar, cosultar, modificar y eliminar los roles del sistema.
</div>
<!-- FIN: RECOMENDACION -->
<?php
if($registrar)
{
    echo '<a class="btn btn-success" id="btn_registrar" href="?vista=seguridad/registrar_rol"><i class="fa fa-plus"></i> Registrar rol</a>';
}
?>
<!-- EMPIEZA: FORMULARIO -->
<form role="form" class="form" action="../controlador/control_rol.php" method="POST" name="form_rol">
    <input type="hidden" value="desactivar_rol" name="operacion" />
    <input type="hidden"  name="idrol" id="cam_idrol"/>
    <table class="cell-border compact hover stripe" id="filtro">
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
                            echo '<a class="btn btn-info" href="#" onclick="buscar('.$larols[$i][0].')"><i class="fa fa-search"></i></a>';
                        }
                        if($eliminar)
                        {
                            echo ' <a class="btn btn-danger" href="#" onclick="eliminar('.$larols[$i][0].')" ><i class="fa fa-remove"></i></a>';
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