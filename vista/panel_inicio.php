<!--
* Panel de Inicio = vista ; Permite ver los elementos por los cuales está constituido el framework.
*
* @package    ModeloAulafrontino
* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
* @link       https://github.com/EquipoAulaFrontino
* @version    v1.0
*/-->
<h1 class="page-header">Escritorio <small>Bienvenidos al modelo de seguridad, repotenciado con bootstrap!</small></h1>
<div class="row">
  <div class="col-md-6">
    <h4 class="page-header">Mensajes </h4>
    <!-- EMPIEZA: INFORMACIÓN -->
    <div class="alert alert-info" role="alert">
      <strong><i class="fa fa-info-circle"></i></strong> Aquí podrás contar con una serie de ejemplos simplificados para tu aprendizaje.
    </div>
    <!-- FIN: INFORMACIÓN -->
    <!-- EMPIEZA: RECOMENDACION -->
    <div class="alert alert-warning" role="alert">
      <strong><i class="fa fa-exclamation"></i></strong> Te recomendamos uses esto como una guía para realizar tu propio marco de trabajo.
    </div>
    <!-- FIN: RECOMENDACION -->
    <!-- EMPIEZA: ERROR -->
    <div class="alert alert-danger" role="alert">
      <strong><i class="fa fa-exclamation-triangle"></i></strong> Este framework está construido con fines académicos, está  lejos de ser una herramienta productiva.
    </div>
    <!-- FIN: ERROR -->
    <!-- EMPIEZA: EXITO -->
    <div class="alert alert-success" role="alert">
      <strong><i class="fa fa-check-square-o"></i></strong> Esperamos que este framework te sea de utilidad.
    </div>
    <!-- FIN: EXITO -->
  </div>
  <div class="col-md-6">
    <h4 class="page-header">Botones y etiquetas </h4>
    <div class="row">
      <div class="form-group">                
        <div class="col-md-3">
          <button type="button" class="btn-sm btn-danger center-block" ><i class="fa fa-remove"></i> Desactivar</button>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn-sm btn-success center-block" ><i class="fa fa-check"></i> Aceptar</button>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn-sm btn-warning center-block" ><i class="fa fa-refresh"></i> Activar</button>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn-sm btn-info center-block" ><i class="fa fa-search"></i> Buscar</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <span class="label label-default"> Simple</span>
          <span class="label label-warning"> Advertencia</span>
          <span class="label label-danger"> Peligro</span>                                      
          <span class="label label-primary"> Primario</span>
          <span class="label label-success"> Exito</span>
          <span class="label label-info"> Información</span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">@</span>
            <input type="text" class="form-control" placeholder="Username">
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" class="form-control" placeholder="Username">
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-addon">.00</span>
          </div>
        </div>
      </div>                
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Bs</span>
            <input type="text" class="form-control">
            <span class="input-group-addon">.00</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <a href="http://getbootstrap.com/" target="_blank" class="text-info"><i class="fa fa-external-link"></i> Para mas información acerca de los estilos y componentes de bootstrap visitar la Página de Bootstrap</a>
      </div>
      <div class="form-group">
        <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank" class="text-info"><i class="fa fa-external-link"></i> Para mas información acerca de los iconos utilizados ingrese a la Página de Fontawesome</a>
      </div>
    </div>
</div>
<!-- EMPIEZA: FORMULARIO -->
<div class="row">
  <div class="col-md-12">
    <form role="form" class="form">
      <input type="hidden" value="eliminar_servicio" name="operacion" />
      <input type="hidden"  name="idservicio" id="cam_idservicio"/>
      <table class="cell-border compact hover stripe" id="filtro">
          <thead>
              <th>Codigo</th><th>Nombre</th><th>enlace</th><th>módulo</th>
          </thead>
          <tbody>
          <?php
                  require_once('../clases/clase_servicio.php');
                  $lobjServicio=new clsServicio;
                  $laServicios=$lobjServicio->consultar_servicios();
                  for($i=0;$i<count($laServicios);$i++)
                  {
                      echo '<tr>';
                      echo '<td>'.$laServicios[$i][0].'</td>';
                      echo '<td>'.$laServicios[$i][1].'</td>';
                      echo '<td>'.$laServicios[$i][2].'</td>';
                      echo '<td>'.$laServicios[$i][3].'</td>';
                      echo '</tr>';
                  }
              ?>
            </tbody>
        </table>
    </form>
  </div>
</div>
<a href="https://datatables.net/" target="_blank" class="text-info"><i class="fa fa-external-link"></i> Para mas información acerca de las tablas visitar la Página de DataTables</a>

<!-- FIN: FORMULARIO -->