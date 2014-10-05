<?php
	session_start();
	require_once("../clases/clase_curso.php");
	$lobjCurso=new clsCurso;

	$lobjCurso->set_Curso($_POST['idcurso']);
	$lobjCurso->set_Nombre($_POST['nombrecur']);
	$lobjCurso->set_Seccion($_POST['seccioncur']);
	$lobjCurso->set_Fecha_apertura($_POST['fecha_aperturacur']);
	$lobjCurso->set_Fecha_cierre($_POST['fecha_cierrecur']);
	$lobjCurso->set_Cupos($_POST['cupos_disponiblecur']);
	$lobjCurso->set_Cantidad($_POST['cant_inscritoscur']);
	$lobjCurso->set_Asignatura($_POST['idasignatura']);
	$lobjCurso->set_Profesor($_POST['idprofesor']);
	$lobjCurso->set_Estatus($_POST['estatuscur']);
	$operacion=$_POST['operacion'];

	switch ($operacion) 
	{
		case 'registrar_curso':
			$hecho=$lobjCurso->registrar_curso();
			if($hecho)
			{
				$_SESSION['msj']='Registro exitoso';
			}
			else
			{	
				$_SESSION['msj']='Error en el registro';
			}
		break;
		case 'editar_curso':
			$hecho=$lobjCurso->editar_curso();
			if($hecho)
			{
				$_SESSION['msj']='Se ha modificado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al modificar';
			}
		break;
		case 'desactivar_curso':
			$hecho=$lobjCurso->desactivar_curso();
			if($hecho)
			{
				$_SESSION['msj']='Se ha desactivado exitosamente';
			}
			else
			{	
				$_SESSION['msj']='Error al desactivar';
			}
		break;
		case 'activar_curso':
			$hecho=$lobjCurso->activar_curso();
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
			header('location: ../vista/intranet.php?vista=curso/curso');
		break;
	}

	header('location: ../vista/intranet.php?vista=curso/curso');
?>