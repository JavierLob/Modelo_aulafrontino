<?php
    /* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
    require_once("../clases/clase_modulo.php");
    $lobjModulo=new clsModulo;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjModulo->set_Modulo($id);
    $laModulo=$lobjModulo->consultar_modulo();
?>
<h1 class="page-header">Consultar Módulo</h1>
<!-- EMPIEZA: RECOMENDACION -->
<div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras ver y modificar el módulo que consultaste.
</div>
<!-- FIN: RECOMENDACION -->
<!-- EMPIEZA: FORMULARIO -->
<form role="form" class="form" action="../controlador/control_modulo.php" method="POST" name="form_modulo">
    <input type="hidden" value="editar_modulo" name="operacion" />
    <input type="hidden"  name="idmodulo" id="cam_idmodulo" value="<?php echo $laModulo[0];?>"/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_nombremod">Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del módulo."><i class="fa fa-question" ></i></span></label>
                <input class="form-control" type="text" name="nombremod" id="cam_nombremod" value="<?php echo $laModulo[1];?>" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=seguridad/modulo';"><i class="fa fa-chevron-left"></i> Regresar</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-danger center-block" ><i class="fa fa-check" name="btn_enviar" id="btn_enviar"></i> Aceptar</button>
        </div>
    </div>
</form>
<!-- FIN: FORMULARIO -->