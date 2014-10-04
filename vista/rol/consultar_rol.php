<?php
    require_once("../clases/clase_rol.php");
    $lobjrol=new clsRol;
    
    $id=(isset($_GET['id']))?$_GET['id']:"";

    $lobjrol->set_Rol($id);
    $larol=$lobjrol->consultar_rol();
?>
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Consultar rol</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras ver y modificar el rol que consultaste.</div>
    <form class="formulario" action="../controlador/control_rol.php" method="POST" name="form_rol">
        <input type="hidden" value="editar_rol" name="operacion" />
        <input type="hidden"  name="idrol" id="cam_idrol" value="<?php echo $larol[0];?>"/>
        <div class="row-fluid">
            <div class="col-lg-6 span6">
                <label>Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del rol."><i class="fa fa-question" ></i></span></label>
                <input type="text" name="nombrerol" id="cam_nombrerol" value="<?php echo $larol[1];?>" required/>
            </div>
        </div>
        <div class="botonera">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="GUARDAR CAMBIOS">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=rol/rol';">
        </div>
    </form>
</div>