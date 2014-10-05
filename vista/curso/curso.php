<?php
$consultar= $registrar= $desactivar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
        $laServicios=$lobjRol->consultar_servicios($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='curso/consultar_curso')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='curso/registrar_curso')
            {

                $registrar=true;
            }
            if($laServicios[$j][2]=='curso/desactivar_curso')
            {
                $desactivar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=curso/consultar_curso&id="+id;
 }
  function desactivar(id)
  {
     if(confirm("¿Está seguro que desea desactivar la curso seleccionada?"))
    {
      document.getElementById("cam_idcurso").value=id;
      document.form_curso.submit();
    }
  }

  function activar(id)
  {
     if(confirm("¿Desea restaurar la curso seleccionado?"))
    {
      document.getElementById("cam_idcurso").value=id;
      document.getElementById("cam_operacion").value='activar_curso';
      document.form_curso.submit();
    }
  }
</script>    
<div style="float: left" class="col-lg-12 span12 pull-left">
    <h3>Cursos</h3>
    <div class="alert alert-info" role="alert"> <i class="fa fa-info-circle"></i> Aquí podras registrar, cosultar, modificar y desactivar los cursos del sistema.</div>
    <?php
    if($registrar)
    {
        echo '<a class="btn btn-success" id="btn_registrar" href="?vista=curso/registrar_curso"><i class="icon-plus icon-white"></i> Registrar curso</a>';
    }
    ?>
    <form action="../controlador/control_curso.php" method="POST" name="form_curso">
        <input type="hidden" value="desactivar_curso" name="operacion" id="cam_operacion"/>
        <input type="hidden"  name="idcurso" id="cam_idcurso"/>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Id</th><th>Nombre</th><th>Asignación</th><th>Sección</th><th>Profesor</th><th>Fecha de apertura</th><th>Fecha de cierre</th><th>Cupos disponibles</th><th>Cantidad de inscritos</th><?php if($consultar || $desactivar)
                        { echo '<th>Operación</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_curso.php');
                    $lobjCurso=new clsCurso;
                    $laCursos=$lobjCurso->listar_cursos();
                    for($i=0;$i<count($laCursos);$i++)
                    {
                        echo '<tr>';
                        echo '<td>'.$laCursos[$i]['idcurso'].'</td>';
                        echo '<td>'.$laCursos[$i]['nombrecur'].'</td>';
                        echo '<td>'.$laCursos[$i]['nombreasi'].'</td>';
                        echo '<td>'.$laCursos[$i]['seccioncur'].'</td>';
                        echo '<td>'.$laCursos[$i]['profesor'].'</td>';
                        echo '<td>'.$laCursos[$i]['fecha_aperturacur'].'</td>';
                        echo '<td>'.$laCursos[$i]['fecha_cierrecur'].'</td>';
                        echo '<td>'.$laCursos[$i]['cupos_disponiblecur'].'</td>';
                        echo '<td>'.$laCursos[$i]['cant_inscritoscur'].'</td>';
                        if($consultar || $desactivar)
                        {
                            echo '<td>';
                            if($consultar)
                            {
                                echo '<a class="btn btn-info" href="#" onclick="buscar('.$laCursos[$i]['idcurso'].')"><i class="icon-search icon-white"></i></a>';
                            }
                            if($desactivar)
                            {
                                if($laCursos[$i]['estatuscur']=='1')
                                {
                                    echo ' <a class="btn btn-danger" href="#" onclick="desactivar('.$laCursos[$i]['idcurso'].')" ><i class="icon-remove icon-white"></i></a>';

                                }
                                elseif ($laCursos[$i]['estatuscur']=='0') 
                                {
                                    echo ' <a class="btn btn-warning" title="Restaurar" href="#" onclick="activar('.$laCursos[$i]['idcurso'].')" ><i class="icon-refresh icon-white"></i></a>';
                                }
                            }
                            echo "</td>";
                        }
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
    </form>
</div>