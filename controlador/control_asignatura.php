<?php
	/**
	* Controlador asignatura
	*
	* @package    ModeloAulafrontino
	* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
	* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
	* @link       https://github.com/EquipoAulaFrontino
	* @version    v1.0
	*/
	session_start();
	require_once("../clases/clase_asignatura.php");
	$lobjAsignatura=new clsAsignatura;

	$lobjAsignatura->set_Asignatura($_POST['idasignatura']);
	$lobjAsignatura->set_Codigo($_POST['codigoasi']);
	$lobjAsignatura->set_Nombre($_POST['nombreasi']);
	$lobjAsignatura->set_Descripcion($_POST['descripcionasi']);
	$lobjAsignatura->set_Ano($_POST['anoasi']);
	$lobjAsignatura->set_Unidad($_POST['unidad_creditoasi']);
	$lobjAsignatura->set_Observacion($_POST['observacionasi']);
	$lobjAsignatura->set_Horas($_POST['horas_duracionasi']);
	$lobjAsignatura->set_Estatus($_POST['estatusasi']);
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_asignatura':
			$hecho=$lobjAsignatura->registrar_asignatura();
			if($hecho)
			{
				$_SESSION['msj']='Registro exitoso';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
		break;
		case 'editar_asignatura':
			$hecho=$lobjAsignatura->editar_asignatura();
			if($hecho)
			{
				$_SESSION['msj']='Se ha modificado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al modificar';
			}
		break;
		case 'desactivar_asignatura':
			$hecho=$lobjAsignatura->desactivar_asignatura();
			if($hecho)
			{
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al desactivar';
			}
		break;
		case 'activar_asignatura':
			$hecho=$lobjAsignatura->activar_asignatura();
			if($hecho)
			{
				$_SESSION['msj']='Se ha activado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al activar';
			}
		break;
		default:
			header('location: ../vista/intranet.php?vista=asignatura/asignatura');
		break;
	}

	header('location: ../vista/intranet.php?vista=asignatura/asignatura');
?>