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
 function inscribir(id)
 {
    window.location.href="?vista=inscripcion/registrar_inscripcion&id="+id;
 }
</script>    
<h1 class="page-header">Cursos</h1>
<!-- EMPIEZA: RECOMENDACION -->
<div class="alert alert-info" role="alert">
    <strong><i class="fa fa-info-circle"></i></strong> Aquí podras registrar, cosultar, modificar y desactivar los cursos del sistema.
</div>
<form role="form" class="form" action="../controlador/control_curso.php" method="POST" name="form_curso">
    <input type="hidden" value="desactivar_curso" name="operacion" id="cam_operacion"/>
    <input type="hidden"  name="idcurso" id="cam_idcurso"/>
    <table class="cell-border compact hover stripe" id="filtro">
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
                        echo '<a class="btn-sm btn-success" href="#" onclick="inscribir('.$laCursos[$i]['idcurso'].')"><i class="fa fa-check"></i></a>';
                        echo "</td>";
                    }
                    echo '</tr>';
                }
            ?>
            </tbody>
    </table>
</form>
