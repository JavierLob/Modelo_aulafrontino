<?php
	/**
	* Controlador estudiante
	*
	* @package    ModeloAulafrontino
	* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
	* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
	* @link       https://github.com/EquipoAulaFrontino
	* @version    v1.0
	*/
	session_start();
	require_once("../clases/clase_estudiante.php");
	$lobjEstudiante = new clsEstudiante;

	$lobjEstudiante->set_Estudiante($_POST['idestudiante']);
	$lobjEstudiante->set_Cedula($_POST['cedulaest']);
	$lobjEstudiante->set_Nombreuno($_POST['nombre_unoest']);
	$lobjEstudiante->set_Nombredos($_POST['nombre_dosest']);
	$lobjEstudiante->set_Apellidouno($_POST['apellido_unoest']);
	$lobjEstudiante->set_Apellidodos($_POST['apellido_dosest']);
	$lobjEstudiante->set_Sexo($_POST['sexoest']);
	$lobjEstudiante->set_Direccion($_POST['direccionest']);
	$lobjEstudiante->set_Telefonomovil($_POST['telefono_movest']);
	$lobjEstudiante->set_Telefonohab($_POST['telefono_habest']);
	$lobjEstudiante->set_Correo($_POST['correoest']);
	$lobjEstudiante->set_Estatus(($_POST['estatusest']));

	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_estudiante':
			$hecho=$lobjEstudiante->registrar_estudiante();
			if($hecho)
			{
				$_SESSION['msj']='Registro exitoso';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
			header('location: ../vista/intranet.php?vista=estudiante/estudiante');
		break;	
		case 'editar_estudiante':
			$hecho=$lobjEstudiante->editar_estudiante();
			if($hecho)
			{
				$_SESSION['msj']='Se ha modificado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al modificar';
			}
			header('location: ../vista/intranet.php?vista=estudiante/estudiante');
		break;
		case 'desactivar_estudiante':
			$hecho=$lobjEstudiante->desactivar_estudiante();
			if($hecho)
			{
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=estudiante/estudiante');
		break;
		case 'activar_estudiante':
			$hecho=$lobjEstudiante->activar_estudiante();
			if($hecho)
			{
				$_SESSION['msj']='Se ha activado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=estudiante/estudiante');
		break;
		case 'consultar_estudiante':
			$datos_consulta = $lobjEstudiante->consultar_estudiante_cedula();
			if($datos_consulta['idestudiante']!='')
			{
				print('1');
			}
			else
			{	
				print('0');
			}
		break;
		default:
			header('location: ../vista/intranet.php?vista=estudiante/estudiante');
		break;
	}

?>