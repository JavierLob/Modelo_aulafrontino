<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Asignar módulo</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras asignar los módulos  al rol que seleccione.</div>
    <form class="formulario" action="../controlador/control_rol.php" method="POST" name="form_servicio">
        <input type="hidden" value="asignar_modulo" name="operacion" />
        <label><h5>Rol <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Rol al cual se le asignarán los módulos."><i class="fa fa-question" ></i></span></h5></label>
        <select name="idrol" id="cam_idrol" onchange="buscar_modulo(this.value);" required>
            <option value="">Seleccione un rol</option>
            <?php
            require_once('../clases/clase_rol.php');
            $lobjRol=new clsrol;
            $laroles=$lobjRol->consultar_roles();
            for($i=0;$i<count($laroles);$i++)
            {
                if($laroles[$i][0]==$_GET['id'])
                {
                    echo '<option value="'.$laroles[$i][0].'" selected>'.$laroles[$i][1].'</option>';
                }
                else
                {
                    echo '<option value="'.$laroles[$i][0].'">'.$laroles[$i][1].'</option>';
                }
            }
            ?>
        </select>
        <h5>Módulos</h5>
        <div class="checkbox">
            <?php
                require_once('../clases/clase_modulo.php');
                $lobjModulo=new clsModulo;
                $laModulos=$lobjModulo->consultar_modulos();

                $lobjRol->set_Rol($_GET['id']);
                $laModulos_Rol=$lobjRol->consultar_modulos();
                for($i=0;$i<count($laModulos);$i++)
                {
                    $cheked='';
                    for($j=0;$j<count($laModulos_Rol);$j++)
                    {
                        if($laModulos_Rol[$j][0]==$laModulos[$i][0])
                        {
                            $cheked='checked';  
                            break;
                        }
                    }
                    echo '<label>
                            <input type="checkbox" name="idmodulo[]" value="'.$laModulos[$i][0].'" '.$cheked.'>'.$laModulos[$i][1].'
                          </label>';
                }
            ?>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="ACEPTAR">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=rol/asignacion';">
        </div>
    </form>
</div>
<script type="text/javascript">
    function buscar_modulo(idrol)
    {
        window.location.href="intranet.php?vista=rol/asignar_modulo&id="+idrol;
    }
</script>