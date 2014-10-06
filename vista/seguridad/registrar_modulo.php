/**
* Registrar Módulo = vista ; Permite registrar un módulo.
*
* @package    ModeloAulafrontino
* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
* @link       https://github.com/EquipoAulaFrontino
* @version    v1.0
*/
<h1 class="page-header">Registrar servicio</h1>
<!-- EMPIEZA: RECOMENDACION -->
<div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar un módulo en el sistema.
</div>
<!-- FIN: RECOMENDACION -->
<!-- EMPIEZA: FORMULARIO -->
<form role="form" class="form" action="../controlador/control_modulo.php" method="POST" name="form_modulo">
    <input type="hidden" value="registrar_modulo" name="operacion" />
    <input type="hidden"  name="idmodulo" id="cam_idmodulo"/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cam_nombremod">Nombre <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Nombre del módulo."><i class="fa fa-question" ></i></span></label>
                <input class="form-control" type="text" name="nombremod" id="cam_nombremod" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-danger center-block" name="btn_regresar" id="btn_regresar" onclick="window.location.href='?vista=seguridad/modulo';"><i class="fa fa-chevron-left"></i> Regresar</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-danger center-block" name="btn_enviar" id="btn_enviar"><i class="fa fa-check"></i> Aceptar</button>
        </div>
    </div>
</form>
<!-- FIN: FORMULARIO -->