<!-- ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM -->
<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3>Registrar servicio</h3>
    <form action="../controlador/control_servicio.php" method="POST" name="form_servicio">
        <input type="hidden" value="registrar_servicio" name="operacion" />
        <input type="hidden"  name="idservicio" id="cam_idservicio"/>
        <label>Nombre</label>
        <input type="text" name="nombreser" id="cam_nombreser" required/>
        <label>Enlace</label>
        <input type="text" name="enlaceser" id="cam_nombreser" required/>
        <label>Módulo</label>
        <select name="idmodulo" id="cam_idmodulo" required>
            <option value="">Seleccione un módulo</option>
            <?php
                require_once('../clases/clase_modulo.php');
                    $lobjModulo=new clsModulo;
                    $laModulos=$lobjModulo->consultar_modulos();
                    for($i=0;$i<count($laModulos);$i++)
                    {
                        echo '<option value="'.$laModulos[$i][0].'">'.$laModulos[$i][1].'</option>';
                    }
            ?>
        </select>

        <div class="display: block;">
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="ACEPTAR">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="REGRESAR" onclick="window.location.href='?vista=servicio/servicio';">
        </div>
    </form>
</div>