<?php
    /* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
    require_once("../clases/clase_rol.php");
    $lobjrol=new clsRol;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjrol->set_Rol($id);
    $larol=$lobjrol->consultar_rol();
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Consultar rol</h3>
    <form action="../controlador/control_rol.php" method="POST" name="form_rol">
        <input type="hidden" value="editar_rol" name="operacion" />
        <input type="hidden"  name="idrol" id="cam_idrol" value="<?php echo $larol[0];?>"/>
        <label>Nombre</label>
        <input type="text" name="nombrerol" id="cam_nombrerol" value="<?php echo $larol[1];?>" required/>
        <div class="display: block;">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="GUARDAR CAMBIOS">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=rol/rol';">
        </div>
    </form>
</div>