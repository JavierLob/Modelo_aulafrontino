<?php
    require_once("../clases/clase_rol.php");
    $lobjrol=new clsRol;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjrol->set_Rol($id);
    $larol=$lobjrol->consultar_rol();
?>
<h1 class="page-header">Consultar/Modificar rol</h1>
<!-- EMPIEZA: RECOMENDACION -->
  <div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras ver y modificar el rol que consultaste.
  </div>
<!-- FIN: RECOMENDACION -->
<!-- EMPIEZA: FORMULARIO -->
<form role="form" class="form" action="../controlador/control_rol.php" method="POST" name="form_rol">
    <input type="hidden" value="editar_rol" name="operacion" />
    <input type="hidden"  name="idrol" id="cam_idrol" value="<?php echo $larol[0];?>"/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_cedulaest">Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del rol."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="form-control" name="nombrerol" id="cam_nombrerol" value="<?php echo $larol[1];?>" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=seguridad/rol';"><i class="fa fa-chevron-left"></i> Regresar</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-danger center-block"><i class="fa fa-check" name="btn_enviar" id="btn_enviar"></i> Aceptar</button>
        </div>
    </div>
</form>
<!-- FIN: FORMULARIO -->