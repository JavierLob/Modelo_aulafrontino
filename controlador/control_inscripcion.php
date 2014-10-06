<?php
	/**
	* Controlador inscripción
	*
	* @package    ModeloAulafrontino
	* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
	* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
	* @link       https://github.com/EquipoAulaFrontino
	* @version    v1.0
	*/
	session_start();
	require_once("../clases/clase_inscripcion.php");
	require_once("../clases/clase_curso.php");
	$lobjInscripcion = new clsInscripcion();
	$lobjCurso = new clsCurso();
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_inscripcion':
			$lobjInscripcion->set_Curso($_POST['idcurso']);
			$lobjInscripcion->set_Estatus(true);

			$laEstudiantes = $_POST['inscribir'];
			$lobjCurso->set_Curso($_POST['idcurso']);
			$datos_curso = $lobjCurso->consultar_curso();

			for($i=0;$i<count($laEstudiantes);$i++)
			{
				$lnEstudiante = $laEstudiantes[$i];
				$lobjInscripcion->set_Estudiante($lnEstudiante);
				$hecho = $lobjInscripcion->registrar_inscripcion();
			}
			
			$cupos_disponibles = ($datos_curso['cupos_disponiblecur'] - count($laEstudiantes));
			$total_inscritos = ($datos_curso['cant_inscritoscur'] + count($laEstudiantes));

			$lobjCurso->actualizar_inscritos($cupos_disponibles, $total_inscritos);
			
			if($hecho)
			{
				$_SESSION['msj']='Inscripción exitosa';
			}
			else
			{	
				$_SESSION['msj']='Error al inscribir';
			}
		break;
		default:
			header('location: ../vista/intranet.php?vista=inscripcion/curso');
		break;
	}

	header('location: ../vista/intranet.php?vista=inscripcion/curso');
?>