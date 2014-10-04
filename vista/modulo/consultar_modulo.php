<?php
    /* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
    require_once("../clases/clase_modulo.php");
    $lobjModulo=new clsModulo;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjModulo->set_Modulo($id);
    $laModulo=$lobjModulo->consultar_modulo();
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Consultar Módulo</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras ver y modificar el módulo que consultaste.</div>
    <form class="formulario" action="../controlador/control_modulo.php" method="POST" name="form_modulo">
        <input type="hidden" value="editar_modulo" name="operacion" />
        <input type="hidden"  name="idmodulo" id="cam_idmodulo" value="<?php echo $laModulo[0];?>"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del módulo."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="nombremod" id="cam_nombremod" value="<?php echo $laModulo[1];?>" required/>
            </div>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="GUARDAR CAMBIOS">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=modulo/modulo';">
        </div>
    </form>
</div>