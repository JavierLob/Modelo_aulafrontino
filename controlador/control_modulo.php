<?php
	/**
	* Controlador módulo
	*
	* @package    ModeloAulafrontino
	* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
	* @author     Equipo de desarrollo Aula Frontino <aulafrontino@gmail.com>
	* @link       https://github.com/EquipoAulaFrontino
	* @version    v1.0
	*/
	session_start();
	require_once("../clases/clase_modulo.php");
	$lobjModulo=new clsModulo;

	$lobjModulo->set_Modulo($_POST['idmodulo']);
	$lobjModulo->set_Nombre($_POST['nombremod']);
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_modulo':
			$hecho=$lobjModulo->registrar_modulo();
			if($hecho)
			{
				$_SESSION['msj']='Registro exitoso';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
		break;
		case 'editar_modulo':
			$hecho=$lobjModulo->editar_modulo();
			if($hecho)
			{
				$_SESSION['msj']='Se ha modificado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al modificar';
			}
		break;
		case 'eliminar_modulo':
			$hecho=$lobjModulo->eliminar_modulo();
			if($hecho)
			{
				$_SESSION['msj']='Se ha eliminardo exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
		break;
		default:
			header('location: ../vista/intranet.php?vista=seguridad/modulo');
		break;
	}

	header('location: ../vista/intranet.php?vista=seguridad/modulo');
?>