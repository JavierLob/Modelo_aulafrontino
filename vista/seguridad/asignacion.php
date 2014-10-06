<script>
  function eliminar(id)
  {
     if(confirm("¿Esta seguro que desea quitar este servicio seleccionado?"))
    {
      document.getElementById("cam_idservicio").value=id;
      document.form_servicio.submit();
    }
  }
</script>   
<h1 class="page-header">Asignación de módulos/servicios</h1>
<!-- EMPIEZA: RECOMENDACION -->
<div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras ver y asignar los módulos y servicios a los roles del sistema.
</div>
<!-- FIN: RECOMENDACION -->
<!-- EMPIEZA: FORMULARIO -->
<form role="form" class="form" action="../controlador/control_servicio.php" method="POST" name="form_servicio">
    <input type="hidden" value="quitar_servicio" name="operacion" />
    <input type="hidden"  name="idservicio" id="cam_idservicio"/>

    <?php
        require_once('../clases/clase_rol.php');
        $lobjRol=new clsrol;
        $laroles=$lobjRol->consultar_roles();
        echo '<ul class="nav nav-tabs" id="myTab">';
        for($i=0;$i<count($laroles);$i++)
        {
            echo '<li '.$active.'><a href="#'.$laroles[$i][1].'">'.$laroles[$i][1].'</a></li>';
        }
        echo '</ul>';
        echo '<div class="tab-content">';                   
        for($i=0;$i<count($laroles);$i++)
        {
            echo '<div class="tab-pane" id="'.$laroles[$i][1].'">';
                $lobjRol->set_Rol($laroles[$i][0]);
                $laModulos=$lobjRol->consultar_modulos();
                for($j=0;$j<count($laModulos);$j++)
                {
                    echo '<div class="col-md-4 span4 pull-left">';
                    echo '<h5>'.$laModulos[$j][1].'</h5>';
                        echo '<ul style="font-size: 15px;">';
                            $laServicios=$lobjRol->consultar_servicios($laModulos[$j][0]);
                            
                            for($k=0; $k <count($laServicios) ; $k++)
                            {
                                echo '<li><a href="">'.$laServicios[$k][1].'</a></li>';
                            }
                            if($k==0)
                                echo '<p class="text-danger">Este rol no tiene servicios registrados a este módulo.</p>';
                        echo '</ul>';
                    echo '</div>';
                }
            echo '</div>';                
        }
            echo '</div>';
        ?>

    
</form>
<!-- FIN: FORMULARIO -->
<div class="row">
  <div class="col-md-6">
    <button type="button" class="btn btn-success center-block" name="btn_modulos" id="btn_modulos" onclick="window.location.href='?vista=seguridad/asignar_modulo';"><i class="fa fa-check-square-o"></i> Asignar módulos</button>
  </div>
  <div class="col-md-6">
    <button type="button" class="btn btn-success center-block" name="btn_servicios" id="btn_servicios" onclick="window.location.href='?vista=seguridad/asignar_servicio';"><i class="fa fa-check-square-o" ></i> Asignar servicio</button>
  </div>
</div>

<script>                
    $('#myTab a').click(function (e) 
    {
        e.preventDefault()
        $(this).tab('show')
    })
    $(function () 
    {
        $('#myTab a:first').tab('show')
    })
</script>
