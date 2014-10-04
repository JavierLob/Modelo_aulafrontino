<?php
	/* ESTE MODELO DE SEGURIDAD ESTÁ HECHO CON FINES ACADEMICOS, SU DISTRIBUCIÓN ES GRATUITA, CUALQUIER ADAPTACIÓN, MODIFICACIÓN O MEJORA QUE SE HAGA APARTIR DE ESTE CODIGO DEBE SER NOTIFICADA A LA COMUNIDAD DE LA CUAL FUE OBTENIDO Y/0 A SU CREADOR JAVIER MARTÍN AL CORREO RECUPERA.JAVIER@GMAIL.COM */
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
			header('location: ../vista/intranet.php?vista=modulo/modulo');
		break;
	}

	header('location: ../vista/intranet.php?vista=modulo/modulo');
?>