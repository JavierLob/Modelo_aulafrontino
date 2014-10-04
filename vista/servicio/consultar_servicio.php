<?php
    /* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
    require_once("../clases/clase_servicio.php");
    $lobjServicio=new clsServicio;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjServicio->set_Servicio($id);
    $laServicio=$lobjServicio->consultar_servicio();
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Consultar servicio</h3>
    <form action="../controlador/control_servicio.php" method="POST" name="form_servicio">
        <input type="hidden" value="editar_servicio" name="operacion" />
        <input type="hidden"  name="idservicio" id="cam_idservicio" value="<?php echo $laServicio[0];?>"/>
        <label>Nombre</label>
        <input type="text" name="nombreser" id="cam_nombreser" value="<?php echo $laServicio[1];?>" required/>
        <label>Enlace</label>
        <input type="text" name="enlaceser" id="cam_nombreser" value="<?php echo $laServicio[2];?>" required/>
        <label>Módulo</label>
        <select name="idmodulo" cam="idmodulo" required>
            <option value="">Seleccione un módulo</option>
            <?php
                require_once('../clases/clase_modulo.php');
                    $lobjModulo=new clsModulo;
                    $laModulos=$lobjModulo->consultar_modulos();
                    for($i=0;$i<count($laModulos);$i++)
                    {
                        if($laServicio[3]==$laModulos[$i][0])
                        {
                            echo '<option value="'.$laModulos[$i][0].'" selected>'.$laModulos[$i][1].'</option>';
                        }
                        else
                        {
                            echo '<option value="'.$laModulos[$i][0].'" >'.$laModulos[$i][1].'</option>';
                        }
                    }
            ?>
        </select>
        <div class="display: block;">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="GUARDAR CAMBIOS">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=servicio/servicio';">
        </div>
    </form>
</div>