<?php
    /* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
    require_once("../clases/clase_modulo.php");
    $lobjModulo=new clsModulo;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjModulo->set_Modulo($id);
    $laModulo=$lobjModulo->consultar_modulo();
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Consultar Modulo</h3>
    <form action="../controlador/control_modulo.php" method="POST" name="form_modulo">
        <input type="hidden" value="editar_modulo" name="operacion" />
        <input type="hidden"  name="idmodulo" id="cam_idmodulo" value="<?php echo $laModulo[0];?>"/>
        <label>Nombre</label>
        <input type="text" name="nombremod" id="cam_nombremod" value="<?php echo $laModulo[1];?>" required/>
        <div class="display: block;">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="GUARDAR CAMBIOS">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=modulo/modulo';">
        </div>
    </form>
</div>