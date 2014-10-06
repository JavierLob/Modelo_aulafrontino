<?php
	/* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
	session_start();
	require_once("../clases/clase_rol.php");
	$lobjRol=new clsRol;

	$lobjRol->set_Rol($_POST['idrol']);
	$lobjRol->set_Nombre($_POST['nombrerol']);
	$lobjRol->set_Modulo($_POST['idmodulo']);
	$lobjRol->set_Servicio($_POST['idservicio']);
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_rol':
			$hecho=$lobjRol->registrar_rol();
			if($hecho)
			{
				$_SESSION['msj']='Registro exitoso';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
			header('location: ../vista/intranet.php?vista=seguridad/rol');
		break;
		case 'editar_rol':
			$hecho=$lobjRol->editar_rol();
			if($hecho)
			{
				$_SESSION['msj']='Se ha modificado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al modificar';
			}
			header('location: ../vista/intranet.php?vista=seguridad/rol');
		break;
		case 'eliminar_rol':
			$hecho=$lobjRol->eliminar_rol();
			if($hecho)
			{
				$_SESSION['msj']='Se ha eliminardo exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al eliminar';
			}
			header('location: ../vista/intranet.php?vista=seguridad/rol');
		break;
		case 'desactivar_rol':
			$hecho=$lobjRol->eliminar_rol();
			if($hecho)
			{
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al desactivar';
			}
			header('location: ../vista/intranet.php?vista=seguridad/rol');
		break;
		case 'activar_rol':
			$hecho=$lobjRol->activar_rol();
			if($hecho)
			{
				$_SESSION['msj']='Se ha activado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al activar';
			}
			header('location: ../vista/intranet.php?vista=seguridad/rol');
		break;
		case 'asignar_modulo':
			$hecho=$lobjRol->asignar_modulo();
			if($hecho)
			{
				$_SESSION['msj']='Se han asignado los modulos exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al asignar los modulo';
			}
			header('location: ../vista/intranet.php?vista=seguridad/asignar_servicio&id='.$_POST['idrol']);
		break;
		case 'asignar_servicio':
			$hecho=$lobjRol->asignar_servicio();
			if($hecho)
			{
				$_SESSION['msj']='Se han asignado los servicios exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al asignar los servicios';
			}
			header('location: ../vista/intranet.php?vista=seguridad/asignar_servicio&id='.$_POST['idrol']);
		break;
		default:
			header('location: ../vista/intranet.php');
		break;
	}

?>