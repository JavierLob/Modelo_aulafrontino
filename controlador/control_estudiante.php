<?php
	session_start();
	require_once("../clases/clase_estudiante.php");
	$lobjEstudiante = new clsEstudiante;

	$lobjEstudiante->set_Estudiante($_POST['idestudiante']);
	$lobjEstudiante->set_Cedula($_POST['cedulaest']);
	$lobjEstudiante->set_Nombreuno($_POST['nombre_unoest']);
	$lobjEstudiante->set_Nombredos($_POST['nombre_dosest']);
	$lobjEstudiante->set_Apellidouno($_POST['apellido_unoest']);
	$lobjEstudiante->set_Apellidodos($_POST['apellido_dosest']);
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
		break;
		default:
			header('location: ../vista/intranet.php?vista=estudiante/estudiante');
		break;
	}

	header('location: ../vista/intranet.php?vista=estudiante/estudiante');
?>