<?php
	require_once('../nucleo/ModeloConect.php');
	class clsCurso extends ModeloConect
	{
		private $lnIdCurso;
		private $lcNombre;
		private $lnSeccion;
		private $ldFecha_apertura;
		private $ldFecha_cierre;
		private $lnCupos;
		private $lnCantidad;
		private $lnIdAsignatura;
		private $lnIdProfesor;
		private $llEstatus;

		public function __construct() 
		{
	        $this->lnIdCurso = 0;
	        $this->lcNombre = '';
	        $this->lnSeccion = '';
	        $this->ldFecha_apertura = '';
	        $this->ldFecha_cierre = '';
	        $this->lnCupos = 0;
	        $this->lnCantidad = 0;
	        $this->lnIdAsignatura = 0;
	        $this->lnIdProfesor = 0;
	        $this->llEstatus = true;
    	}

		function set_Curso($pnIdCurso)
		{
			$this->lnIdCurso=$pnIdCurso;
		}

		function set_Nombre($pcNombre)
		{
			$this->lcNombre=$pcNombre;
		}

		function set_Seccion($pnSeccion)
		{
			$this->lnSeccion=$pnSeccion;
		}

		function set_Fecha_apertura($pdFecha_apertura)
		{
			$this->ldFecha_apertura=$this->formato_fecha($pdFecha_apertura);
		}

		function set_Fecha_cierre($pdFecha_cierre)
		{
			$this->ldFecha_cierre=$this->formato_fecha($pdFecha_cierre);
		}

		function set_Cupos($pnCupos)
		{
			$this->lnCupos=$pnCupos;
		}

		function set_Cantidad($pnCantidad)
		{
			$this->lnCantidad=$pnCantidad;
		}

		function set_Asignatura($pnIdAsignatura)
		{
			$this->lnIdAsignatura=$pnIdAsignatura;
		}

		function set_Profesor($pnIdProfesor)
		{
			$this->lnIdProfesor=$pnIdProfesor;
		}

		function set_Estatus($plEstatus)
		{
			$this->llEstatus=$plEstatus;
		}

		function listar_cursos()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT tcurso.*,date_format(fecha_aperturacur,'%d-%m-%Y')as fecha_aperturacur,date_format(fecha_cierrecur,'%d-%m-%Y')as fecha_cierrecur,tasignatura.nombreasi,CONCAT_WS(' ',tprofesor.nombre_unopro,tprofesor.apellido_unopro)as profesor FROM tcurso,tasignatura,tprofesor WHERE tcurso.idasignatura=tasignatura.idasignatura AND tcurso.idprofesor=tprofesor.idprofesor ";
			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont]['idcurso']=$laRow['idcurso'];
				$Fila[$cont]['nombrecur']=$laRow['nombrecur'];
				$Fila[$cont]['seccioncur']=$laRow['seccioncur'];
				$Fila[$cont]['fecha_aperturacur']=$laRow['fecha_aperturacur'];
				$Fila[$cont]['fecha_cierrecur']=$laRow['fecha_cierrecur'];
				$Fila[$cont]['cupos_disponiblecur']=$laRow['cupos_disponiblecur'];
				$Fila[$cont]['cant_inscritoscur']=$laRow['cant_inscritoscur'];
				$Fila[$cont]['idasignatura']=$laRow['idasignatura'];
				$Fila[$cont]['idprofesor']=$laRow['idprofesor'];
				$Fila[$cont]['nombreasi']=$laRow['nombreasi'];
				$Fila[$cont]['profesor']=$laRow['profesor'];
				$Fila[$cont]['estatuscur']=$laRow['estatuscur'];
				$cont++;
			}
			$this->desconectar();
			return $Fila;
		}

		function listar_cursos_activos()
		{
			$this->conectar();
			$cont=0;
			$sql="SELECT tcurso.*,date_format(fecha_aperturacur,'%d-%m-%Y')as fecha_aperturacur,date_format(fecha_cierrecur,'%d-%m-%Y')as fecha_cierrecur,tasignatura.nombreasi,CONCAT_WS(' ',tprofesor.nombre_unopro,tprofesor.apellido_unopro)as profesor FROM tcurso,tasignatura,tprofesor WHERE tcurso.idasignatura=tasignatura.idasignatura AND tcurso.idprofesor=tprofesor.idprofesor AND estatuscur='1'";
			$pcsql=$this->filtro($sql);
			while($laRow=$this->proximo($pcsql))
			{
				$Fila[$cont]['idcurso']=$laRow['idcurso'];
				$Fila[$cont]['nombrecur']=$laRow['nombrecur'];
				$Fila[$cont]['seccioncur']=$laRow['seccioncur'];
				$Fila[$cont]['fecha_aperturacur']=$laRow['fecha_aperturacur'];
				$Fila[$cont]['fecha_cierrecur']=$laRow['fecha_cierrecur'];
				$Fila[$cont]['cupos_disponiblecur']=$laRow['cupos_disponiblecur'];
				$Fila[$cont]['cant_inscritoscur']=$laRow['cant_inscritoscur'];
				$Fila[$cont]['idasignatura']=$laRow['idasignatura'];
				$Fila[$cont]['idprofesor']=$laRow['idprofesor'];
				$Fila[$cont]['nombreasi']=$laRow['nombreasi'];
				$Fila[$cont]['profesor']=$laRow['profesor'];
				$Fila[$cont]['estatuscur']=$laRow['estatuscur'];
				$cont++;
			}
			$this->desconectar();
			return $Fila;
		}

		
		function consultar_curso()
		{
			$this->conectar();
			$sql="SELECT *,date_format(fecha_aperturacur,'%d-%m-%Y')as fecha_aperturacur,date_format(fecha_cierrecur,'%d-%m-%Y')as fecha_cierrecur, nombreasi, CONCAT_WS(' ',tprofesor.nombre_unopro,tprofesor.apellido_unopro)as profesor FROM tcurso, tasignatura, tprofesor WHERE idcurso='$this->lnIdCurso' AND tcurso.idprofesor=tprofesor.idprofesor AND tasignatura.idasignatura = tcurso.idasignatura";
			$pcsql=$this->filtro($sql);
			if($laRow=$this->proximo($pcsql))
			{
				$Fila['idcurso']=$laRow['idcurso'];
				$Fila['nombrecur']=$laRow['nombrecur'];
				$Fila['seccioncur']=$laRow['seccioncur'];
				$Fila['fecha_aperturacur']=$laRow['fecha_aperturacur'];
				$Fila['fecha_cierrecur']=$laRow['fecha_cierrecur'];
				$Fila['cupos_disponiblecur']=$laRow['cupos_disponiblecur'];
				$Fila['cant_inscritoscur']=$laRow['cant_inscritoscur'];
				$Fila['idasignatura']=$laRow['idasignatura'];
				$Fila['idprofesor']=$laRow['idprofesor'];
				$Fila['estatuscur']=$laRow['estatuscur'];
				$Fila['nombreasi']=$laRow['nombreasi'];
				$Fila['profesor']=$laRow['profesor'];
			}
			$this->desconectar();
			return $Fila;
		}


		function registrar_curso()
		{
			$this->conectar();
			$sql="INSERT INTO tcurso (nombrecur,seccioncur,fecha_aperturacur,fecha_cierrecur,cupos_disponiblecur,cant_inscritoscur,idasignatura,idprofesor,estatuscur)
				VALUES
				('$this->lcNombre','$this->lnSeccion','$this->ldFecha_apertura','$this->ldFecha_cierre','$this->lnCupos','$this->lnCantidad','$this->lnIdAsignatura','$this->lnIdProfesor','1')";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function desactivar_curso()
		{
			$this->conectar();
			$sql="UPDATE tcurso SET estatuscur='0' WHERE idcurso='$this->lnIdCurso' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function activar_curso()
		{
			$this->conectar();
			$sql="UPDATE tcurso SET estatuscur='1' WHERE idcurso='$this->lnIdCurso' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function editar_curso()
		{
			$this->conectar();
			$sql="UPDATE tcurso SET 
					nombrecur='$this->lcNombre',seccioncur='$this->lnSeccion',fecha_aperturacur='$this->ldFecha_apertura',fecha_cierrecur='$this->ldFecha_cierre',cupos_disponiblecur='$this->lnCupos',cant_inscritoscur='$this->lnCantidad',idasignatura='$this->lnIdAsignatura',idprofesor='$this->lnIdProfesor' 
					WHERE idcurso='$this->lnIdCurso' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

		function actualizar_inscritos($cupos_disponiblecur, $total_inscritos)
		{
			$this->conectar();
			$sql="UPDATE tcurso SET 
					cupos_disponiblecur='$cupos_disponiblecur' ,cant_inscritoscur='$total_inscritos'
					WHERE idcurso='$this->lnIdCurso' ";
			$lnHecho=$this->ejecutar($sql);			
			$this->desconectar();
			return $lnHecho;
		}

	}
?>
